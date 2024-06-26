<?php

namespace App\Http\Controllers;

use App\Invoice;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Item;
use App\Jobs\StoreSelfEnrolment;
use App\Mail\InvoicePaid;
use App\Models\Course;
use App\Models\Enrolment;
use App\Models\User;
use App\View\Components\NiubizCheckoutButton;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class PaymentController extends Controller
{
    public function createButton(Request $request)
    {
        $securityToken = $this->getSecurityToken();
        $sessionToken = $this->getSessionToken($securityToken);
        $purchaseNumber = Invoice::all()->last()->id + 1;
        session(['purchaseNumber' => $purchaseNumber]);
        $amount = Cart::total();

        $timestamp = Carbon::createFromTimestampMs((json_decode($sessionToken))->expirationTime); //This code creates a Carbon object from the expirationTime property in miliseconds of the sessionToken. It then converts the Carbon object to a DateTime string.
        $now = Carbon::now('UTC');
        $expirationTimeInMinutes = $timestamp->diffInMinutes($now);

        $button = new NiubizCheckoutButton($sessionToken, $purchaseNumber, $amount, $expirationTimeInMinutes);

        // return view('payments.checkout', compact('sessionToken', 'purchaseNumber', 'amount', 'expirationTimeInMinutes'));
        return $button;
    }

    public static function getSecurityToken()
    {
        $path = "https://apiprod.vnforapps.com/api.security/v1/security";
        $auth = base64_encode(env('NIUBIZ_API_USERNAME', '') . ":" . env('NIUBIZ_API_PASSWORD', ''));

        $headers = [
            'Authorization' => "Basic $auth",
            'Content-Type'  => 'text/plain',
        ];

        $response = Http::withHeaders($headers)->get($path);

        return $response->getStatusCode() === 201 ? $response->body() : null;
    }

    public static function getSessionToken($securityToken)
    {
        // This code creates an array called $items, which is populated with the contents of a Cart object.
        // For each item in the Cart, an array containing the item's name, price, and quantity is added to the $items array.
        $items = array();
        foreach (Cart::content() as $item) {
            array_push($items, ['name'  => $item->name, 'price' => $item->price, 'qty' => $item->qty]);
        }
        $amount = Cart::total();



        $path = "https://apiprod.vnforapps.com/api.ecommerce/v2/ecommerce/token/session/" . env('NIUBIZ_MERCHANT_ID', '');

        $headers = [
            'Authorization' => $securityToken,
            'Content-Type'  => 'application/json',
        ];

        $body = [
            'channel' => 'web',
            'amount' => $amount,
            'antifraud' => [
                // 'clientIp' => '',
                'merchantDefineData' => [
                    'MDD4' => auth()->user()->email,
                    'MDD32' => auth()->id(),
                    'MDD75' => auth()->user()->roles->first()->name,
                    'MDD77' => auth()->user()->created_at->diffInDays(now()),
                ],
            ],
        ];

        $response = Http::withHeaders($headers)->post($path, $body);

        return $response->getStatusCode() === 200 ? $response->body() : null;
    }

    public function checkout(Request $request)
    {
        $transactionToken = $request->transactionToken;
        $approved = false;

        if ($transactionToken) {
            $approved = self::requestTransactionAuthorization($transactionToken);
        } else {
            return redirect()->route('cart.index')->with('error', 'No se pudo procesar el pago. Error code: PAY-201');
        }

        if ($approved) {
            $user = auth()->user();
            ShopController::checkout($user, 'niubiz');
        } else {
            return redirect()->route('cart')->with('error', 'No se pudo procesar el pago. Error: ' . session("payment_error"));
        }
    }

    public function requestTransactionAuthorization($transactionToken)
    {
        $purchaseNumber = session('purchaseNumber');

        $path = "https://apiprod.vnforapps.com/api.authorization/v3/authorization/ecommerce/" . env('NIUBIZ_MERCHANT_ID', '');

        $headers = [
            'Authorization' => $this->getSecurityToken(),
            'Content-Type'  => 'application/json',
        ];

        $body = [
            'channel' => 'web',
            'captureType' => 'manual',
            'order' => [
                'tokenId' => $transactionToken,
                'purchaseNumber' => $purchaseNumber,
                'amount' => Cart::total(),
                'currency' => 'USD',
                'traceNumber' => $transactionToken,
            ],
        ];

        $response = Http::withHeaders($headers)->post($path, $body);
        // return $response;
        if ($response->getStatusCode() === 200) {
            return true;
            // $student = auth()->user();

            // dd(dispatch(new StoreSelfEnrolment($student)));

            // return redirect()->route('invoices.show', ['id' => session('invoice_id')]);
        } else {

            $responseBody = $response->body();
            $responseArray = json_decode($responseBody, true);

            if (isset($responseArray['data']['ACTION_DESCRIPTION'])) {
                $actionDescription = $responseArray['data']['ACTION_DESCRIPTION'];

                session(["payment_error" => $actionDescription]);
            } else {
                session(["payment_error" => "Unknown error"]);
            }

            //Log error
            Log::error('Error processing payment. User ID ' . auth()->id() . ': ' . $response->body());
            return false;
        }

        // return redirect()->route('dashboard');
    }

    /**
     * Create invoice.
     *
     * @param array  $cart
     * @param string $status
     *
     * @return \App\Invoice
     */
    protected function createInvoice($status)
    {
        $purchaseNumber = session('purchaseNumber');
        $invoice = new Invoice();
        $invoice->title = "Lingowow Invoice " . Carbon::now()->format('Y F') . " (" . auth()->id() . "-" . $purchaseNumber . ")";
        $invoice->price = Cart::total();
        if ($status == 200) {
            $invoice->paid = 1;
        } else {
            $invoice->paid = 0;
        }
        $invoice->user_id = auth()->id();
        $invoice->payment_method = 'niubiz';
        $invoice->save();

        // $items = array();
        // foreach (Cart::content() as $item) {
        //     array_push($items, ['name'  => $item->name, 'price' => $item->price, 'qty' => $item->qty]);
        // }

        foreach (Cart::content() as $product) {
            $item = new Item();
            $item->invoice_id = $invoice->id;
            $item->item_name = $product->name;
            $item->item_price = $product->price;
            $item->item_qty = $product->qty;

            $item->save();
        };

        return $invoice;
    }
}
