<?php

namespace App\Jobs;

use App\Http\Controllers\MeetingController;
use App\Models\Enrolment;
use App\Models\Schedule;
use App\Models\User;
use App\Notifications\BookedClass;
use Carbon\Carbon;
use Illuminate\Http\Request;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

use Illuminate\Support\Facades\Notification;

class CreateSchedule implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $schedule;
    protected $teacher, $student_id;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($student_id, $enrolment_id)
    {
        //VARIABLE INITIALIZATION//
        if (empty($student_id)) {
            $student_id = auth()->user()->id;
        }
        $this->student_id = $student_id;
        $this->teacher = User::find(session('teacher_id'));
        $student_schedule = json_decode(session('user_schedule'));
        $classes_dates = session('classes_dates');
        $enrolment = Enrolment::find($enrolment_id);

        //ADDING CLASS DURATION (40 MIN) TO CLASS START DATETIME AND STORING IT IN ANOTHER VARIABLE (TO CREATE CLASS END DATETIME)//
        $classes_dates = session('classes_dates');
        foreach ($classes_dates as $key => $value) {

            // $classes_dates[$key] = [];

            $classes_start = new Carbon($value);
            $classes_end = new Carbon($value);

            $classes_dates[$key] = [
                $classes_start->toDateTimeString(),
                $classes_end->addMinutes(40)->toDateTimeString()
            ];
        }

        //CREATING MEETING//
        //BOOKING STUDENT'S MEETINGS//
        $data = [
            'topic' => $enrolment->student->first_name . ' ' . $enrolment->student->last_name . ' - Lesson Room',
            'host_id' => $enrolment->teacher->id,
            'atendee_id' => $enrolment->student->id,
        ];

        $request = new Request($data);
        $meeting_id = (new MeetingController)->store($request, true);

        //CREATING CLASSES (CLASS BOOKING)//
        foreach ($classes_dates as $date) {
            // CreateClasses::dispatch($date, $enrolment->id);
            dispatch(new CreateClasses($date, $enrolment_id, $meeting_id));
        }

        // UPDATING OR CREATING A SCHEDULE ON THE DATABASE FOR THE GIVEN USER AND ENROLMENT
        Schedule::withTrashed()->updateOrCreate(
            ['user_id' => $student_id, 'enrolment_id' => $enrolment_id],
            ['selected_schedule' => $student_schedule, 'deleted_at' => NULL]
        );
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //SENDING NOTIFICATION TO TEACHER//
        Notification::sendNow($this->teacher, new BookedClass($this->student_id));
    }
}
