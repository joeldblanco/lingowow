<?php

namespace App\Http\Livewire;

use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class CartSummary extends Component
{
    public $show = false;
    public $items;
    public $subTotal;
    public $count = 0;

    public function mount($show = false)
    {
        $this->show = false;
        $this->items = Cart::content();
        $this->subTotal = Cart::subTotal();
        $this->count = Cart::count();
        
        $this->count = 0;
        foreach (Cart::content() as $item) {
            $this->count++;
        }
    }

    public function removeItem($rowId)
    {
        Cart::remove($rowId);
    }

    public function render()
    {
        $this->items = Cart::content();
        $this->subTotal = Cart::subTotal();
        
        $this->count = 0;
        foreach (Cart::content() as $item) {
            $this->count++;
        }

        return view('livewire.cart-summary');
    }
}
