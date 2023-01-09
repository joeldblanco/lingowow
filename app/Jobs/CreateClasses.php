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

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($date, $enrolment_id, $meeting_id)
    {
        $enrolment = Enrolment::find($enrolment_id);
        Classes::create([
            'start_date' => $date[0],
            'end_date' => $date[1],
            'enrolment_id' => $enrolment->id,
            'meeting_id' => $meeting_id,
        ]);
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
