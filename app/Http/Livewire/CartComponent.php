<?php

namespace App\Http\Livewire;

use App\Models\Product;
use App\Models\User;
use Livewire\Component;
use Cart;
use Throwable;

class CartComponent extends Component
{
    public $coupon_code = "";
    public $coupon_error_message = "";

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

    public function applyCoupon(){
        $user = User::find(auth()->id());
        $this->coupon_code = strval($this->coupon_code);

        try {
            $user->redeemCode($this->coupon_code);
        } catch (Throwable $e) {
            $this->coupon_error_message = $e->getMessage();
        }
    }

    public function render()
    {
        return view('livewire.cart-component');
    }
}
