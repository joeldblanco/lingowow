<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Question extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'exam_id',
        'title',
        'description',
        'type',
        'marks',
        'options',
        'file_path',
        'order',
    ];

    /**
     * The exams that belong to the question.
     */
    public function exam()
    {
        return $this->belongsTo(Exam::class);
    }

    /**
     * The answer that belong to the question.
     */
    public function answer()
    {
        return $this->hasOne(Answer::class);
    }

    // /**
    //  * The attempts that belong to the question.
    //  */
    // public function attempt()
    // {
    //     return $this->belongsTo(Attempt::class);
    // }

    // public function answer()
    // {
    //     $answer = json_decode($this->data);
    //     $answer = json_decode(json_encode($answer->options), true);
    //     $answer = $answer["selected-option"];

    //     return $answer;
    // }


}
