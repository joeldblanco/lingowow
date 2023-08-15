<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Invoice extends Model
{
    protected $fillable = [
        'title',
        'price',
        'paid',
        'user_id',
        'payment_method',
    ];

    //
    public function items()
    {
        return $this->hasMany(Item::class, 'invoice_id');
    }

    /**
     * Get the user that owns the invoice.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}