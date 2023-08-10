<?php

namespace App\Console;

use App\Http\Controllers\ApportionmentController;
use App\Http\Controllers\EnrolmentController;
use App\Http\Controllers\GatherController;
use App\Http\Controllers\MeetingController;
use App\Jobs\CreateClasses;
use App\Models\Attempt;
use App\Models\Classes;
use App\Models\Course;
use App\Models\Enrolment;
use App\Models\Schedule as ModelsSchedule;
use App\Models\ScheduleReserve;
use App\Models\User;
use App\Notifications\UpcomingClassForStudent;
use App\Notifications\UpcomingClassForTeacher;
use App\Notifications\UpcomingTestForStudent;
use App\Notifications\UpcomingTestForTeacher;
use Carbon\Carbon;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Notification;
use PhpParser\Node\Stmt\Foreach_;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();

        $schedule->call(function () {

            $current_period = json_decode(DB::table('metadata')->where('key', '=', 'current_period')->first()->value);
            $now = Carbon::now();
            $current_period_end = new Carbon($current_period->end_date);
            // $current_period_end = (new Carbon($now))->subDays(1);

            if ($now->greaterThan($current_period_end)) {

                //HERE ALL NEW PERIOD CALCULATIONS ARE MADE


                $students = Enrolment::where('student_id', '!=', null)->get()->pluck('student');
                foreach ($students as $student) {
                    $classes = $student->studentClasses;
                    $pending_classes = count($student->studentClasses);
                    foreach ($classes as $class) {
                        if ($class->start_date <= now()) {
                            $pending_classes--;
                        }
                    }

                    if ($pending_classes <= 0) {
                        $enrolment = Enrolment::where('student_id', $student->id)->first();
                        if ($enrolment && $enrolment->course->modality == 'synchronous') {
                            $user_schedule = ModelsSchedule::where('user_id', $student->id)->where('enrolment_id', $enrolment->id)->first();
                            $preselection = $enrolment->preselection;
                            if (empty($preselection)) {
                                $enrolment->delete();
                                $user_schedule->delete();
                                $student->removeRole('student');
                                $student->assignRole('guest');
                            } else {
                                $user_schedule = ModelsSchedule::where('user_id', $student->id)->where('enrolment_id', $enrolment->id)->first();
                                $user_schedule->selected_schedule = $preselection->schedule;
                                $user_schedule->save();

                                $enrolment->teacher_id = $preselection->teacher_id;
                                $enrolment->save();
                                $preselection->delete();

                                $classes_dates = ApportionmentController::calculateApportionment(count($user_schedule->selected_schedule), json_encode($user_schedule->selected_schedule), $enrolment->course->id, true)[2];
                                // dump();
                                // URGENT SCHEDULE NEW CLASSES
                                //ADDING CLASS DURATION (40 MIN) TO CLASS START DATETIME AND STORING IT IN ANOTHER VARIABLE (TO CREATE CLASS END DATETIME)//
                                // $classes_dates = session('classes_dates');
                                foreach ($classes_dates as $key => $value) {
                                    $classes_dates[$key] = [];

                                    $classes_dates[$key][0] = new Carbon($value);
                                    $classes_dates[$key][0] = $classes_dates[$key][0]->toDateTimeString();

                                    $classes_dates[$key][1] = new Carbon($value);
                                    $classes_dates[$key][1] = $classes_dates[$key][1]->addMinutes(40);
                                    $classes_dates[$key][1] = $classes_dates[$key][1]->toDateTimeString();
                                }

                                //CREATING MEETING//
                                $data = [
                                    'topic' => $enrolment->student->first_name . ' ' . $enrolment->student->last_name . ' - Lesson Room',
                                    'host_id' => $enrolment->teacher->id,
                                    'atendee_id' => $enrolment->student->id,
                                ];

                                $request = new Request($data);
                                $meeting_id = (new MeetingController)->store($request, true);

                                //CREATING CLASSES (CLASS BOOKING)//
                                foreach ($classes_dates as $date) {
                                    CreateClasses::dispatch($date, $enrolment->id, $meeting_id);
                                }
                            }
                        }
                    }
                }

                // $today = (new carbon())->hour(0)->minute(0)->second(0);
                // $end_period = (new Carbon(ApportionmentController::currentPeriod(true)[1]))->hour(0)->minute(0)->second(0);
                // if ($today->greaterThan($end_period)) {
                DB::table('metadata')->where('key', '=', 'current_period')->update([
                    'value' => json_encode([
                        "start_date" => ApportionmentController::nextPeriod(true)[0],
                        "end_date" => ApportionmentController::nextPeriod(true)[1],
                    ])
                ]);
                // }

                GatherController::setGuestsList();
            }

            $notified_students = User::find(DB::table('notifications')->where('created_at', '>=', Carbon::now()->subHours(1))->where('notifiable_type', 'App\Models\User')->where('type', 'App\Notifications\UpcomingClassForStudent')->get('notifiable_id')->pluck('notifiable_id')->unique());
            $notified_teachers = User::find(DB::table('notifications')->where('created_at', '>=', Carbon::now()->subHours(1))->where('notifiable_type', 'App\Models\User')->where('type', 'App\Notifications\UpcomingClassForTeacher')->get('notifiable_id')->pluck('notifiable_id')->unique());
            $classes = Classes::where('start_date', '<=', Carbon::now()->addHour())->where('start_date', '>', Carbon::now())->get();

            foreach ($classes as $class) {
                if (!$notified_teachers->contains($class->teacher())) {
                    if (str_contains($class->enrolment->course->name, 'Test')) {
                        Notification::sendNow($class->teacher(), new UpcomingTestForTeacher($class));
                    } else {
                        Notification::sendNow($class->teacher(), new UpcomingClassForTeacher($class));
                    }
                }

                if (!$notified_students->contains($class->student())) {
                    if (str_contains($class->enrolment->course->name, 'Test')) {
                        Notification::sendNow($class->student(), new UpcomingTestForStudent($class));
                    } else {
                        Notification::sendNow($class->student(), new UpcomingClassForStudent($class));
                    }
                }
            }


            $reserves = ScheduleReserve::where('updated_at', '<=', Carbon::now()->subMinutes(20))->get();
            foreach ($reserves as $reserve) {
                $reserve->delete();
            }

            $tests = Course::where('name', 'like', '%test%')->get();
            foreach ($tests as $test) {
                $testEnrolments = Enrolment::where('course_id', $test->id)->get();
                foreach ($testEnrolments as $enrolment) {
                    $pendingTests = 0;
                    foreach ($enrolment->classes->pluck('end_date') as $class) {
                        $carbonDate = Carbon::parse($class);

                        if (now()->lessThan($carbonDate)) {
                            $pendingTests++;
                        }
                    }

                    if ($pendingTests <= 0) {
                        (new EnrolmentController)->destroy($enrolment);
                    }
                }
            }
        })->everyMinute();

        // $schedule->call(function () {
        //     $attempts = Attempt::whereNull('completed_at')->get();

        //     foreach ($attempts as $attempt) {
        //         if (now() >= $attempt->created_at->copy()->addMinutes($attempt->duration())) {
        //             $attempt->completed_at = now()->toDateTimeString();
        //             $attempt->save();
        //         }
        //     }
        // })->everyMinute();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
