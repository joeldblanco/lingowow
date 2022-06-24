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
     * Get the comments for the post.
     */
    public function comments()
    {
        return $this->hasMany(PostComment::class);
    }

    /**
     * Get the likes for the post.
     */
    public function likes()
    {
        return $this->hasMany(User::class);
    }
}
