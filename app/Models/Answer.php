<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;

    protected $fillable = [
        'answer',
        'score',
        'attempt_id',
        'question_id',
    ];

    /**
     * Get the attempt that owns the answer.
     */
    public function attempt()
    {
        return $this->belongsTo(Attempt::class);
    }
}
