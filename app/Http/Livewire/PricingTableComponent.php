<?php

namespace App\Http\Livewire;

use App\Models\Course;
use App\Models\Enrolment;
use App\Models\Product;
use Livewire\Component;
use Cart;
use Illuminate\Support\Facades\DB;

class PricingTableComponent extends Component
{

    protected $listeners = ['showSelectedProduct'];

    public $selectedProduct = 1;
    public $popup = false;
    public $popup_message = "";
    public $popup_color = "";

    public function showSelectedProduct($course_id)
    {
        session(['selected_course' => $course_id]);
        $this->selectedProduct = $course_id;
        $this->emit('loadingState', false);
    }

    public function store($nOfClasses = null, $synchronous = false)
    {
        $enroled = Enrolment::where('student_id', auth()->id())
            // ->where('course_id',session('selected_course'))
            ->withTrashed()
            ->first();

        if ($enroled != null) {
            $deleted = $enroled->trashed();
        }

        if ($enroled && !$deleted) {
            // dd("User already enroled in this course.");
            $this->popup_message = "User already enroled in a course.";
            $this->popup_color = "red";
            $this->popup = true;
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
        if (in_array(auth()->user()->id, [5])) {
            $product = Course::find($this->selectedProduct)->products()->where('slug', 'like', '%old%')->first();
        } else {
            $product = Course::find($this->selectedProduct)->products->first();
        }

        dd($product->plans);

        $plans =  DB::table('plans')
            ->join('plans_products', function ($join) use (&$product) {
                $join->on('plans.id', '=', 'plans_products.plan_id')
                    ->where('plans_products.product_id', '=', $product->id);
            })
            ->get();

        return view('livewire.pricing-table-component')->with(compact('product', 'plans'));
    }
}
