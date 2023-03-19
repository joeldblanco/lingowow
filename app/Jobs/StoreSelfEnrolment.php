<?php

namespace App\Jobs;

use App\Http\Controllers\GatherController;
use App\Invoice;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Item;
use App\Mail\InvoicePaid;
use App\Models\Course;
use App\Models\Enrolment;
use App\Models\Module;
use App\Models\Preselection;
use App\Models\Product;
use App\Models\ScheduleReserve;
use App\Models\Unit;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class StoreSelfEnrolment implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($student = null)
    {
        if (empty($student)) {
            $student = auth()->user();
        } else {


            $cart = [];

            if (Invoice::all()->last() != null) {
                $order_id = Invoice::all()->last()->id + 1;
            } else {
                $order_id = 1;
            }

            $items = array();

            foreach (Cart::content() as $item) {
                array_push($items, ['name'  => $item->name, 'price' => $item->price, 'qty' => $item->qty]);
            }

            $cart['items'] = $items;

            $cart['invoice_id'] = config('paypal.invoice_prefix') . '_' . $order_id;
            $cart['invoice_description'] = "Invoice #$order_id";

            $total = 0;
            foreach ($cart['items'] as $item) {
                $total += $item['price'] * $item['qty'];
            }
            $cart['total'] = $total;



            $invoice = new Invoice();
            $invoice->title = $cart['invoice_description'];
            $invoice->price = $cart['total'];
            $invoice->paid = 1;
            $invoice->user_id = $student->id;
            $invoice->save();
            collect($cart['items'])->each(function ($product) use ($invoice) {
                $item = new Item();
                $item->invoice_id = $invoice->id;
                $item->item_name = $product['name'];
                $item->item_price = $product['price'];
                $item->item_qty = $product['qty'];

                $item->save();
            });

            Mail::to($student)->send(new InvoicePaid($invoice));

            session(['invoice_id' => $invoice->id]);

            $product = Product::find(session('selected_product'));
            if (!empty($product) && !$product->categories->pluck('name')->contains('Course')) {
                session()->forget('selected_product');
                return redirect()->route('invoice.show', ['id' => session('invoice_id')]);
            }
        }

        $course_id = session('selected_course');

        //CHANGING STUDENT'S ROLE FROM 'GUEST' TO 'STUDENT'//
        $student->removeRole('guest');
        $student->assignRole('student');

        $modality_course = Course::find($course_id)->modality;
        if ($modality_course == "synchronous" || $modality_course == "exam") {
            $teacher = User::find(session('teacher_id'));

            $enrolment = Enrolment::where('student_id', $student->id)
                ->where('course_id', $course_id)
                ->withTrashed()
                ->first();

            if (!empty($enrolment)) {
                $deleted = $enrolment->trashed();
            }

            if ($enrolment && !$deleted) {
                $current_period = json_decode(DB::table('metadata')->where('key', '=', 'current_period')->first()->value);
                $now = Carbon::now();
                $current_period_end = new Carbon($current_period->end_date);

                if (session('preselection') == true) {
                    $preselection = Preselection::withTrashed()->updateOrCreate(
                        ['enrolment_id' => $enrolment->id],
                        ['teacher_id' => $teacher->id, 'schedule' => json_decode(session('user_schedule')), 'deleted_at' => NULL]
                    );
                    session()->forget('preselection');

                    $scheduleReservation = ScheduleReserve::where('user_id', $enrolment->student->id)->first();
                    if (!empty($scheduleReservation)) {
                        $scheduleReservation->delete();
                    }

                    return redirect()->route('invoice.show', $invoice->id);
                } else {
                    dd("User has an active enrolment in this course.");
                }
            } else {
                //CREATING STUDENT'S ENROLMENT (OR UPDATING IT, IN CASE IT ALREADY EXISTS BUT IS SOFTDELETED)//
                $enrolment = Enrolment::withTrashed()->updateOrCreate(
                    ['student_id' => $student->id, 'course_id' => $course_id],
                    ['teacher_id' => $teacher->id, 'deleted_at' => NULL]
                );

                // dd($enrolment);
            }

            // SchedulingCalendarController::store($student->id, $enrolment);
            dispatch(new CreateSchedule($student->id, $enrolment->id));
            GatherController::editGuestsList([$student->id, $teacher->id]);
        } else {

            //CREATING STUDENT'S ENROLMENT (OR UPDATING IT, IN CASE IT ALREADY EXISTS BUT IS SOFTDELETED)//
            $enrolment = Enrolment::withTrashed()->updateOrCreate(
                ['student_id' => $student->id, 'course_id' => $course_id],
                ['teacher_id' => NULL, 'deleted_at' => NULL]
            );
            GatherController::editGuestsList([$student->id]);
        }

        if ($student->id != null) {

            User::find($student->id)->givePermissionTo('view units');
            $course = Course::find($course_id);

            if ($course->categories->pluck('name')->contains('Conversational')) {
                // dd("Maintenance");
                $modules_ids = DB::table('module_user')->select('module_id')->where('user_id', $student->id)->get();
                $modules = Module::find($modules_ids->pluck('module_id')->toArray());
                $module = $modules->where('course_id', $course->id)->first();
                if (empty($module)) {
                    $order = $course->modules->sortBy('order')->last() == null ? 1 : $course->modules->sortBy('order')->last()->order + 1;
                    $module = Module::create([
                        'name' => $student->first_name . ' ' . $student->last_name . ' - Lesson Room',
                        'course_id' => $course_id,
                        'description' => 'Welcome to your Conversational Course. 

                        Most of the content set here is based on the information sent by our students. 
                        
                        On this course, you will practice and improve the language you know. 
                        
                        Enjoy the journey.',
                        'status' => 1,
                        'order' => $order,
                    ]);

                    DB::table('module_user')->insertOrIgnore([
                        ['module_id' => $module->id, 'user_id' => $student->id],
                        ['module_id' => $module->id, 'user_id' => session('teacher_id')]
                    ]);
                } else {
                    $module = Module::find($module->id);
                    if ($module->course_id)
                        DB::table('module_user')->insertOrIgnore([
                            ['module_id' => $module->id, 'user_id' => $student->id],
                            ['module_id' => $module->id, 'user_id' => session('teacher_id')]
                        ]);
                }
            } else {
                $unit = $course->units()->sortBy('order')->pluck('exams')->reject(function ($innerCollection) {
                    return $innerCollection->isEmpty();
                })->flatten()->first();

                if (empty($unit)) {
                    $unit_id = $course->units()->sortBy('order')->first()->id;
                } else {
                    $unit_id = $unit->unit_id;
                }

                $current_unit = DB::table('unit_user')->select('unit_id')->where('user_id', $student->id)->first();

                if (empty($current_unit)) {
                    DB::table('unit_user')->insertOrIgnore([
                        ['unit_id' => $unit_id, 'user_id' => $student->id]
                    ]);
                }
            }
        }
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //
    }
}
