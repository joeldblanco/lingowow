<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;

    /**
     * The users associated with the activity.
     */
    public function users()
    {
        return $this->belongsToMany(User::class)->withPivot('user_type');
    }

    /**
     * Get the unit that owns the activity.
     */
    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }
}
