<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'classes';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['start_date','end_date','enrolment_id'];

    /**
     * Get the student associated with the class.
     */
    public function student()
    {
        return User::find(Enrolment::withTrashed()->find($this->enrolment_id)->student_id);
    }

    /**
     * Get the teacher associated with the class.
     */
    public function teacher()
    {
        return User::find(Enrolment::withTrashed()->find($this->enrolment_id)->teacher_id);
    }

    /**
     * Get the comments for class.
     */
    public function comments()
    {
        return $this->hasMany(Comment::class, 'class_id');
    }

}
