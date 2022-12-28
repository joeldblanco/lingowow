<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use aberkanidev\Coupons\Traits\HasCoupons;

class Product extends Model
{
    use HasFactory;
    use HasCoupons;

    /**
     * Get the courses associated with the product.
     */
    public function courses()
    {
        return $this->belongsToMany(Course::class);
    }
}
