<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ChatwootController extends Controller
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
     * Send a message to Chatwoot
     *
     * @param Request $request
     * @return void
     */
    public function sendMessage(Request $request)
    {
        // Validate the request
        $request->validate([
            'message' => 'required|string',
            'channel_id' => 'required|string',
        ]);

        $response = Http::withHeaders([
            'Authorization' => 'Bearer MLLgLJTFH2sVwRwixrAWd42d',
            'Content-Type' => 'application/json',
        ])->post('https://api.chatwoot.com/v1/messages', [
            'message' => $request->message,
            'channel_id' => $request->channel_id,
        ]);

        return $response->json();
    }

    function createContact()
    {
        $response = Http::withHeaders([
            'api_access_token' => 'MLLgLJTFH2sVwRwixrAWd42d',
            'Content-Type' => 'application/json',
        ])->post('https://app.chatwoot.com/api/v1/accounts/78614/contacts', [
            'inbox_id' => 1,
            'name' => auth()->user()->first_name . ' ' . auth()->user()->last_name,
            'email' => auth()->user()->email,
            'identifier' => auth()->user()->id,
            'custom_attributes' => [
                'role' => auth()->user()->getRoleNames()->first(),
            ],
        ]);

        return $response->json();
    }
}
