<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Cart;

class CartComponent extends Component
{

    public function incrementQtyItem($rowId){
        $product = Cart::get($rowId);
        $qty = $product->qty + 1;
        Cart::update($rowId, $qty);
    }

    public function decrementQtyItem($rowId){
        $product = Cart::get($rowId);
        $qty = $product->qty - 1;
        Cart::update($rowId, $qty);
    }

    public function changeQtyItem($rowId, $qty){
        dd($qty);
        $qty = intval($qty);
        Cart::update($rowId, $qty);
    }

    public function removeItem($rowId){
        Cart::remove($rowId);
    }

    public function render()
    {
        return view('livewire.cart-component');
    }
}
