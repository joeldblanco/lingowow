<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WhatsAppController extends Controller
{
    public function handleCallback(Request $request)
    {
        // Access the data sent by the API
        $data = $request->all();

        // Perform any necessary logic or database operations

        return response()->json(['status' => 'success']);
    }
}
