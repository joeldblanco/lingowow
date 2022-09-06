<?php

namespace App\Jobs;

use App\Models\Schedule;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class CreateSchedule implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $schedule;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($student_id, $student_schedule, $enrolment_id)
    {
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
        //
    }
}
