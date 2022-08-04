<?php

namespace App\Http\Livewire;

use App\Http\Controllers\ApportionmentController;
use App\Models\Classes;
use App\Models\Course;
use App\Models\Enrolment;
use App\Models\Schedule as ModelsSchedule;
use Livewire\Component;
use App\Models\User;
use Carbon\Carbon;

class Schedule extends Component
{
    public $role;
    public $user_schedules;
    public $teacher_id;
    public $teacher_schedule;
    public $university_schedule_start, $university_schedule_end, $university_schedule_hours;
    public $days = ['SUNDAY', 'MONDAY', 'TUESDAY', 'WEDNESDAY', 'THURSDAY', 'FRIDAY', 'SATURDAY'];
    public $event = "true";
    public $user_id;
    public $user_courses;
    public $user_courses_aux = [];
    public $scheduled_classes;
    public $students = [];
    public $students_schedules = [];
    public $classes = [];
    public $temp_student_schedule = [];
    public $student_schedule = [];
    public $schedule_user = [];
    public $date_classes = [];
    public $date_format_class = [];
    public $hoy;
    public $course;

    protected $listeners = ['showTeacherInfo'];

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function mount($user_id, $course_id = null)
    {
        $course_id = 1;
        if (!is_null($course_id)) $this->course = Course::find($course_id);
        $this->hoy = (new Carbon())->toCookieString();
        $this->role = auth()->user()->roles->first()->name;
        $this->user_id = $user_id;

        if ($this->role == "teacher") {
            $this->teacher_schedule = User::find($this->user_id)->schedules->first()->selected_schedule;

            $this->loadTeacherSchedule($this->user_id);
        } else if ($this->role == "student") {

            $this->teacher_id = Enrolment::select("teacher_id")
                ->where("student_id", $this->user_id)->first()->teacher_id;

            $this->teacher_schedule = User::find($this->teacher_id)->schedules;

            foreach ($this->teacher_schedule as $key => $value) {
                $this->teacher_schedule[$key] = $value->selected_schedule;
            }

            if (!$this->teacher_schedule->first()) $this->teacher_schedule = [];

            if (count($this->teacher_schedule) > 0) $this->teacher_schedule = json_decode(json_encode($this->teacher_schedule[0]), 1);

            $this->loadStudentSchedule($this->user_id);
        } else if ($this->role == "admin") {
            $this->loadAdminSchedule($this->user_id);
        }

        $university_schedule = ModelsSchedule::university_schedule();
        $this->university_schedule_start = $university_schedule[0];
        $this->university_schedule_end = $university_schedule[1];
        $this->university_schedule_hours = $university_schedule[2];
    }

    public function edit()
    {
        $this->dispatchBrowserEvent('contentChanged');
    }

    public function showTeacherInfo($user_id)
    {
        $this->user_id = $user_id;
    }

    public function refresh()
    {
        $this->user_schedules = ModelsSchedule::where('user_id', auth()->id())->get();
        // if(count($this->user_schedules) > 0){
        foreach ($this->user_schedules as $key => $value) {
            $this->user_schedules[$key] = $value->selected_schedule;
            if (auth()->user()->roles[0]->name == "student")
                $this->user_courses[$key] = Enrolment::find($value->enrolment_id)->course->course_name;
        }
        // }

        $this->teacher_id = Enrolment::select("teacher_id")
            ->where("student_id", $this->user_id)->first();

        if (!is_null($this->teacher_id) && $this->role == "student") {
            $this->teacher_id = $this->teacher_id->teacher_id;
        } else {
            $this->teacher_id = $this->user_id;
        }

        if (!is_null($this->teacher_id)) {
            $this->teacher_schedule = User::find($this->teacher_id)->schedules;

            foreach ($this->teacher_schedule as $key => $value) {
                $this->teacher_schedule[$key] = $value->selected_schedule;
            }

            if (count($this->teacher_schedule) > 0) $this->teacher_schedule = json_decode(json_encode($this->teacher_schedule[0]), 1);
        }
        $this->edit();

        $this->user_schedules = $this->user_schedules->first();
    }

    public function loadTeacherSchedule($user_id)
    {
        $user = User::find($user_id);
        $this->user_schedules = $user->schedules->first()->selected_schedule;
        $this->user_schedules = null ? [] : array_filter($this->user_schedules);

        $this->scheduled_classes = Enrolment::select('student_id')
            ->where('teacher_id', $user_id)
            ->get();

        foreach ($this->scheduled_classes as $key => $value) {
            $this->students[$key] = $value->student_id;
        }

        $this->students = User::select('id', 'first_name', 'last_name')->find($this->students);

        foreach ($this->students as $student) {
            $this->students_schedules[] = $student->schedules->first()->selected_schedule;
        }
        $this->students_schedules = array_merge(...$this->students_schedules);
    }

    public function loadStudentSchedule($user_id)
    {
        $user = User::find($user_id);
        $enrolment = $user->enrolments->where('course_id', $this->course->id)->first();

        if (!is_null($enrolment)) {
            $this->user_schedules = $user->schedules->where('enrolment_id', $enrolment->id)->first()->selected_schedule;
            $this->user_schedules = null ? [] : array_filter($this->user_schedules);

            $current_period = ApportionmentController::currentPeriod();
            $period_start_c = new Carbon($current_period[0]);
            // $period_end_c = new Carbon($current_period[1]);

            $this->classes = Classes::select()
                ->where('enrolment_id', $enrolment->id)
                ->whereDate('start_date', '>=', $period_start_c->subDay()->toDateTimeString())
                ->get();

            if ($this->classes->count() > 0) $this->classes = $this->classes->toArray();

            foreach ($this->classes as $key => $value) {
                $this->classes[$key] = new Carbon($value["start_date"]);
            }

            $this->schedule_user = $this->user_schedules;
            foreach ($this->schedule_user as $key => $value) {
                $this->schedule_user[$key] = implode('-', $value);
            }

            foreach ($this->classes as $key => $value) {
                $this->date_classes[$key] = $this->classes[$key]->isoFormat('H') . '-' . $this->classes[$key]->isoFormat('d');
                $this->date_format_class[$key] = $this->classes[$key]->isoFormat('ddd, D MMM HH:mm a');
            }
        }
    }

    public function loadAdminSchedule()
    {
        dd("admin");
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        // $this->user_schedules = auth()->user()->schedules->toArray();
        // count($this->user_schedules) > 0 ? $this->user_schedules = array_merge(...$this->user_schedules) : false;

        // if ($this->user_schedules == null) $this->user_schedules = [];
        // foreach ($this->user_schedules as $key => $value) {
        //     if ($value == null) {
        //         unset($this->user_schedules[$key]);
        //     }
        // }

        // $this->teacher_schedule = $this->teacher_schedule;

        return view('livewire.schedule');
    }
}
