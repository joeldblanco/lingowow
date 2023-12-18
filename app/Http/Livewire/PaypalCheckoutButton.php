<?php

namespace App\Http\Livewire;

use Livewire\Component;

class PaypalCheckoutButton extends Component
{
    protected $listeners = ['loadPaymentButtons'];

    public function loadPaymentButtons($amount)
    {
        $this->dispatchBrowserEvent('load-payment-buttons', [
            'amount' => $amount,
        ]);
    }

    public function render()
    {
        return view('livewire.paypal-checkout-button');
    }
}
