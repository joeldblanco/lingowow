<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;

    protected $casts = [
        'data' => 'array', // Esto asegura que la columna 'data' se interprete como un array al acceder a ella
    ];

    // Accesor para 'data' que realiza json_decode automáticamente
    public function getDataAttribute($value)
    {
        return json_decode($value, true);
    }
}
