<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;

    /**
     * The products that belong to the plan.
     */
    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}
