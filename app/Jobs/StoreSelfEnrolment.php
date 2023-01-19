<?php

namespace App\Jobs;

use App\Models\Course;
use App\Models\Enrolment;
use App\Models\Module;
use App\Models\Unit;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;

class StoreSelfEnrolment implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        $student = auth()->user();
        $course_id = session('selected_course');

        //CHANGING STUDENT'S ROLE FROM 'GUEST' TO 'STUDENT'//
        $student->removeRole('guest');
        $student->assignRole('student');

        $modality_course = Course::find($course_id)->modality;
        if ($modality_course == "synchronous" || $modality_course == "exam") {
            $teacher = User::find(session('teacher_id'));

            //CREATING STUDENT'S ENROLMENT (OR UPDATING IT, IN CASE IT ALREADY EXISTS BUT IS SOFTDELETED)//
            $enrolment = Enrolment::withTrashed()->updateOrCreate(
                ['student_id' => $student->id, 'course_id' => $course_id],
                ['teacher_id' => $teacher->id, 'deleted_at' => NULL]
            );

            // SchedulingCalendarController::store(auth()->user()->id, $enrolment);
            dispatch(new CreateSchedule(auth()->user()->id, $enrolment->id));
        } else {

            //CREATING STUDENT'S ENROLMENT (OR UPDATING IT, IN CASE IT ALREADY EXISTS BUT IS SOFTDELETED)//
            $enrolment = Enrolment::withTrashed()->updateOrCreate(
                ['student_id' => $student->id, 'course_id' => $course_id],
                ['teacher_id' => NULL, 'deleted_at' => NULL]
            );
        }

        if (($student->id != null)) {

            User::find($student->id)->givePermissionTo('view units');

            if (Course::find($course_id)->categories->pluck('name')->contains('Conversational')) {

                $module = DB::table('module_user')->select('module_id')->where('user_id', auth()->user()->id)->first();
                if (empty($module)) {
                    $order = Course::find($course_id)->modules->sortBy('order')->last() == null ? 1 : Course::find($course_id)->modules->sortBy('order')->last()->order + 1;
                    $module = Module::create([
                        'name' => $student->first_name . ' ' . $student->last_name . ' - Lesson Room',
                        'course_id' => $course_id,
                        'description' => 'Welcome to your Conversational Course. 

                        Most of the content set here is based on the information sent by our students. 
                        
                        On this course, you will practice and improve the language you know. 
                        
                        Enjoy the journey.',
                        'status' => 1,
                        'order' => $order,
                    ]);

                    DB::table('module_user')->insertOrIgnore([
                        ['module_id' => $module->id, 'user_id' => auth()->user()->id],
                        ['module_id' => $module->id, 'user_id' => session('teacher_id')]
                    ]);
                }
            } else {
                $unit = Course::find($course_id)->units()->sortBy('order')->pluck('exams')->reject(function ($innerCollection) {
                    return $innerCollection->isEmpty();
                })->flatten()->first();

                if (empty($unit)) {
                    $unit_id = Course::find($course_id)->units()->sortBy('order')->first()->id;
                } else {
                    $unit_id = $unit->unit_id;
                }
                $current_unit = Unit::find(DB::table('unit_user')->select('unit_id')->where('user_id', auth()->user()->id)->first()->unit_id);
                if (empty($current_unit)) {
                    DB::table('unit_user')->insertOrIgnore([
                        ['unit_id' => $unit_id, 'user_id' => auth()->user()->id]
                    ]);
                }
            }
        }
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //
    }
}
