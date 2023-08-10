<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Answer extends Model
{
    use HasFactory;
    use SoftDeletes;

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
