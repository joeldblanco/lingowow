<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Unit extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * Get the module that owns the unit.
     */
    // public function module()
    // {
    //     return $this->belongsTo(Module::class);
    // }

    /**
     * Get the group that owns the unit.
     */
    public function group()
    {
        return $this->belongsTo(GroupUnit::class,"group_id");
    }

    // public function exams()
    // {
    //     return $this->hasMany(Exam::class);
    // }

    /**
     * The users that belong to the unit.
     */
    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    /**
     * Get all unit activities.
     */
    public function activities()
    {
        return $this->hasMany(Activity::class);
    }
}
