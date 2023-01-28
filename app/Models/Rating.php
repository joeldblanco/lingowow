<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;

    protected $fillable = [
        'rating',
        'user_id',
        'class_id',
    ];

    /**
     * Get the class that owns the rating.
     */
    public function class()
    {
        return $this->belongsTo(Classes::class);
    }
}
