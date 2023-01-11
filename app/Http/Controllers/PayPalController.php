<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PaypalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($access_token)
    {
        $token = $this->getAuthToken();

        $headers = [
            'Content-Type' => 'application/json',
            'Authorization' => $token['token_type'] . ' ' . $token['access_token'],
            // 'PayPal-Request-Id' => '7b92603e-77ed-4896-8e78-5dea2050476a'
        ];

        $payload = [
            "intent" => "CAPTURE",
            "purchase_units" => [
                [
                    "reference_id" => "d9f80740-38f0-11e8-b467-0ed5f89f718b",
                    "amount" => [
                        "currency_code" => "USD",
                        "value" => "100.00"
                    ]
                ]
            ],
            "payment_source" => [
                "paypal" => [
                    "experience_context" => [
                        "payment_method_preference" => "IMMEDIATE_PAYMENT_REQUIRED",
                        "payment_method_selected" => "PAYPAL",
                        "brand_name" => "EXAMPLE INC",
                        "locale" => "en-US",
                        "landing_page" => "LOGIN",
                        "shipping_preference" => "SET_PROVIDED_ADDRESS",
                        "user_action" => "PAY_NOW",
                        "return_url" => "https://example.com/returnUrl",
                        "cancel_url" => "https://example.com/cancelUrl"
                    ]
                ]
            ]
        ];

        $response = Http::withHeaders($headers)->post('https://api-m.sandbox.paypal.com/v2/checkout/orders', $payload);

        return $response->getStatusCode() == 201 ? json_decode($response->getBody(), true) : null;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Remove the OAuth Token for PayPal API
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getAuthToken()
    {
        $url = 'https://api-m.sandbox.paypal.com/v1/oauth2/token?grant_type=client_credentials';

        $body = [];

        $response = Http::withHeaders([
            'Authorization' => 'Basic ' . base64_encode('Af_I11EdYdIS6aMYynZaJh9b6tIjESm3awzI8vN-GwHYNlVMPoQuK8vpppM6gJf8pWAmirWQHIVlRWZq:EL6-cKYicub9x03THrCwb46DrdkEmeEkuCKOH6_2aVDdoC34LEtPPN6nNy3HI7e8H_1ghFHbz6JoZBBZ'),
            'Content-Type'  => ' application/x-www-form-urlencoded',
        ])->post($url, $body);

        return $response->getStatusCode() == 200 ? json_decode($response->getBody(), true) : null;
    }
}
