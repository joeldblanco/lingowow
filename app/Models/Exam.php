<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Exam extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'title',
        'description',
        'unit_id',
        'type',
        'passing_marks',
        'total_marks',
        'duration',
        'status',
    ];

    /**
     * The questions that belong to the exam.
     */
    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    /**
     * Get the attempts for the exam.
     */
    public function attempts()
    {
        return $this->hasMany(Attempt::class);
    }

    /**
     * Get exam unit.
     */
    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }
}
