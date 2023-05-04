<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index(Request $request)
    {
        $response = [];
        if (session()->has('code')) {
            $response['code'] = session()->get('code');
            session()->forget('code');
        }

        if (session()->has('message')) {
            $response['message'] = session()->get('message');
            session()->forget('message');
        }

        $products = Product::all();

        session(['selected_course' => 1]);

        return view('shop.index', compact('response', 'products'));
    }

    public function scheduleSelection(Request $request)
    {
        $request->validate([
            'plan' => 'required|integer|min:1|max:4'
        ]);

        $plan = $request->plan;
        // $preselection = !empty($request->preselection) ? $request->preselection : false;

        return view('calendar-selection', compact('plan'));
    }
}
