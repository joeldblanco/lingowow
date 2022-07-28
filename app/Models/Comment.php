<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'class_comments';

    /**
     * Get the teacher associated with the class.
     */
    public function author()
    {
        // dd($this->author);
        return User::find($this->author);
    }

    protected $fillable = [
        'comment',
        'class_id',
        'author'
    ];
}
