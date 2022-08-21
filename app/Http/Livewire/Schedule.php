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
    public $user;
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
    public $plan;
    public $name;
    public $schedule = [];
    public $absence_classes;
    public $abcense_classes = [];
    public $days_rest = 0;
    public $mode = "show";
    public $next_schedule = [];
    public $showModalAbsence = false;
    public $data_selected = [];
    public $data_selected_format = [];

    protected $listeners = ['showTeacherInfo', 'loadSelectingSchedule', 'checkForClass'];

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function mount($user_id, $course_id = null, $plan = null, $mode = "show")
    {
        $course_id = 1;
        if (!is_null($course_id)) $this->course = Course::find($course_id);
        $this->hoy = (new Carbon())->toCookieString();
        $this->user = User::find($user_id);
        $this->role = $this->user->roles->first()->name;
        $this->plan = $plan;

        if ($this->role == "guest") {

            $this->loadGuestSchedule($this->user->id);
        } else if ($this->role == "student") {

            if ($this->user->enrolments->count() > 0) {

                $this->teacher_id = Enrolment::select("teacher_id")
                    ->where("student_id", $this->user->id)->first();

                $this->teacher_id = $this->teacher_id->teacher_id;

                $this->teacher_schedule = User::find($this->teacher_id)->schedules;

                foreach ($this->teacher_schedule as $key => $value) {
                    $this->teacher_schedule[$key] = $value->selected_schedule;
                }

                if (!$this->teacher_schedule->first()) $this->teacher_schedule = [];

                if (count($this->teacher_schedule) > 0) $this->teacher_schedule = json_decode(json_encode($this->teacher_schedule[0]), 1);

                $this->loadStudentSchedule($this->user->id);
            }
        } else if ($this->role == "teacher") {

            $this->teacher_schedule = User::find($this->user->id)->schedules->first()->selected_schedule;

            $this->loadTeacherSchedule($this->user->id);
        } else if ($this->role == "admin") {

            // $this->loadAdminSchedule($this->user->id);
        }

        $university_schedule = ModelsSchedule::university_schedule();
        $this->university_schedule_start = $university_schedule[0];
        $this->university_schedule_end = $university_schedule[1];
        $this->university_schedule_hours = $university_schedule[2];

        session(['user_schedule' => []]);
    }

    public function loadSelectingSchedule($teacher_id)
    {
        $this->teacher_id = $teacher_id;
        $this->name = User::find($this->teacher_id)->first_name . " " . User::find($this->teacher_id)->last_name;
        $this->schedule = User::find($this->teacher_id)->schedules[0]->selected_schedule;

        $scheduled_classes = Enrolment::select('student_id')
            ->where('teacher_id', $teacher_id)
            ->get();

        $students = [];
        foreach ($scheduled_classes as $key => $value) {
            $students[$key] = $value->student_id;
        }
        $students = User::find($students);

        $next_students_schedule = [];
        $this->students_schedules = [];
        foreach ($students as $student) {
            $this->students_schedules[] = $student->schedules->first()->selected_schedule;
            if ($student->schedules->first()->next_schedule != null) {
                array_push($next_students_schedule, $student->schedules->first()->next_schedule);
            }
        }
        $this->students_schedules = array_merge(...$this->students_schedules);
        $next_students_schedule = array_merge(...$next_students_schedule);

        $this->students_schedules = array_merge($this->students_schedules, $next_students_schedule);

        // dd($this->students_schedules);

        if ($this->schedule == null) $this->schedule = [];
        // $this->emit('loadingState', false);
        $this->edit();
    }

    public function edit()
    {
        $this->dispatchBrowserEvent('contentChanged');
    }

    public function showTeacherInfo($user_id)
    {
        $this->user->id = $user_id;
    }

    public function refresh()
    {

        $this->user_schedules = ModelsSchedule::where('user_id', $this->user->id)->get();
        // if(count($this->user_schedules) > 0){
        foreach ($this->user_schedules as $key => $value) {
            $this->user_schedules[$key] = $value->selected_schedule;
            if (auth()->user()->roles[0]->name == "student")
                $this->user_courses[$key] = Enrolment::find($value->enrolment_id)->course->course_name;
        }
        // }

        $this->teacher_id = Enrolment::select("teacher_id")
            ->where("student_id", $this->user->id)->first();

        if (!is_null($this->teacher_id) && $this->role == "student") {
            $this->teacher_id = $this->teacher_id->teacher_id;
        } else {
            $this->teacher_id = $this->user->id;
        }

        if (!is_null($this->teacher_id)) {
            $this->teacher_schedule = User::find($this->teacher_id)->schedules;

            foreach ($this->teacher_schedule as $key => $value) {
                $this->teacher_schedule[$key] = $value->selected_schedule;
            }

            if (count($this->teacher_schedule) > 0) $this->teacher_schedule = json_decode(json_encode($this->teacher_schedule[0]), 1);
        }
        $this->user_schedules = $this->user_schedules->first();

        

        $this->edit();
    }

    public function loadGuestSchedule()
    {
        $today = new Carbon();
        $abcense = Classes::select('start_date')
            ->where('status', '1')
            ->whereBetween('start_date', [$today->toDateTimeString(), ApportionmentController::currentPeriod()[1]])
            ->get();

        // dd($abcense);

        foreach ($abcense as $key => $value) {
            $abcense[$key] = $value->start_date;
        }
        $abcense = json_decode($abcense);

        foreach ($abcense as $key => $value) {
            $abcense[$key] = new Carbon($abcense[$key]);
        }

        foreach ($abcense as $key => $value) {
            $abcense_classes[$key] = $abcense[$key]->isoFormat('H') . '-' . $abcense[$key]->isoFormat('d');
        }
    }

    public function loadStudentSchedule($user_id)
    {
        $user = User::find($user_id);
        $enrolment = $user->enrolments->where('course_id', $this->course->id)->first();

        if (!is_null($enrolment)) {
            $this->user_schedules = $user->schedules->where('enrolment_id', $enrolment->id)->first()->selected_schedule;
            $this->user_schedules = null ? [] : array_filter($this->user_schedules);

            $this->schedule_user = $this->user_schedules;
            foreach ($this->schedule_user as $key => $value) {
                $this->schedule_user[$key] = implode('-', $value);
            }

            $this->next_schedule = ModelsSchedule::select('next_schedule')
                ->where('enrolment_id', $enrolment->id)
                ->first();

            if ($this->next_schedule != null) {
                $this->next_schedule = $this->next_schedule->next_schedule;
            } else {
                $this->next_schedule = [];
            }

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

            foreach ($this->classes as $key => $value) {
                $this->date_classes[$key] = $this->classes[$key]->isoFormat('H') . '-' . $this->classes[$key]->isoFormat('d');
                $this->date_format_class[$key] = $this->classes[$key]->isoFormat('ddd, D MMM HH:mm a');
            }

            $this->scheduled_classes = Enrolment::select('student_id')
                ->where('teacher_id', $enrolment->teacher_id)
                ->get();

            foreach ($this->scheduled_classes as $key => $value) {
                $this->students[$key] = $value->student_id;
            }

            $this->students = User::select('id', 'first_name', 'last_name')->find($this->students);

            $next_students_schedule = [];
            foreach ($this->students as $student) {
                // dd($student->schedules->first());
                $this->students_schedules[] = $student->schedules->first()->selected_schedule;
                if ($student->schedules->first()->next_schedule != null) {
                    array_push($next_students_schedule, $student->schedules->first()->next_schedule);
                }
            }
            
            $this->students_schedules = array_merge(...$this->students_schedules);
            $next_students_schedule = array_merge(...$next_students_schedule);

            $this->students_schedules = array_merge($this->students_schedules, $next_students_schedule);
            // dd($this->students_schedules);
        }
    }

    public function loadTeacherSchedule($user_id)
    {
        $this->user_schedules = $this->user->schedules->first()->selected_schedule;
        $this->user_schedules == null ? $this->user_schedules = [] : array_filter($this->user_schedules);

        $this->schedule_user = $this->user_schedules;
        foreach ($this->schedule_user as $key => $value) {
            $this->schedule_user[$key] = implode('-', $value);
        }

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

    public function loadAdminSchedule()
    {
        // $this->user_schedules = $this->user->schedules->first()->selected_schedule;
        // $this->user_schedules == null ? $this->user_schedules = [] : array_filter($this->user_schedules);
    }

    public function notFree($a, $buscado, $days)
    {
        $i = 0;
        if (is_array($a)) {
            foreach ($a as $v) {
                if ($buscado === $v) {
                    $i++;
                }
            }
        }

        if ($i > 0) {
            if ($i < $days / 7) {
                return false;
            } else {
                return true;
            }
        } else {
            return false;
        }

        // return $i;
    }

    public function checkForClass($data, $plan, $error)
    {

        $data = json_decode($data);
        session(['user_schedule' => json_encode($data)]);

        $apportionment = ApportionmentController::calculateApportionment($plan);
        $days_no_pay = array_intersect($apportionment[3], $apportionment[2]);
        foreach ($days_no_pay as $key => $value) {
            $days_no_pay[$key] = new Carbon($days_no_pay[$key]);
            $days_no_pay[$key] = $days_no_pay[$key]->toCookieString();
        }
        //  dd($apportionment,$days_no_pay);


        session(['data' => $days_no_pay]);
        $this->showModalAbsence = true;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        // dd($this->user);
        // $this->user_schedules = auth()->user()->schedules->toArray();
        // count($this->user_schedules) > 0 ? $this->user_schedules = array_merge(...$this->user_schedules) : false;

        // if ($this->user_schedules == null) $this->user_schedules = [];
        // foreach ($this->user_schedules as $key => $value) {
        //     if ($value == null) {
        //         unset($this->user_schedules[$key]);
        //     }
        // }

        // $this->teacher_schedule = $this->teacher_schedule;

        $data_select = session('user_schedule');
        $this->data_selected = $data_select;
        // dd($this->data_selected);
        if ($this->data_selected != []) {
            $this->data_selected = json_decode($this->data_selected);

            $this->data_selected_format = $this->data_selected;
            foreach ($this->data_selected_format as $key => $value) {
                $this->data_selected_format[$key] = implode('-', $value);
            }
            // foreach ($this->data_selected as $key => $value) {
            //     $this->data_selected[$key] = new Carbon($this->data_selected[$key]);
            //     $this->data_selected[$key] = $this->data_selected[$key]->isoFormat('H')."-".$this->data_selected[$key]->isoFormat('d');
            // }
            // session(['user_schedule' => []]);
        }
        // dd($this->data_selected_format);
        return view('livewire.schedule');
    }
}
