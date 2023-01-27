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
        $this->getAuthToken();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $url = 'https://api-m.sandbox.paypal.com/v1/oauth2/token';

        $body = [
            'grant_type' => 'client_credentials',
        ];

        $response = Http::withHeaders([
            'Authorization' => 'Basic',
            'Username' => 'Af_I11EdYdIS6aMYynZaJh9b6tIjESm3awzI8vN-GwHYNlVMPoQuK8vpppM6gJf8pWAmirWQHIVlRWZq',
            'Password' => 'EL6-cKYicub9x03THrCwb46DrdkEmeEkuCKOH6_2aVDdoC34LEtPPN6nNy3HI7e8H_1ghFHbz6JoZBBZ',
            'Content-Type'  => ' application/x-www-form-urlencoded',
        ])->post($url, $body);

        $success = json_decode($response->getBody(), true);

        dd($success);

        // if ($success) {
        //     $data = json_decode($response->getBody(), true);
        // } else {

        // }
    }
}
