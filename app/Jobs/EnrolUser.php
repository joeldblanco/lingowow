<?php

namespace App\Jobs;

use App\Models\Enrolment;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class EnrolUser implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $enrolment;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($student_id, $teacher_id, $course_id)
    {
        $this->enrolment = Enrolment::withTrashed()->updateOrCreate(
            ['student_id' => $student_id, 'course_id' => $course_id],
            ['teacher_id' => $teacher_id, 'deleted_at' => NULL]
        );

        session('enrolment_id', $this->enrolment->id);

        //CHANGING STUDENT'S ROLE FROM 'GUEST' TO 'STUDENT'//
        $student = User::find($student_id);
        $student->removeRole('guest');
        $student->assignRole('student');
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
