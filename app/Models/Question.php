<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Question extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * The exams that belong to the question.
     */
    public function exams()
    {
        return $this->belongsToMany(Exam::class);
    }

    public function answer()
    {
        $answer = json_decode($this->data);
        $answer = json_decode(json_encode($answer->options),true);
        $answer = $answer["selected-option"];

        return $answer;
    }
}
