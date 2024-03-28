<?php

namespace App\Http\Livewire;

use App\Invoice;
use Carbon\Carbon;
use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Http\Controllers\PaymentController;

class NiubizCheckoutButton extends Component
{
    // protected $listeners = ['loadPaymentButtons'];
    private $sessionToken;
    public $sessionKey;
    public $purchaseNumber;
    public $amount;
    public $expirationTimeInMinutes;
    public $loadNiubizButton = false;

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
        $this->amount = Cart::total();

        $timestamp = Carbon::createFromTimestampMs((json_decode($this->sessionToken))->expirationTime); //This code creates a Carbon object from the expirationTime property in miliseconds of the sessionToken. It then converts the Carbon object to a DateTime string.
        $now = Carbon::now('UTC');
        $this->expirationTimeInMinutes = $timestamp->diffInMinutes($now);
    }

    public function render()
    {
        $securityToken = PaymentController::getSecurityToken();
        $this->sessionToken = PaymentController::getSessionToken($securityToken);
        $this->purchaseNumber = Invoice::all()->last()->id + 1;
        session(['purchaseNumber' => $this->purchaseNumber]);
        $this->amount = Cart::total();

        $timestamp = Carbon::createFromTimestampMs((json_decode($this->sessionToken))->expirationTime); //This code creates a Carbon object from the expirationTime property in miliseconds of the sessionToken. It then converts the Carbon object to a DateTime string.
        $now = Carbon::now('UTC');
        $this->expirationTimeInMinutes = $timestamp->diffInMinutes($now);
        return view('livewire.niubiz-checkout-button', ['sessionToken' => $this->sessionToken]);
    }
}
