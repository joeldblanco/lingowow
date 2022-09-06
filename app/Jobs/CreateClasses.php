<?php

namespace App\Jobs;

use App\Http\Controllers\MeetingController;
use App\Models\Classes;
use App\Models\Enrolment;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Http\Request;

class CreateClasses implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $class;
    public $teacher;
    public $student;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($date, $enrolment_id)
    {
        $enrolment = Enrolment::find($enrolment_id);
        $this->class = Classes::create([
            'start_date' => $date[0],
            'end_date' => $date[1],
            'enrolment_id' => $enrolment->id,
        ]);
        $this->teacher = User::find($enrolment->teacher_id);
        $this->student = User::find($enrolment->student_id);
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //BOOKING STUDENT'S MEETINGS//
        $data = [
            'topic' => $this->student->first_name . ' ' . $this->student->last_name . ' - Lesson Room',
            'host_id' => $this->teacher->id,
            'atendee_id' => $this->student->id,
            'date' => $this->class->start_date,
        ];
        $request = new Request($data);
        (new MeetingController)->store($request, true, $this->class);
    }
}
