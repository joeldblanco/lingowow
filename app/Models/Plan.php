<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Plan extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'slug',
        'monthly_classes',
        'product_id',
    ];

    /**
     * Get all of the features for the plan.
     */
    public function features()
    {
        return $this->belongsToMany(Feature::class)->withPivot('status');
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
