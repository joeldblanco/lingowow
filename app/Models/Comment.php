<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    /**
     * Get the teacher associated with the class.
     */
    public function author()
    {
        return $this->hasOne(User::class, 'id', 'author_id');
    }

    /**
     * Get the parent commentable model (post or class).
     */
    public function commentable()
    {
        return $this->morphTo();
    }
}
