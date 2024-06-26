<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Unit extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'module_id',
        'name',
        'status',
        'image',
    ];

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
        return $this->belongsTo(Group_unit::class, "group_id");
    }

    /**
     * Get the module that owns the unit.
     */
    public function module()
    {
        return $this->belongsTo(Module::class);
    }

    /**
     * Get the course that owns the unit.
     */
    public function course()
    {
        return $this->module->course;
    }

    /**
     * Get unit exams.
     */
    public function exams()
    {
        return $this->hasMany(Exam::class);
    }

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

    /**
     * Get all unit contents.
     */
    public function contents()
    {
        return $this->hasMany(Content::class);
    }

    /**
     * Get all of the attempts for the unit.
     */
    public function attempts(): HasManyThrough
    {
        return $this->hasManyThrough(Attempt::class, Exam::class);
    }
}
//
