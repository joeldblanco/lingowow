<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use aberkanidev\Coupons\Traits\HasCoupons;

class Product extends Model
{
    use HasFactory;
    use HasCoupons;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'regular_price',
        'sale_price',
        'image',
    ];

    /**
     * Get the courses associated with the product.
     */
    public function courses()
    {
        return $this->belongsToMany(Course::class);
    }

    /**
     * Get all of the categories for the product.
     */
    public function categories()
    {
        return $this->morphToMany(Category::class, 'categorizable');
    }
}
