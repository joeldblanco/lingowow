<?php

namespace App\Http\Controllers;

use App\Invoice;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Cart;
use App\Item;
use App\Models\Course;
use App\Models\Enrolment;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class PaymentController extends Controller
{
    public function createButton(Request $request)
    {
        $securityToken = $this->getSecurityToken();
        $sessionToken = $this->getSessionToken($securityToken);
        $purchaseNumber = Invoice::all()->last()->id + 1;
        session(['purchaseNumber' => $purchaseNumber]);
        $ammount = Cart::total();

        $timestamp = Carbon::createFromTimestampMs((json_decode($sessionToken))->expirationTime); //This code creates a Carbon object from the expirationTime property in miliseconds of the sessionToken. It then converts the Carbon object to a DateTime string.
        $now = Carbon::now('UTC');
        $expirationTimeInMinutes = $timestamp->diffInMinutes($now);

        return view('payments.checkout', compact('sessionToken', 'purchaseNumber', 'ammount', 'expirationTimeInMinutes'));
    }

    public function getSecurityToken()
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

    public function getSessionToken($securityToken)
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

        if ($transactionToken) {
            $this->requestTransactionAuthorization($transactionToken);
        } else {
            return redirect()->route('cart.index')->with('error', 'No se pudo procesar el pago');
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
                'currency' => 'USD'
            ],
        ];

        $response = Http::withHeaders($headers)->post($path, $body);

        // return $response->getStatusCode() === 200 ? $response->body() : null;

        $invoice = $this->createInvoice($response->getStatusCode());

        if ($invoice->paid) {
            // session()->put(['code' => 'success', 'message' => "Order $invoice->id has been paid successfully!"]);
            // $users = User::all();
            // $items = Item::all();

            foreach (Cart::content() as $item) {
                if ($item->name === "Enrolment") {
                    $current_user = User::find(auth()->id());
                    $current_user->removeRole('guest');
                    $current_user->assignRole('student');
                }
            }

            $student = auth()->user();
            $course_id = session('selected_course');

            //CHANGING STUDENT'S ROLE FROM 'GUEST' TO 'STUDENT'//
            $student->removeRole('guest');
            $student->assignRole('student');

            $product = Course::find($course_id)->products->first();
            if ($product->courses->first()->modality == "synchronous") {
                $teacher = User::find(session('teacher_id'));

                //CREATING STUDENT'S ENROLMENT (OR UPDATING IT, IN CASE IT ALREADY EXISTS BUT IS SOFTDELETED)//
                $enrolment = Enrolment::withTrashed()->updateOrCreate(
                    ['student_id' => $student->id, 'course_id' => $course_id],
                    ['teacher_id' => $teacher->id, 'deleted_at' => NULL]
                );

                SchedulingCalendarController::store(auth()->user()->id, $enrolment);
            } else {

                //CREATING STUDENT'S ENROLMENT (OR UPDATING IT, IN CASE IT ALREADY EXISTS BUT IS SOFTDELETED)//
                $enrolment = Enrolment::withTrashed()->updateOrCreate(
                    ['student_id' => $student->id, 'course_id' => $course_id],
                    ['teacher_id' => NULL, 'deleted_at' => NULL]
                );
            }

            

            Cart::destroy();

            return redirect()->route('invoice.show', ['id' => $invoice->id]);
        } else {
            session()->put(['code' => 'danger', 'message' => "Error processing payment for Order $invoice->id!"]);
        }

        return redirect()->route('shop');
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
        $invoice->title = "Invoice #" . $purchaseNumber;
        $invoice->price = Cart::total();
        if ($status == 200) {
            $invoice->paid = 1;
        } else {
            $invoice->paid = 0;
        }
        $invoice->user_id = auth()->id();
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
