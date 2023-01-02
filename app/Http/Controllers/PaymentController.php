<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use Illuminate\Support\Facades\Http;

class PaymentController extends Controller
{
    public function checkout(Request $request)
    {
        $securityToken = $this->getSecurityToken();

        dd($this->getSessionToken($securityToken));
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
                'clientIp' => '',
                'merchantDefineData' => [
                    'MDD1' => '',
                    'MDD2' => '',
                    'MDD3' => '',
                    'MDD4' => '',
                    'MDD5' => '',
                    'MDD6' => '',
                    'MDD7' => '',
                    'MDD8' => '',
                    'MDD9' => '',
                    'MDD10' => '',
                    'MDD11' => '',
                    'MDD12' => '',
                    'MDD13' => '',
                    'MDD14' => '',
                    'MDD15' => '',
                    'MDD16' => '',
                    'MDD17' => '',
                    'MDD18' => '',
                    'MDD19' => '',
                    'MDD20' => '',
                ],
            ],
        ];

        $response = Http::withHeaders($headers)->post($path, $body);

        return $response->getStatusCode() === 201 ? $response->body() : null;
    }
}
