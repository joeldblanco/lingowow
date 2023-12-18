<?php

namespace App\Http\Livewire;

use App\Http\Controllers\ShopController;
use App\Invoice;
use App\Item;
use App\Mail\InvoicePaid;
use App\Models\Coupon;
use App\Models\Course;
use App\Models\Product;
use App\Models\User;
use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Mail;
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
    public $hidePaymentButtons = true;
    public $loadingPaymentButtons = false;

    protected $listeners = [
        'paypalCheckout',
        'paypalButtonRendered',
    ];

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

    public function paypalButtonRendered()
    {
        $this->hidePaymentButtons = false;
    }

    public function paypalCheckout()
    {
        ShopController::checkout($this->user, 'paypal');
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

    public function continueToCheckout()
    {
        if(Cart::total() <= 0 && Cart::count() > 0){
            ShopController::checkout($this->user, 'coupon');
        }else{
            $this->emit('loadPaymentButtons', Cart::total());
            $this->loadingPaymentButtons = true;
        }
    }

    public function applyCoupon()
    {
        $this->coupon_code = strval($this->coupon_code);
        $user = User::find(auth()->id());

        if ($this->coupon_code !== "") {

            $coupon = Coupon::where('code', $this->coupon_code)->first();
            if (!$coupon) {
                $this->coupon_error_message = "Invalid coupon code";
                return;
            }

            foreach (Cart::content() as $item) {
                if ($item->options->coupon_code === $coupon->code) {
                    $this->coupon_error_message = "Coupon already applied";
                    return;
                }
            }

            try {
                $user->redeemCode($this->coupon_code);
            } catch (Throwable $e) {
                $this->coupon_error_message = $e->getMessage();
                return;
            }

            $type = $coupon->data["type"];
            if ($type === "amount")
                $couponValue = $coupon->data["value"];

            if ($type === "percentage")
                $couponValue = $coupon->data["value"] / 100 * Cart::subtotal();

            if ((Cart::subtotal() - $couponValue) < 0)
                $couponValue = Cart::subtotal();

            if (Cart::subtotal() > 0)
                Cart::add('999', 'Coupon: ' . $coupon->code, 1, -$couponValue, options: ['coupon_code' => $coupon->code, 'coupon_id' => $coupon->id]);

        } else {
            $this->coupon_error_message = "Invalid coupon code";
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
