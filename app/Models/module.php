<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    use HasFactory;

    /**
     * Get the units for the module.
     */
    public function units()
    {
        return $this->hasMany(Unit::class);
    }
}
