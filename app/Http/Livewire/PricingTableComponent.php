<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use Cart;

class PricingTableComponent extends Component
{

    protected $listeners = ['showSelectedProduct'];

    private $selectedProduct = 1;

    public function showSelectedProduct($productId){
        $this->selectedProduct = $productId;
    }

    public function store($nOfClasses)
    {
        session(['plan' => $nOfClasses]);
        redirect()->route("schedule.update");
    }

    public function render()
    {
        $products = Product::where('id',$this->selectedProduct)->get();
        return view('livewire.pricing-table-component')->with(compact('products'));
    }
}
