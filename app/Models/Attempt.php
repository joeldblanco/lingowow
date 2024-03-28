<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attempt extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'exam_id',
        'score',
        'completed_at',
    ];

    /**
     * Get the exam that owns the attempt.
     */
    public function exam()
    {
        return $this->belongsTo(Exam::class)->withTrashed();
    }

    /**
     * Get the duration of the attempt.
     */
    public function duration()
    {
        return $this->exam->duration;
    }

    /**
     * Get the user that owns the attempt.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the answers for the attempt.
     */
    public function answers()
    {
        return $this->hasMany(Answer::class)->withTrashed();
    }
}
