<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use App\Models\Product;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coupons = Coupon::orderBy('updated_at', 'desc')->paginate(10);
        return view('coupons.index', compact('coupons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $couponTypes = ['amount', 'percentage'];
        $products = Product::all();
        return view('coupons.create', compact('couponTypes', 'products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'coupon_value' => 'required|numeric|min:0',
            'coupon_type' => 'required|in:amount,percentage',
            'product_id' => 'required|exists:products,id',
        ]);

        $couponType = $request->input('coupon_type');
        $couponValue = $request->input('coupon_value');
        $productId = $request->input('product_id');

        $product = Product::find($productId);

        if ($product) {
            if ($couponType === 'amount') {
                $coupon = $product->createCoupon(data: ['type' => 'amount', 'value' => $couponValue], is_disposable: true);
            } elseif ($couponType === 'percentage') {
                $coupon = $product->createCoupon(data: ['type' => 'percentage', 'value' => $couponValue], is_disposable: true);
            }

            $successString = "Coupon {$coupon->code} created successfully.";

            return redirect()->route('coupons.index')->with('success', $successString);
        } else {
            return redirect()->back()->with('error', "Product doesn't exist.");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('coupons.show', ['coupon' => Coupon::find($id)]);
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
        Coupon::find($id)->delete();
        return redirect()->route('coupons.index');
    }
}
