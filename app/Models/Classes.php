<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Classes extends Model
{
    use HasFactory;
    use SoftDeletes;

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
    protected $fillable = ['start_date', 'end_date', 'enrolment_id', 'teacher_check', 'student_check', 'comment', 'meeting_id'];

    /**
     * Get the student associated with the class.
     */
    public function student()
    {
        return User::withTrashed()->find(Enrolment::withTrashed()->find($this->enrolment_id)->student_id);
    }

    /**
     * Get the teacher associated with the class.
     */
    public function teacher()
    {
        return User::withTrashed()->find(Enrolment::withTrashed()->find($this->enrolment_id)->teacher_id);
    }

    /**
     * Get all of the class' comments.
     */
    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    /**
     * Get the enrolment associated with the user.
     */
    public function enrolment()
    {
        return $this->belongsTo(Enrolment::class);
    }

    /**
     * Get the meeting associated with the user.
     */
    public function meeting()
    {
        return $this->belongsTo(Meeting::class);
    }
}
