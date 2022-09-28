<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * Get all of the post's comments.
     */
    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    /**
     * Get all of the post's comments.
     */
    public function author()
    {
        return User::find($this->author_id);
    }

    /**
     * Get the likes for the post.
     */
    public function likes()
    {
        return $this->belongsToMany(User::class, 'post_like');
    }
}
