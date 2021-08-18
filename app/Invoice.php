<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Invoice extends Model
{
    //
    public function items()
    {
        return $this->hasMany(Item::class, 'invoice_id');
    }

    public function show($id){
        
        $invoice = DB::table('invoices')->where('id',$id)->get();

        if(empty($invoice[0]) || $invoice[0]->user_id != auth()->id()){
            return "403 | USER DOES NOT HAVE THE RIGHT ROLES.";
        }else{
            return view('invoice',compact('invoice'));
        }
    }
}