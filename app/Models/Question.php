<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    /**
     * The exams that belong to the question.
     */
    public function exams()
    {
        return $this->belongsToMany(Exam::class);
    }
}
