<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use HasFactory;

    /**
     * The questions that belong to the exam.
     */
    public function questions()
    {
        return $this->belongsToMany(Question::class);
    }

    /**
     * Get the attempts for the exam.
     */
    public function attempts()
    {
        return $this->hasMany(Attempt::class);
    }

}
