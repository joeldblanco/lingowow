<?php

namespace App\Jobs;

use App\Models\Classes;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class TeacherClassCheck implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($class_id)
    {
        if (auth()->user()->roles[0]->name == "teacher" || auth()->user()->roles[0]->name == "admin") {
            $teacher_check = Classes::select('teacher_check')->where('id', $class_id)->first()->teacher_check;
            $teacher_check = intval(!$teacher_check);
            try {
                Classes::where('id', $class_id)->update(['teacher_check' => $teacher_check]);
                $this->current_class = Classes::find($class_id);
            } catch (\Throwable $th) {
                dd($th->getCode());
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
