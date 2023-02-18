<?php

namespace App\Http\Livewire;

use App\Models\Course;
use App\Models\Enrolment;
use App\Models\Product;
use Carbon\Carbon;
use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\DB;

class PricingTableComponent extends Component
{

    protected $listeners = ['showSelectedProduct'];

    public $selectedProduct = 1;
    public $popup = false;
    public $popup_message = "";
    public $popup_color = "";
    public $pricingTableModal = false;

    public function showSelectedProduct($product_id)
    {

        $product = Product::find($product_id);
        if ($product->categories->pluck('name')->contains('Course')) {
            $course = $product->courses()->first();
            session(['selected_course' => $course->id]);
            $this->selectedProduct = $product_id;
            $this->pricingTableModal = true;
        } else {
            session(['selected_product' => $product->id]);
            Cart::destroy();
            Cart::add($product->id, $product->name, 1, ($product->sale_price == null ? $product->regular_price : $product->sale_price), ['editable' => false])->associate('App\Models\Product');
            return redirect()->route('cart');
        }
    }

    public function store($nOfClasses = null, $synchronous = false)
    {
        $enroled = Enrolment::where('student_id', auth()->id())
            // ->where('course_id',session('selected_course'))
            ->withTrashed()
            ->first();

        if (!empty($enroled)) {
            $deleted = $enroled->trashed();
        }

        if ($enroled && !$deleted) {

            // $current_period = json_decode(DB::table('metadata')->where('key', '=', 'current_period')->first()->value);
            // $now = Carbon::now();
            // $current_period_end = new Carbon($current_period->end_date);

            // if ($enroled->course_id == session('selected_course') && $synchronous && ($now->greaterThan($current_period_end->copy()->subDays(7))) && empty($enroled->preselection)) {
            //     $course_id = session('selected_course');
            //     $product = Course::find($course_id)->products->first();
            //     session(['plan' => $nOfClasses]);
            //     redirect()->route("schedule.create");
            // } else {
            $this->popup_message = "User already enroled in a course.";
            $this->popup_color = "red";
            $this->popup = true;
            // }
        } else {
            $course_id = session('selected_course');
            $product = Course::find($course_id)->products->first();
            if ($synchronous) {
                session(['plan' => $nOfClasses]);
                redirect()->route("schedule.create");
            } else {
                Cart::destroy();
                Cart::add($product->id, $product->name, 1, ($product->sale_price == null ? $product->regular_price : $product->sale_price), ['editable' => false])->associate('App\Models\Product');
                return redirect()->route('cart');
            }
        }
    }

    public function render()
    {
        $product = Product::find($this->selectedProduct);

        $plans = $product->plans;

        return view('livewire.pricing-table-component')->with(compact('product', 'plans'));
    }
}
