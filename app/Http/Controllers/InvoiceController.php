<?php

namespace App\Http\Controllers;

use App\Invoice;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $invoices = Invoice::where('user_id', auth()->id())->latest()->paginate(20);

        return view('components.invoices-component', compact('invoices'));
    }

    public function adminIndex()
    {
        $invoices = Invoice::latest()->paginate(20);

        return view('admin.invoices.index', compact('invoices'));
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
        $invoice = Invoice::where('id', $id)->first();

        if (empty($invoice) || ($invoice->user_id != auth()->id() && auth()->user()->roles[0]->name != "admin")) {
            abort(403, 'USER DOES NOT HAVE THE RIGHT ROLES.');
        } else {
            return view('invoice', compact('invoice'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $invoice = Invoice::find($id);
        return view('admin.invoices.edit', compact('invoice'));
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
        if ($request->invoice_paid == 'on') {
            $invoice_paid = 1;
        } elseif ($request->invoice_paid == null) {
            $invoice_paid = 0;
        } else {
            return redirect()->route('admin.invoices')->with('error', 'Invoice not updated.');
        }

        $invoice = Invoice::find($id);
        $invoice->paid = $invoice_paid;
        $invoice->save();

        return redirect()->route('admin.invoices')->with('success', 'Invoice updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $invoice = Invoice::find($id);
        $invoice->delete();

        return redirect()->route('admin.invoices')->with('success', 'Invoice deleted successfully.');
    }

    /**
     * Pay the specified invoice.
     *
     * @param  int  $id
     * @return bool $status
     */
    public static function pay($id)
    {
        $invoice = Invoice::find($id);
        $invoice->paid = 1;
        $invoice->save();

        return true;
    }
}
