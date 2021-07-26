<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use Cart;

class PricingTableComponent extends Component
{

    protected $listeners = [
        'selectProduct' => 'showSelectedProduct',
        'store'
    ];

    public $product = [
        [
            "id" => 1,
            "name" => "English Regular Program - Simple Plan",
            "slug" => "english-regular-program-simple-plan",
            "description" => "English Regular Program - Simple Plan",
            "regular_price" => "120.00",
            "sale_price" => "79.92",
            "image" => null,
            "plan" => "simple",
            "created_at" => null,
            "updated_at" => null
        ],
        [
            "id" => 2,
            "name" => "English Regular Program - Simple Plan",
            "slug" => "english-regular-program-simple-plan",
            "description" => "English Regular Program - Simple Plan",
            "regular_price" => "120.00",
            "sale_price" => "79.92",
            "image" => null,
            "plan" => "simple",
            "created_at" => null,
            "updated_at" => null
        ],
        [
            "id" => 3,
            "name" => "English Regular Program - Simple Plan",
            "slug" => "english-regular-program-simple-plan",
            "description" => "English Regular Program - Simple Plan",
            "regular_price" => "120.00",
            "sale_price" => "79.92",
            "image" => null,
            "plan" => "simple",
            "created_at" => null,
            "updated_at" => null
        ]
    ];

    public function showSelectedProduct(){

    }

    public function store($product_id, $product_name, $product_price)
    {
        Cart::add($product_id, $product_name, 1, $product_price)->associate('App\Models\Product');
        // redirect()->route('dashboard');
    }

    public function render()
    {
        // $products = $this->product;
        $products = Product::all();
        // dd($products);
        return view('livewire.pricing-table-component')->with(compact('products'));
    }
}
