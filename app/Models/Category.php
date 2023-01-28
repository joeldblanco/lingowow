<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    /**
     * Get all of the products that are assigned this category.
     */
    public function products()
    {
        return $this->morphedByMany(Product::class, 'categorizable');
    }

    /**
     * Get all of the courses that are assigned this category.
     */
    public function courses()
    {
        return $this->morphedByMany(Course::class, 'categorizable');
    }
}
