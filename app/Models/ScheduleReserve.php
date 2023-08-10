<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ScheduleReserve extends Model
{

    use SoftDeletes;

    protected $table = 'schedule_reserve';
    protected $fillable = ['user_id', 'teacher_id', 'selected_schedule', 'type', 'deleted_at'];
    use HasFactory;

    public static function schedulesReserves($teacher_id)
    {
        $schedules = [];
        $schedules_exam = [];
        $schedule = ScheduleReserve::where('teacher_id', $teacher_id)->where('type', 'schedule')->whereNotNull('selected_schedule')->pluck('selected_schedule');
        $exam = ScheduleReserve::where('teacher_id', $teacher_id)->where('type', 'exam')->whereNotNull('selected_schedule')->pluck('selected_schedule');

        foreach ($schedule as $value) {
            foreach (json_decode($value) as $day) {
                $schedules[] = $day;
            }
        }

        foreach ($exam as $value) {
            foreach (json_decode($value) as $day) {
                $schedules_exam[] = $day;
            }
        }

        return [$schedules, $schedules_exam];
        // dd($schedules, $schedules_exam); 
    }
}
