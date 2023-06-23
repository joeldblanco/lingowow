<?php

namespace App\View\Components;

use App\Http\Controllers\PaymentController;
use App\Invoice;
use Carbon\Carbon;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\View\Component;

class NiubizCheckoutButton extends Component
{
    public $sessionToken;
    public $purchaseNumber;
    public $ammount;
    public $expirationTimeInMinutes;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $securityToken = PaymentController::getSecurityToken();
        $this->sessionToken = PaymentController::getSessionToken($securityToken);
        $this->purchaseNumber = Invoice::all()->last()->id + 1;
        session(['purchaseNumber' => $this->purchaseNumber]);
        $this->ammount = Cart::total();

        $timestamp = Carbon::createFromTimestampMs((json_decode($this->sessionToken))->expirationTime); //This code creates a Carbon object from the expirationTime property in miliseconds of the sessionToken. It then converts the Carbon object to a DateTime string.
        $now = Carbon::now('UTC');
        $this->expirationTimeInMinutes = $timestamp->diffInMinutes($now);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.niubiz-checkout-button');
    }
}
