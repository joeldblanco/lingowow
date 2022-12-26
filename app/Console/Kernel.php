<?php

namespace App\Console;

use App\Http\Controllers\ApportionmentController;
use App\Jobs\CreateClasses;
use App\Models\Enrolment;
use App\Models\Schedule as ModelsSchedule;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\DB;

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

            if ($now->greaterThan($current_period_end)) {

                //HERE ALL NEW PERIOD CALCULATIONS ARE MADE

                $users = Enrolment::where('student_id', '!=', null)->get()->pluck('student');
                foreach ($users as $user) {
                    $classes = $user->studentClasses;
                    $pending_classes = count($user->studentClasses);
                    foreach ($classes as $class) {
                        if ($class->start_date <= now()) {
                            $pending_classes--;
                        }
                    }

                    if ($pending_classes <= 0) {
                        $enrolment = Enrolment::where('student_id', $user->id)->first();
                        if ($enrolment) {
                            $user_schedule = ModelsSchedule::where('user_id', $user->id)->where('enrolment_id', $enrolment->id)->where('next_schedule', null)->first();
                            dump($user_schedule);
                            if ($user_schedule) {
                                $enrolment->delete();
                                $user_schedule->delete();
                                $user->removeRole('student');
                                $user->assignRole('guest');
                            } else {
                                $user_schedule = ModelsSchedule::where('user_id', $user->id)->where('enrolment_id', $enrolment->id)->first();
                                $user_schedule->selected_schedule = $user_schedule->next_schedule;
                                $user_schedule->next_schedule = null;
                                $user_schedule->save();

                                $classes_dates = ApportionmentController::calculateApportionment(count($user_schedule->selected_schedule), json_encode($user_schedule->selected_schedule), $enrolment->course->id)[2];
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

                                //CREATING CLASSES (CLASS BOOKING)//
                                foreach ($classes_dates as $date) {
                                    CreateClasses::dispatch($date, $enrolment->id);
                                }
                            }
                        }
                    }
                }

                DB::table('metadata')->where('key', '=', 'current_period')->update([
                    'value' => json_encode([
                        "start_date" => ApportionmentController::currentPeriod(true)[0],
                        "end_date" => ApportionmentController::currentPeriod(true)[1],
                    ])
                ]);

                // dump('New period');
            }
        })->everyMinute();
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
