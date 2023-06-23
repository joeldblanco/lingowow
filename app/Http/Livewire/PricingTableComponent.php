<?php

namespace App\Http\Livewire;

use App\Http\Controllers\ShopController;
use App\Models\Course;
use App\Models\Enrolment;
use App\Models\Plan;
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
        if ($product->categories->pluck('name')->contains('Course') || $product->categories->pluck('name')->contains('Test')) {
            $course = $product->courses()->first();
            session(['selected_course' => $course->id]);
            $this->selectedProduct = $product_id;
            $this->pricingTableModal = true;
        } else {
            session(['selected_product' => $product->id]);
            // Cart::destroy();
            // Cart::add($product->id, $product->name, 1, ($product->sale_price == null ? $product->regular_price : $product->sale_price), ['editable' => false])->associate('App\Models\Product');
            ShopController::addToCart($product->id, 1);
            // return redirect()->route('cart');
        }
    }

    public function store($product_id, $plan_id = null)
    {
        ShopController::processProduct($product_id, $plan_id);
    }

    public function render()
    {
        $product = Product::find($this->selectedProduct);

        $plans = $product->plans;

        return view('livewire.pricing-table-component')->with(compact('product', 'plans'));
    }
}
