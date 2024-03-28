<?php

namespace App\Http\Controllers;

use App\Http\Livewire\ScheduleController;
use App\Invoice;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use App\Item;
use App\Mail\InvoicePaid;
use App\Models\Course;
use App\Models\Enrolment;
use App\Models\Plan;
use App\Models\ScheduleReserve;
use Carbon\Carbon;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class ShopController extends Controller
{
    public function index(Request $request)
    {
        // if (auth()->id() != 5 && auth()->id() != 6)
        // return view('maintenance'); //MAINTENANCE MODE

        $response = [];
        if (session()->has('code')) {
            $response['code'] = session()->get('code');
            session()->forget('code');
        }

        if (session()->has('message')) {
            $response['message'] = session()->get('message');
            session()->forget('message');
        }

        $products = Product::all();

        session(['selected_course' => 1]);

        return view('shop.index', compact('response', 'products'));
    }

    public function scheduleSelection(Request $request)
    {
        $request->validate([
            'plan' => 'required|integer|min:1|max:4',
            'product_id' => 'required|integer|exists:App\Models\Product,id'
        ]);

        if (empty(session('selected_course'))) return redirect()->route('shop');

        $plan = $request->plan;
        $product_id = $request->product_id;
        $product = Product::find($product_id);
        if (!$product->categories->pluck('name')->contains('Synchronous')) {
            return redirect()->route('shop')->with('error', 'This product is not available for scheduling.');
        }
        $preselection = $request->preselection;

        return view('calendar-selection', compact('plan', 'product_id', 'preselection'));
    }

    public static function addToCart($product_id, $quantity = 1)
    {
        $product = Product::findOrFail($product_id);
        $options = [];

        if ($product->categories->pluck('name')->contains('Synchronous')) {
            $options['enrollable'] = true;
            $options['bookable'] = true;
        }

        if ($product->categories->pluck('name')->contains('Asynchronous')) {
            $options['enrollable'] = true;
        }

        if ($product->categories->pluck('name')->contains('Test')) {
            $options['enrollable'] = true;
            $options['bookable'] = true;
            $options['editable'] = true;
        }

        // $product = ShopController::checkCustomerReward($product->id);

        // $productPlans = $product->plans;

        // if (count($productPlans) == 1) {
        //     $price = $product->sale_price == null ? $product->regular_price : $product->sale_price;
        // } else {
        //     foreach ($productPlans as $plan) {
        //         if ($quantity >= $plan->monthly_classes) {
        //             $price = $plan->price / $plan->monthly_classes;
        //         }
        //     }
        // }

        $groupPrice = false;
        // $price = 0;
        $price_groups = json_decode(
            DB::table('metadata')
                ->where('key', 'price_groups')
                ->first()->value,
            1,
        )[0];

        $price_students = json_decode(
            DB::table('metadata')
                ->where('key', 'price_students')
                ->first()->value,
            1,
        );

        $default_group_price = json_decode(
            DB::table('metadata')
                ->where('key', 'default_group_price')
                ->first()->value,
            1,
        );
        $student = auth()->user();

        foreach ($price_students as $group => $students_ids) {
            if (in_array($student->id, $students_ids)) {
                $groupPrice = $price_groups[$group];
            }
        }

        if (!$groupPrice) {
            $groupPrice = $default_group_price;
        }

        if ($quantity < 8) {
            $price = $groupPrice[$product->id][0]['sale_price'] == null ? $groupPrice[$product->id][0]['regular_price'] : $groupPrice[$product->id][0]['sale_price'];
        } elseif ($quantity < 12) {
            $price = $groupPrice[$product->id][1]['sale_price'] == null ? $groupPrice[$product->id][1]['regular_price'] : $groupPrice[$product->id][1]['sale_price'];
        } elseif ($quantity < 16) {
            $price = $groupPrice[$product->id][2]['sale_price'] == null ? $groupPrice[$product->id][2]['regular_price'] : $groupPrice[$product->id][2]['sale_price'];
        } elseif ($quantity >= 16) {
            $price = $groupPrice[$product->id][3]['sale_price'] == null ? $groupPrice[$product->id][3]['regular_price'] : $groupPrice[$product->id][3]['sale_price'];
        }

        Cart::add($product->id, $product->name, $quantity, $price, $options)->associate('App\Models\Product');

        return redirect()->route('shop')->with('success', 'Product succesfully added to cart!');
    }

    //Function for redirecting to cart
    public static function takeToCart()
    {
        return redirect()->route('cart');
    }

    //Function for Checkout
    public static function checkout($user, $paymentMethod = null)
    {
        $enrollable = [];
        $bookable = [];

        session(['paymentMethod' => $paymentMethod]);

        foreach (Cart::content() as $item) {
            $itemOptions = $item->options;
            foreach ($itemOptions as $option => $value) {
                if ($option == 'enrollable' && $value == true) {
                    $enrollable[] = $item->id;
                }

                if ($option == 'bookable' && $value == true) {
                    $bookable[] = $item->id;
                }
            }
        }

        if (count($enrollable) > 0) {
            foreach ($enrollable as $product_id) {
                $course_id = Product::find($product_id)->courses->first()->id;

                $invoiceId = EnrolmentController::preEnrolStudent($user->id, $course_id, session('teacher_id'));

                if ($invoiceId) {
                    return redirect()->route('invoices.show', $invoiceId);
                } else {
                    $enrolmentId = EnrolmentController::enrolStudent($user->id, $course_id, session('teacher_id'));
                }
            }
        }

        if (count($bookable) > 0) {
            foreach ($bookable as $product_id) {
                $product = Product::find($product_id);

                if ($product->categories->pluck('name')->contains('Course')) {

                    $enrolment = Enrolment::find($enrolmentId);

                    $reservedSchedule = ScheduleReserve::where('user_id', $enrolment->student_id)->where('teacher_id', $enrolment->teacher_id)->where('type', 'schedule')->first();

                    $classDates = EnrolmentController::createSchedule($enrolmentId, json_decode($reservedSchedule->selected_schedule, 1));

                    ClassController::bookClasses($classDates, $enrolmentId);

                    $reservedSchedule->delete();
                }

                if ($product->categories->pluck('name')->contains('Test')) {
                    EnrolmentController::createSchedule($enrolmentId, []);
                    ClassController::bookClasses(session('examDate1'), $enrolmentId);
                    ClassController::bookClasses(session('examDate2'), $enrolmentId);
                }
            }
        }

        $invoice_id = ShopController::createInvoice($user);
        $invoice = Invoice::find($invoice_id);
        $invoice->payment_method = $paymentMethod;
        $invoice->paid = 1;
        $invoice->save();

        foreach (Cart::content() as $item) {
            if (Arr::has($item->options, 'coupon_code')) {
                DB::table('voucherables')->where('coupon_id', $item->options->coupon_id)->update(['redemption_confirmation' => 1]);
            }
        }

        Cart::destroy();
        session()->forget('paymentMethod');

        return redirect()->route('invoices.show', $invoice->id);
    }


    public static function createInvoice($user)
    {
        //FIND THE LAST INVOICE ID
        $invoice = Invoice::latest()->first();
        $order_id = $invoice ? $invoice->id + 1 : 1;

        //ADD CART ITEMS TO ARRAY
        $items = Cart::content()->map(function ($item) {
            return [
                'name' => $item->name,
                'price' => $item->price,
                'qty' => $item->qty,
            ];
        })->toArray();

        //CREATE CART ARRAY AND ADD ITEMS AND INVOICE DETAILS
        $cart = [];
        $cart['items'] = $items;
        // $cart['invoice_id'] = config('paypal.invoice_prefix') . '_' . $order_id;
        $cart['invoice_description'] = "Lingowow Invoice " . Carbon::now()->format('Y F') . " (" . $user->id . "-" . $order_id . ")";

        //CALCULATE TOTAL PRICE AND ADD TO ARRAY
        $cart['total'] = 0;
        foreach ($items as $item) {
            $cart['total'] += $item['price'] * $item['qty'];
        }

        //CREATE AND SAVE INVOICE
        $invoice = Invoice::create([
            'title' => $cart['invoice_description'],
            'price' => $cart['total'],
            'paid' => 0,
            'user_id' => $user->id,
        ]);

        //CREATE ITEMS
        $items = collect($cart['items'])->map(function ($product) use ($invoice) {
            return [
                'invoice_id' => $invoice->id,
                'item_name' => $product['name'],
                'item_price' => $product['price'],
                'item_qty' => $product['qty'],
            ];
        });

        //INSERT AND SAVE ITEMS TO DATABASE
        Item::insert($items->toArray());

        //SEND EMAIL NOTIFICATION TO USER
        Mail::to($user)->send(new InvoicePaid($invoice));

        return $invoice->id;
    }

    public static function checkScheduleIntegrity($users, $data, $preselection = false)
    {
        $course_id = session('selected_course');
        session(['course_id' => $course_id]);

        $schedule = new ScheduleController;
        $approved = false;

        if (!empty($data))
            if ($preselection) {
                $approved = boolval(count($schedule->schedulesIntersect($schedule->getTeachersPreselectionAvailability($users), $data)));
            } else {
                $approved = boolval(count($schedule->schedulesIntersect($schedule->getTeachersAvailability($users), $data)));
            }

        return $approved;
    }

    public static function saveScheduleReserve($schedule = [], $type = null)
    {
        if (empty($type)) {
            if (count($schedule[0]) > 2) {
                $type = "exam";
            } else {
                $type = "schedule";
            }
        }
        $teacher_id = session('teacher_id');
        $schedule_encode = json_encode($schedule);

        if (session()->exists('enrolment_type') && session('enrolment_type') == "manual_enrolment") {
            $student_id = session('student_id');
        } else {
            $student_id = auth()->id();
        }

        $reserve = ScheduleReserve::withTrashed()->updateOrCreate(
            ['user_id' => $student_id],
            ['teacher_id' => $teacher_id, 'selected_schedule' => $schedule_encode, 'type' => $type, 'deleted_at' => null]
            // ['type' => 'exam']
        );
    }

    public static function checkCustomerReward($product_id, $customer = null)
    {
        if (empty($customer)) {
            $customer = auth()->user();
        }

        $product = Product::find($product_id);

        if ($product->categories->pluck('name')->contains('Course')) {
            $course = $product->courses->first();
            $course_id = $course->id;

            $old_customers = json_decode(DB::table('metadata')->where('key', 'old_customers')->value('value'));

            $course_products = Course::find($course_id)
                ->products()
                ->whereHas('categories', function ($query) {
                    $query->where('name', 'course');
                })
                ->get();

            $matching_product = $course_products->first(function ($course_product) use ($customer, $old_customers) {
                if (in_array($customer->id, $old_customers) && str_contains($course_product->slug, 'old')) {
                    return true;
                }

                if (!in_array($customer->id, $old_customers) && !str_contains($course_product->slug, 'old')) {
                    return true;
                }

                return false;
            });

            if ($matching_product) {
                $product = $matching_product;
            }
        }

        return $product;
    }

    public static function processProduct($product_id, $plan_id = null)
    {
        $product = Product::with('categories', 'courses')->find($product_id);
        $categories = $product->categories->pluck('name');

        $isSynchronous = $categories->contains('Synchronous');
        $isCourse = $categories->contains('Course');
        $isTest = $categories->contains('Test');

        if ($isSynchronous && $isCourse) {
            $plan = Plan::find($plan_id)->monthly_classes / 4;
        } elseif ($isTest) {
            $plan = Plan::find($plan_id)->monthly_classes;
        }

        $course = null;
        if ($isCourse) {
            $course = $product->courses->first();
        }

        $enroled = Enrolment::where('student_id', auth()->id())
            ->where('course_id', optional($course)->id)
            ->orderBy('created_at', 'desc')
            ->first();

        if ($enroled) {
            $current_period = DB::table('metadata')->where('key', 'current_period')->value('value');
            $current_period_end = Carbon::parse(json_decode($current_period)->end_date);

            if ($isSynchronous && Carbon::now()->greaterThan($current_period_end->copy()->subDays(7)) && empty($enroled->preselection)) {
                return redirect()->route("shop.scheduleSelection", ['plan' => $plan, 'product_id' => $product->id, 'preselection' => true]);
            } else {
                return redirect()->route('shop')->with('error', 'User already enrolled in a course.');
            }
        } else {
            if ($isSynchronous) {
                return redirect()->route("shop.scheduleSelection", ['plan' => $plan, 'product_id' => $product->id]);
            } else {
                // Cart::destroy();
                ShopController::addToCart($product->id, 1);
                // return redirect()->route('cart');
            }
        }
    }
}
