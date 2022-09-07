<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    use HasFactory;

    /**
     * Get the course that owns the module.
     */
    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    /**
     * Get the units for the module.
     */
    // public function units()
    // {
    //     return $this->hasMany(Unit::class);
    // }

    /**
     * Get the units for the module by groups.
     */
    public function groups()
    {
        return $this->hasMany(GroupUnit::class);
    }
}
