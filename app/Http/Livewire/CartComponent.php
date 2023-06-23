<?php

namespace App\Http\Livewire;

use App\Http\Controllers\ShopController;
use App\Invoice;
use App\Item;
use App\Mail\InvoicePaid;
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

    protected $listeners = [
        'paypalCheckout'
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

    public function paypalCheckout()
    {
        // $cart = [];
        // if (Invoice::all()->last() != null) {
        //     $order_id = Invoice::all()->last()->id + 1;
        // } else {
        //     $order_id = 1;
        // }

        // $items = array();

        // foreach (Cart::content() as $item) {
        //     array_push($items, ['name'  => $item->name, 'price' => $item->price, 'qty' => $item->qty]);
        // }

        // $cart['items'] = $items;

        // $cart['invoice_id'] = config('paypal.invoice_prefix') . '_' . $order_id;
        // $cart['invoice_description'] = "Invoice #$order_id";

        // $total = 0;
        // foreach ($cart['items'] as $item) {
        //     $total += $item['price'] * $item['qty'];
        // }
        // $cart['total'] = $total;

        // $invoice = new Invoice();
        // $invoice->title = $cart['invoice_description'];
        // $invoice->price = $cart['total'];
        // $invoice->paid = 1;
        // $invoice->user_id = $this->user->id;
        // $invoice->save();

        // Mail::to($this->user)->send(new InvoicePaid($invoice));

        // collect($cart['items'])->each(function ($product) use ($invoice) {
        //     $item = new Item();
        //     $item->invoice_id = $invoice->id;
        //     $item->item_name = $product['name'];
        //     $item->item_price = $product['price'];
        //     $item->item_qty = $product['qty'];

        //     $item->save();
        // });

        // Cart::destroy();






        //MOVED TO SHOPCONTROLLER
        // dispatch(new StoreSelfEnrolment($this->user));

        // $invoice = Invoice::find(session('invoice_id'));
        // $invoice->payment_method = 'paypal';
        // $invoice->save();

        // return redirect()->route('invoice.show', $invoice->id);

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

    public function applyCoupon()
    {
        $user = User::find(auth()->id());
        $this->coupon_code = strval($this->coupon_code);

        try {
            $amount = (int)json_decode($user->redeemCode($this->coupon_code)->data)->amount;
            Cart::add('123', 'Discount', 1, -$amount);
        } catch (Throwable $e) {
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
