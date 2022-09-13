<?php

namespace App\Jobs;

use App\Models\Classes;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class StudentClassCheck implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($class_id)
    {
        if (auth()->user()->roles[0]->name == "student" || auth()->user()->roles[0]->name == "admin") {
            $student_check = Classes::select('student_check')->where('id', $class_id)->first()->student_check;
            $student_check = intval(!$student_check);
            try {
                $class = Classes::find($class_id);
                $class->student_check = $student_check;
                $class->save();
                $this->current_class = $class;
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
