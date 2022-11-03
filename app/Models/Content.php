<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'type',
        'title',
        'content',
        'unit_id'
    ];

    /**
     * Get the post that owns the comment.
     */
    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }
}
