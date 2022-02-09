<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Enrolment extends Model
{
    use HasFactory;
    use SoftDeletes;

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
        return $this->belongsTo(Course::class,'course_id');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['student_id','teacher_id','course_id','deleted_at'];
}
