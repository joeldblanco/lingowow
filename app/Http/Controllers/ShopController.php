<?php

namespace App\Http\Controllers;

use App\Http\Livewire\NewSchedule;
use App\Invoice;
use App\Jobs\CreateSchedule;
use App\Jobs\StoreSelfEnrolment;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use App\Item;
use App\Mail\InvoicePaid;
use App\Models\Course;
use App\Models\Enrolment;
use App\Models\Plan;
use App\Models\ScheduleReserve;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class ShopController extends Controller
{
    public function index(Request $request)
    {
        // if (auth()->id() != 5 && auth()->id() != 6)
        //     return view('maintenance'); //MAINTEANCE MODE

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

        if ($product->categories->pluck('name')->contains('Course') || $product->categories->pluck('name')->contains('Test')) {
            $options['enrollable'] = true;
            $options['bookable'] = true;
        }

        $product = ShopController::checkCustomerReward($product->id);

        Cart::add($product->id, $product->name, $quantity, ($product->sale_price == null ? $product->regular_price : $product->sale_price), $options)->associate('App\Models\Product');

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
                $enrolmentId = EnrolmentController::enrolStudent($user->id, $course_id, session('teacher_id'));
            }
        }

        if (count($bookable) > 0) {
            foreach ($bookable as $product_id) {
                $product = Product::find($product_id);

                if ($product->categories->pluck('name')->contains('Course')) {
                    $classDates = EnrolmentController::createSchedule($enrolmentId, json_decode(session('user_schedule'), 1));
                    ClassController::bookClasses($classDates, $enrolmentId);
                }

                if ($product->categories->pluck('name')->contains('Test')) {
                    ClassController::bookClasses(session('examDate'), $enrolmentId);
                }
            }
        }

        $invoice_id = ShopController::createInvoice($user);
        $invoice = Invoice::find($invoice_id);
        $invoice->payment_method = $paymentMethod;
        $invoice->paid = 1;
        $invoice->save();

        Cart::destroy();

        return redirect()->route('invoice.show', $invoice->id);
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
        $cart['invoice_id'] = config('paypal.invoice_prefix') . '_' . $order_id;
        $cart['invoice_description'] = "Invoice #$order_id";

        //CALCULATE TOTAL PRICE AND ADD TO ARRAY
        $cart['total'] = 0;
        foreach ($cart['items'] as $item) {
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

    public static function checkScheduleIntegrity($users, $data)
    {
        $course_id = session('selected_course');
        session(['course_id' => $course_id]);

        $schedule = new NewSchedule;
        $approved = boolval(count($schedule->schedulesIntersect($schedule->getTeachersAvailability($users), $data)));

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
                Cart::destroy();
                ShopController::addToCart($product->id, 1);
                return redirect()->route('cart');
            }
        }
    }
}
