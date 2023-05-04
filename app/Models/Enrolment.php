<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Enrolment extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = ['*'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['student_id', 'teacher_id', 'course_id', 'deleted_at'];

    /**
     * Get the classes associated with the enrolment.
     */
    public function classes()
    {
        return $this->hasMany(Classes::class);
    }

    /**
     * Get the schedule associated with the enrolment.
     */
    public function schedule()
    {
        return $this->hasOne(Schedule::class);
    }

    /**
     * Get the course associated with the enrolment.
     */
    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }

    /**
     * Get the teacher associated with the enrolment.
     */
    public function teacher()
    {
        return $this->belongsTo(User::class, 'teacher_id')->withTrashed();
    }

    /**
     * Get the student associated with the enrolment.
     */
    public function student()
    {
        return $this->belongsTo(User::class, 'student_id');
    }

    public function preselection()
    {
        return $this->hasOne(Preselection::class);
    }
}
