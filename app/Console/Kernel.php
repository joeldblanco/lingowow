<?php

namespace App\Console;

use App\Http\Controllers\ApportionmentController;
use App\Models\Enrolment;
use App\Models\Schedule as ModelsSchedule;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

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
            $users = User::role('student')->get();
            foreach ($users as $user) {
                $classes = $user->studentClasses;
                $pending_classes = count($user->studentClasses);
                foreach ($classes as $class) {
                    if ($class->start_date <= now()) {
                        $pending_classes--;
                    }
                }

                if ($pending_classes <= 0 && (Carbon::now() > new Carbon(ApportionmentController::currentPeriod()[1]))) {
                    $enrolment = Enrolment::where('student_id', $user->id)->first();
                    $user_schedule = ModelsSchedule::where('user_id', $user->id)->where('enrolment_id', $enrolment->id)->first();
                    if ($enrolment) $enrolment->delete();
                    if ($user_schedule) $user_schedule->delete();
                    $user->removeRole('student');
                    $user->assignRole('guest');
                }
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
