<?php

namespace App\Http\Livewire;

use App\Models\Course;
use App\Models\Product;
use App\Models\User;
use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;
use Throwable;

class CartComponent extends Component
{
    public $coupon_code = "";
    public $coupon_error_message = "";
    public $street = "";
    public $city = "";
    public $country = "";
    public $zip_code = "";
    public $user;

    protected $rules = [
        'street' => 'required|string|max:100',
        'city' => 'required|string|max:50',
        'zip_code' => 'required|string|max:10',
        'country' => 'required|string|max:50',
    ];

    public function mount()
    {
        $this->user = auth()->user();
        $this->street = $this->user->street;
        $this->city = $this->user->city;
        $this->country = $this->user->country;
        $this->zip_code = $this->user->zip_code;
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function incrementQtyItem($rowId)
    {
        $product = Cart::get($rowId);
        $qty = $product->qty + 1;
        Cart::update($rowId, $qty);
    }

    public function decrementQtyItem($rowId)
    {
        $product = Cart::get($rowId);
        $qty = $product->qty - 1;
        Cart::update($rowId, $qty);
    }

    public function changeQtyItem($rowId, $qty)
    {
        dd($qty);
        $qty = intval($qty);
        Cart::update($rowId, $qty);
    }

    public function removeItem($rowId)
    {
        Cart::remove($rowId);
    }

    public function applyCoupon()
    {
        $user = User::find(auth()->id());
        $this->coupon_code = strval($this->coupon_code);

        try {
            $amount = (int)json_decode($user->redeemCode($this->coupon_code)->data)->amount;
            Cart::add('123', 'Discount', 1, -$amount);
        } catch (Throwable $e) {
            $this->coupon_error_message = $e->getMessage();
        }
    }

    public function saveBillingAddress()
    {
        $this->user = User::find(auth()->id());
        $tmp = $this->user->update([
            'street' => $this->street,
            'city' => $this->city,
            'country' => $this->country,
            'zip_code' => $this->zip_code,
        ]);
    }

    public function render()
    {
        return view('livewire.cart-component');
    }
}
