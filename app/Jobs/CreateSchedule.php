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
        // $classes_dates = session('classes_dates');
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
            'attendee_id' => $enrolment->student->id,
        ];

        $request = new Request($data);
        $meeting_id = (new MeetingController)->store($request, true);
        // $meeting_id = null;

        //CREATING CLASSES (CLASS BOOKING)//
        foreach ($classes_dates as $date) {
            // CreateClasses::dispatch($date, $enrolment->id);
            dispatch(new CreateClasses($date, $enrolment_id, $meeting_id));
        }

        $student_schedule = json_decode(session('user_schedule'));
        // $student = User::find($student_id);
        // $timezone = Carbon::now()->setTimezone($student->timezone);
        // $schedule_utc = [];
        // foreach ($student_schedule as $key => $value) {
        //     $date = Carbon::now();
        //     $date_local = Carbon::parse('Next ' . Carbon::now()->setISODate($date->year, $date->weekOfYear, $value[1])->format('l') . ' at ' . $value[0] . ':00');
        //     $schedule_utc[$key][0] = (int)$date_local->copy()->subHours($timezone->offsetHours)->hour;
        //     $schedule_utc[$key][1] = (int)$date_local->copy()->subHours($timezone->offsetHours)->dayOfWeek;
        // }
        // $student_schedule = $schedule_utc;
        // UPDATING OR CREATING A SCHEDULE ON THE DATABASE FOR THE GIVEN USER AND ENROLMENT
        Schedule::withTrashed()->updateOrCreate(
            ['user_id' => $student_id, 'enrolment_id' => $enrolment_id],
            ['selected_schedule' => $student_schedule, 'deleted_at' => NULL]
        );

        //SENDING NOTIFICATION TO TEACHER//
        Notification::sendNow($this->teacher, new BookedClass($this->student_id));
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
