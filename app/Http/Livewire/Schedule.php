<?php

namespace App\Http\Livewire;

use App\Http\Controllers\ApportionmentController;
use App\Models\Classes;
use App\Models\Course;
use App\Models\Enrolment;
use App\Models\Schedule as ModelsSchedule;
use App\Models\ScheduleReserve;
use Livewire\Component;
use App\Models\User;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Support\Facades\DB;

class Schedule extends Component
{
    public $role;
    public $user_schedules;
    public $teacher_id = null;
    public $teacher_schedule = [];
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
    // public $hoy;
    public $now;
    public $course;
    public $plan;
    public $name;
    public $schedule = [];
    public $absence_classes;
    public $abcense_classes = [];
    public $abcense_classes_days = [];
    // public $days_rest = 0;
    public $days_rest = [];
    public $mode = "show";
    public $next_schedule = [];
    public $showModalAbsence = false;
    public $data_selected = [];
    public $data_selected_format = [];
    public $schedules;

    //variables para el horario de un solo bloque!
    public $table_date = [];
    public $date_format_range = [];
    public $day_range = [];
    public $prediod_range = [];
    public $weeks = 0;
    public $period_end_aux;
    public $id_class;
    // public $day_rest = 0;


    protected $listeners = ['showTeacherInfo', 'loadSelectingSchedule', 'checkForClass', 'findReserves' => 'findReservesAndRetun'];

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function mount($user_id, $course_id = null, $plan = null, $mode = "show", $id_class = null)
    {
        // dd($course_id);
        // dd($course_id, $mode);
        $reserve = ScheduleReserve::withTrashed()->updateOrCreate(
            ['user_id' => $user_id],
            ['teacher_id' => NULL, 'selected_schedule' => NULL, 'type' => ""]
            // ['type' => 'exam']
        );

        session(['schedule_reserve' => []]);
        if (!is_null($course_id)) {
            $this->course = Course::find($course_id);
        }
        // dd($this->course);
        $this->hoy = (new Carbon())->toCookieString();
        $this->user = User::withTrashed()->find($user_id);
        $this->role = $this->user->roles->first()->name;
        $this->plan = $plan;

        if ($this->role == "guest") {

            $this->loadGuestSchedule($this->user->id);
        } else if ($this->role == "student") {

            if ($this->course == null) {
                // dd($this->course);
            } else {
                if ($this->course->modality == "asynchronous") {
                    $this->mode = "asynchronous";
                } else {
                    $this->schedules = $this->user->schedules;

                    if ($this->user->enrolments->count() > 0) {
                        $enrolment = Enrolment::where("student_id", $this->user->id)->first();
                        $this->loadGuestSchedule($this->user->id);
                        if ($enrolment->course->modality == "synchronous") {

                            $this->teacher_id = Enrolment::select("teacher_id")
                                ->where("student_id", $this->user->id)->first();

                            $this->teacher_id = $this->teacher_id->teacher_id;

                            $this->teacher_schedule = User::withTrashed()->find($this->teacher_id)->schedules;

                            foreach ($this->teacher_schedule as $key => $value) {
                                $this->teacher_schedule[$key] = $value->selected_schedule;
                            }

                            if (!$this->teacher_schedule->first()) $this->teacher_schedule = [];

                            if (count($this->teacher_schedule) > 0) $this->teacher_schedule = json_decode(json_encode($this->teacher_schedule[0]), 1);

                            $this->loadStudentSchedule($this->user->id);
                        }
                    }
                }
            }
        } else if ($this->role == "teacher") {
            $this->schedules = User::withTrashed()->find($this->user->id)->schedules;

            if (count($this->schedules) > 0) {
                $this->loadTeacherSchedule($this->user->id);
            }
        }
        // else if ($this->role == "admin") {

        //     // $this->loadAdminSchedule($this->user->id);
        // }

        $university_schedule = ModelsSchedule::university_schedule();
        $this->university_schedule_start = $university_schedule[0];
        $this->university_schedule_end = $university_schedule[1];
        $this->university_schedule_hours = $university_schedule[2];

        session(['user_schedule' => []]);

        $current_period = DB::table("metadata")->where("key", "current_period")->first()->value;
        $current_period = array_values(json_decode($current_period, 1));
        // $current_period = ApportionmentController::currentPeriod();
        $period_start_c = new Carbon($current_period[0]);
        $period_end_c = new Carbon($current_period[1]);
        $this->now = new Carbon();
        // dd(new CarbonPeriod($this->now, $period_end_c));
        foreach (new CarbonPeriod($this->now, $period_end_c) as $key => $date) {

            // $this->days_rest++;
            $this->days_rest[] = $date->isoFormat('d');
        }

        if ($mode == "one" || $mode == "absence") {
            // dd(session()->all());
            // dd((new Carbon())->hour(0)->minute(0)->second(0));
            // variables para el periodo, fechas y similares
            // $this->emit('findReserves');
            $this->id_class = $id_class;
            $this->period_end_aux = $period_end_c->copy();
            $period_start = $period_start_c->format('Y/m/d');
            $period_end = $period_end_c->format('Y/m/d');
            $this->weeks = ceil($period_start_c->floatDiffInWeeks($period_end_c) + 1);
            if ($this->weeks > 4) {
                $period_end_c->addWeek();
            }
            // dd($period_start_c);

            $date_range = new CarbonPeriod($period_start_c->copy()->subDay(), $period_end_c);
            $this->day_format_range = [];
            $this->period_range = [];
            $this->day_range = [];
            $this->table_date = [];

            foreach ($date_range as $key => $date) {
                //if ($key) {
                $this->day_format_range[$key] = $date->format('Y-m-d');
                $this->period_range[$key] = $date->format('m-d');
                $this->day_range[$key] = $date->format('d');
                $this->table_date[$key] = $date->format('d/m');
                //}
            }
            // dd($this->day_format_range, $this->period_end_aux, (new carbon($this->day_format_range[28]))->addHour(2)->lessThan($this->period_end_aux->copy()->addDay()));
            // dd($this->day_format_range, $period_start_c->weekOfYear, $period_end_c->weekOfYear, $period_start_c->diffInWeeks($period_end_c) + 1, $this->period_end_aux);
            // variables para horarios ocupados
            $course_id = session('selected_course');
            if ($course_id != null) {
                $modality_course = Course::find($course_id)->modality;
                if ($modality_course == "exam") {
                    $this->loadSelectingSchedule();
                } else {
                    $this->loadSelectingSchedule(session('teacher_id'));
                }
            }
        }
    }

    public function loadSelectingSchedule($teacher_id = 0)
    {
        if ($teacher_id != 0) {
            $this->teacher_id = $teacher_id;
            $this->name = User::find($this->teacher_id)->first_name . " " . User::find($this->teacher_id)->last_name;



            $this->schedule = User::find($this->teacher_id)->schedules[0]->selected_schedule;
            $timezone = Carbon::now()->setTimezone($this->user->timezone);
            $schedule_utc = [];
            foreach ($this->schedule as $key => $value) {
                $date = Carbon::now();
                $date_local = Carbon::parse('Next ' . Carbon::now()->setISODate($date->year, $date->weekOfYear, $value[1])->format('l') . ' at ' . $value[0] . ':00');
                $schedule_utc[$key][0] = (int)$date_local->copy()->addHours($timezone->offsetHours)->hour;
                $schedule_utc[$key][1] = (int)$date_local->copy()->addHours($timezone->offsetHours)->dayOfWeek;
            }
            $this->schedule = $schedule_utc;







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

                $student_schedule = $student->schedules->first()->selected_schedule;
                // $timezone = Carbon::now()->setTimezone($this->user->timezone);
                // $schedule_utc = [];
                // foreach ($student_schedule as $key => $value) {
                //     $date = Carbon::now();
                //     $date_local = Carbon::parse('Next ' . Carbon::now()->setISODate($date->year, $date->weekOfYear, $value[1])->format('l') . ' at ' . $value[0] . ':00');
                //     $schedule_utc[$key][0] = (int)$date_local->copy()->addHours($timezone->offsetHours)->hour;
                //     $schedule_utc[$key][1] = (int)$date_local->copy()->addHours($timezone->offsetHours)->dayOfWeek;
                // }
                // $student_schedule = $schedule_utc;


                $this->students_schedules[] = $student_schedule;
                if (!empty($student->enrolments->first()->preselection)) {
                    array_push($next_students_schedule, $student->enrolments->first()->preselection->schedule);
                }
            }

            $timezone = Carbon::now()->setTimezone($this->user->timezone);
            $schedule_utc = [];
            foreach ($this->students_schedules as $schedules) {
                foreach ($schedules as $key => $value) {
                    $date = Carbon::now();
                    $date_local = Carbon::parse('Next ' . Carbon::now()->setISODate($date->year, $date->weekOfYear, $value[1])->format('l') . ' at ' . $value[0] . ':00');
                    $schedules[$key][0] = (int)$date_local->copy()->addHours($timezone->offsetHours)->hour;
                    $schedules[$key][1] = (int)$date_local->copy()->addHours($timezone->offsetHours)->dayOfWeek;
                }
                $schedule_utc[] = $schedules;
            }
            $this->students_schedules = $schedule_utc;
            $this->students_schedules = array_filter($this->students_schedules);
            $this->students_schedules = array_merge(...$this->students_schedules);
            $next_students_schedule = array_merge(...$next_students_schedule);

            $this->students_schedules = array_merge($this->students_schedules, $next_students_schedule);

            if ($this->schedule == null) $this->schedule = [];
        } else {

            $teachers = [];
            $model_roles = DB::table('model_has_roles')->select('role_id', 'model_id')->get();
            foreach ($model_roles as $model_role) {

                if ($model_role->role_id == 3) {
                    $teachers[] = $model_role->model_id;
                }
            }
            $teachers = User::find($teachers);

            foreach ($teachers as $teacher) {
                $this->schedule[] = $teacher->schedules->first()->selected_schedule;
                $this->teacher_schedule[] = $teacher->schedules->first()->selected_schedule;
            }
            $this->schedule = array_filter($this->schedule);
            $this->schedule = array_merge(...$this->schedule);

            $this->teacher_schedule = array_filter($this->teacher_schedule);
            $this->teacher_schedule = array_merge(...$this->teacher_schedule);
            // $this->schedule = array_unique($this->schedule);

            $students = [];
            $model_roles = DB::table('model_has_roles')->select('role_id', 'model_id')->get();
            foreach ($model_roles as $model_role) {

                if ($model_role->role_id == 2) {
                    $students[] = $model_role->model_id;
                }
            }
            $students = User::find($students);

            foreach ($students as $student) {
                // dd($student);
                if ($student->schedules != null && count($student->schedules) > 0) {
                    $this->students_schedules[] = $student->schedules->first()->selected_schedule;
                }
            }
            $this->students_schedules = array_filter($this->students_schedules);
            $this->students_schedules = array_merge(...$this->students_schedules);

            // dd($this->schedule, $this->students_schedules);

            if ($this->schedule == null) $this->schedule = [];
            if ($this->teacher_schedule == null) $this->teacher_schedule = [];
        }

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

        foreach ($this->user_schedules as $key1 => $schedule) {

            $timezone = Carbon::now()->setTimezone($this->user->timezone);
            $schedule_utc = [];
            foreach ($schedule->selected_schedule as $key => $value) {
                $date = Carbon::now();
                $date_local = Carbon::parse('Next ' . Carbon::now()->setISODate($date->year, $date->weekOfYear, $value[1])->format('l') . ' at ' . $value[0] . ':00');
                $schedule_utc[$key][0] = (int)$date_local->copy()->addHours($timezone->offsetHours)->hour;
                $schedule_utc[$key][1] = (int)$date_local->copy()->addHours($timezone->offsetHours)->dayOfWeek;
            }


            $this->user_schedules[$key1] = $schedule_utc;


            if (User::find($this->user->id)->roles[0]->name == "student")
                $this->user_courses[$key1] = Enrolment::find($schedule->enrolment_id)->course->name;
        }
        $this->user_schedules = $this->user_schedules->toArray()[0];


        $this->teacher_id = Enrolment::select("teacher_id")
            ->where("student_id", $this->user->id)->first();

        if (!is_null($this->teacher_id) && $this->role == "student") {
            $this->teacher_id = $this->teacher_id->teacher_id;
        } else {
            $this->teacher_id = $this->user->id;
        }

        if (!is_null($this->teacher_id)) {
            $this->teacher_schedule = User::find($this->teacher_id)->schedules;

            foreach ($this->teacher_schedule as $key1 => $schedule) {

                $timezone = Carbon::now()->setTimezone($this->user->timezone);
                $schedule_utc = [];
                foreach ($schedule->selected_schedule as $key => $value) {
                    $date = Carbon::now();
                    $date_local = Carbon::parse('Next ' . Carbon::now()->setISODate($date->year, $date->weekOfYear, $value[1])->format('l') . ' at ' . $value[0] . ':00');
                    $schedule_utc[$key][0] = (int)$date_local->copy()->addHours($timezone->offsetHours)->hour;
                    $schedule_utc[$key][1] = (int)$date_local->copy()->addHours($timezone->offsetHours)->dayOfWeek;
                }
                $schedule = $schedule_utc;


                $this->teacher_schedule[$key1] = $schedule;
            }

            if (count($this->teacher_schedule) > 0) $this->teacher_schedule = json_decode(json_encode($this->teacher_schedule[0]), 1);
        }

        $this->edit();
    }

    public function loadGuestSchedule()
    {
        $today = new Carbon();
        $class = Classes::find($this->id_class);
        if (!empty($class)) {
            $enrolment_id = Classes::find($this->id_class)->enrolment_id;
            $abcense = Classes::select('start_date')
                ->where('enrolment_id', $enrolment_id)
                ->where('status', '1')
                ->whereBetween('start_date', [$today->toDateTimeString(), ApportionmentController::currentPeriod()[1]])
                ->get();
        } else {
            $abcense = Classes::select('start_date')
                ->where('status', '1')
                ->whereBetween('start_date', [$today->toDateTimeString(), ApportionmentController::currentPeriod()[1]])
                ->get();
        }

        foreach ($abcense as $key => $value) {
            $abcense[$key] = $value->start_date;
        }
        $abcense = json_decode($abcense);

        foreach ($abcense as $key => $value) {
            $abcense[$key] = Carbon::parse($abcense[$key])->setTimezone($this->user->timezone);
        }

        foreach ($abcense as $key => $value) {
            $this->abcense_classes[$key] = $abcense[$key]->isoFormat('H') . '-' . $abcense[$key]->isoFormat('d');
            $this->abcense_classes_days[$key] = $abcense[$key]->isoFormat('H') . '-' . $abcense[$key]->format('d');
        }
        // dump($this->abcense_classes);
    }

    public function loadStudentSchedule($user_id)
    {
        $user = User::find($user_id);
        $enrolment = $user->enrolments->where('course_id', $this->course->id)->first();

        if (!is_null($enrolment) && ($user->schedules->where('enrolment_id', $enrolment->id)->first() != null)) {

            $this->user_schedules = $user->schedules->where('enrolment_id', $enrolment->id)->first()->selected_schedule;
            $this->user_schedules = null ? [] : array_filter($this->user_schedules);
            $timezone = Carbon::now()->setTimezone($this->user->timezone);
            $schedule_utc = [];
            foreach ($this->user_schedules as $key => $value) {
                $date = Carbon::now();
                $date_local = Carbon::parse('Next ' . Carbon::now()->setISODate($date->year, $date->weekOfYear, $value[1])->format('l') . ' at ' . $value[0] . ':00');
                $schedule_utc[$key][0] = (int)$date_local->copy()->addHours($timezone->offsetHours)->hour;
                $schedule_utc[$key][1] = (int)$date_local->copy()->addHours($timezone->offsetHours)->dayOfWeek;
            }
            $this->user_schedules = $schedule_utc;



            $this->schedule_user = $this->user_schedules;
            foreach ($this->schedule_user as $key => $value) {
                $this->schedule_user[$key] = implode('-', $value);
            }

            $this->next_schedule = $enrolment->preselection;

            if (!empty($this->next_schedule)) {
                $this->next_schedule = $this->next_schedule->schedule;
            } else {
                $this->next_schedule = [];
            }

            $current_period = ApportionmentController::currentPeriod();
            $period_start_c = new Carbon($current_period[0]);
            // $period_end_c = new Carbon($current_period[1]);

            $this->classes = Classes::select()
                ->where('enrolment_id', $enrolment->id)
                ->whereDate('start_date', '>=', $period_start_c->copy()->subDay()->toDateTimeString())
                ->get();

            // dd($this->classes, $period_start_c->copy()->subDay()->toDateTimeString());

            if ($this->classes->count() > 0) $this->classes = $this->classes->toArray();

            foreach ($this->classes as $key => $value) {
                $this->classes[$key] = Carbon::parse($value["start_date"])->setTimezone($user->timezone);
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
                if (!empty($student->enrolments->first()->preselection)) {
                    array_push($next_students_schedule, $student->enrolments->first()->preselection->schedule);
                }
            }

            $this->students_schedules = array_filter($this->students_schedules);
            $this->students_schedules = array_merge(...$this->students_schedules);
            $next_students_schedule = array_merge(...$next_students_schedule);

            $this->students_schedules = array_merge($this->students_schedules, $next_students_schedule);
            // dd($this->students_schedules);
        }
    }

    public function loadTeacherSchedule($user_id)
    {
        $this->teacher_schedule = $this->schedules->first()->selected_schedule == null ? [] : $this->schedules->first()->selected_schedule;
        $timezone = Carbon::now()->setTimezone($this->user->timezone);
        $schedule_utc = [];
        foreach ($this->teacher_schedule as $key => $value) {
            $date = Carbon::now();
            $date_local = Carbon::parse('Next ' . Carbon::now()->setISODate($date->year, $date->weekOfYear, $value[1])->format('l') . ' at ' . $value[0] . ':00');
            $schedule_utc[$key][0] = (int)$date_local->copy()->addHours($timezone->offsetHours)->hour;
            $schedule_utc[$key][1] = (int)$date_local->copy()->addHours($timezone->offsetHours)->dayOfWeek;
        }
        $this->teacher_schedule = $schedule_utc;


        $this->user_schedules = $this->user->schedules->first()->selected_schedule;
        $this->user_schedules == null ? $this->user_schedules = [] : array_filter($this->user_schedules);
        $timezone = Carbon::now()->setTimezone($this->user->timezone);
        $schedule_utc = [];
        foreach ($this->user_schedules as $key => $value) {
            $date = Carbon::now();
            $date_local = Carbon::parse('Next ' . Carbon::now()->setISODate($date->year, $date->weekOfYear, $value[1])->format('l') . ' at ' . $value[0] . ':00');
            $schedule_utc[$key][0] = (int)$date_local->copy()->addHours($timezone->offsetHours)->hour;
            $schedule_utc[$key][1] = (int)$date_local->copy()->addHours($timezone->offsetHours)->dayOfWeek;
        }
        $this->user_schedules = $schedule_utc;




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
        $this->students_schedules = [];
        foreach ($this->students as $student) {
            if ($student->schedules->first() != null) {

                $student_schedule = $student->schedules->first()->selected_schedule;
                $timezone = Carbon::now()->setTimezone($this->user->timezone);
                $schedule_utc = [];
                foreach ($student_schedule as $key => $value) {
                    $date = Carbon::now();
                    $date_local = Carbon::parse('Next ' . Carbon::now()->setISODate($date->year, $date->weekOfYear, $value[1])->format('l') . ' at ' . $value[0] . ':00');
                    $schedule_utc[$key][0] = (int)$date_local->copy()->addHours($timezone->offsetHours)->hour;
                    $schedule_utc[$key][1] = (int)$date_local->copy()->addHours($timezone->offsetHours)->dayOfWeek;
                }
                $student_schedule = $schedule_utc;
                $this->students_schedules[] = $student_schedule;
            }
        }
        $this->students_schedules = array_filter($this->students_schedules);
        $this->students_schedules = array_merge(...$this->students_schedules);
    }

    public function loadAdminSchedule()
    {
        // $this->user_schedules = $this->user->schedules->first()->selected_schedule;
        // $this->user_schedules == null ? $this->user_schedules = [] : array_filter($this->user_schedules);
    }

    public function notFree($a, $buscado, $days)
    {
        $i = 0; //Numero de veces que ese dia ha sido reaendado
        $j = 0; //Numero de semanas restantes
        if (is_array($a)) {
            foreach ($a as $v) {
                if ($buscado === $v) {
                    $i++;
                }
            }
            foreach ($days as $v) {
                if (is_array($buscado)) dd($buscado);
                if (explode("-", $buscado)[1] === $v) {
                    $j++;
                }
            }
            // dd($i, $days, $j, $buscado);
        }
        if ($i > 0) {
            // if ($i < ($days / 7)) {
            if ($i < $j) {
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
        // dd($apportionment);
        $days_no_pay = array_intersect($apportionment[3], $apportionment[2]);
        foreach ($days_no_pay as $key => $value) {
            $days_no_pay[$key] = new Carbon($days_no_pay[$key]);
            $days_no_pay[$key] = $days_no_pay[$key]->toCookieString();
        }
        //  dd($apportionment,$days_no_pay);


        session(['data' => $days_no_pay]);
        $this->showModalAbsence = true;
    }

    public function schedulesReserves($mode = "schedule")
    {

        $schedules_exam_not_free = [];
        $schedules_reserve = [];
        $schedules_exam = [];
        $schedules = [];
        $classes = [];
        $current_period = ApportionmentController::currentPeriod();
        $schedules_exam_reserve = [];

        $teacher_id = null;

        if ($this->teacher_id != null) {
            $teacher_id = $this->teacher_id;
        } else {
            $teacher_id = session('teacher_id');
        }
        // dd($teacher_id);
        $schedules = ScheduleReserve::all()->where('teacher_id', $teacher_id)->where('type', 'schedule')->whereNotNull('selected_schedule')->pluck('selected_schedule');
        $schedules_exam = ScheduleReserve::all()->where('teacher_id', $teacher_id)->where('type', 'exam')->whereNotNull('selected_schedule')->pluck('selected_schedule');
        $classes = User::find($teacher_id)->teacherClasses()->where('status', 1)->whereDate('start_date', '>=', $current_period[0])->orderBy('start_date', 'asc')->get()->pluck('start_date');

        foreach ($schedules as $schedule) {
            $schedules_reserve = array_merge($schedules_reserve, json_decode($schedule));
        }

        if ($mode == "edit") {

            foreach ($schedules_exam as $schedule) {
                // dd(json_decode($schedule)[0][0]);
                $schedules_exam_reserve = array_merge($schedules_exam_reserve, [[(json_decode($schedule))[0][0], (json_decode($schedule))[0][1]]]);
            }
            foreach ($classes as $key => $class) {
                $date_class = new Carbon($class);
                $schedules_exam_reserve = array_merge($schedules_exam_reserve, [[$date_class->isoFormat('H'), $date_class->isoFormat('d')]]);
            }

            foreach ($schedules_exam_reserve as $day) {
                if ($this->notFree($schedules_exam_reserve, $day[0] . '-' . $day[1], $this->days_rest) && !in_array($day, $schedules_exam_not_free)) {
                    $schedules_exam_not_free[] = $day;
                }
            }
        } elseif ($mode == "one" || $mode == "absence") {

            foreach ($schedules_exam as $schedule) {
                $schedules_exam_reserve = array_merge($schedules_exam_reserve, json_decode($schedule));
            }

            // foreach($classes as $key => $class){
            //     $date_class = new Carbon($class); 
            //     $schedules_exam_reserve = array_merge($schedules_exam_reserve, [[$date_class->isoFormat('H'), $date_class->isoFormat('d'), (string)($date_class->weekOfMonth-1), $date_class->isoFormat('MM'), $date_class->isoFormat('DD')]]);
            // }
            $schedules_exam_not_free = $schedules_exam_reserve;
        }
        // dd($schedules,$schedules_exam, $schedules_exam_reserve);


        foreach ($schedules_exam_reserve as $day) {
            if ($this->notFree($schedules_exam_reserve, $day[0] . '-' . $day[1], $this->days_rest) && !in_array($day, $schedules_exam_not_free)) {
                $schedules_exam_not_free[] = $day;
            }
        }

        return [$schedules_reserve, $schedules_exam_not_free];
    }

    public function findReservesAndRetun()
    {
        // dd("entro!");
        // $reserve = ScheduleReserve::all()->whereNotNull('selected_schedule');
        // $schedules_exam_not_fre = array_unique($schedules_exam_not_fre);
        // dd($schedules_reserve, $schedules_exam_not_free);
        // dd($this->teacher_id, session('teacher_id'));
        if ($this->mode != "show" && ($this->teacher_id != null || session('teacher_id') != null)) {
            $data_reserve = $this->schedulesReserves($this->mode);

            $schedules_reserve = $data_reserve[0];
            $schedules_exam_not_free = $data_reserve[1];
            $this->dispatchBrowserEvent('reserves_schedules_event_js', ['schedules' => $schedules_reserve, 'schedules_exam' => $schedules_exam_not_free, 'mode' => $this->mode, 'plan' => $this->plan]);
        }
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
            // dd($data_select);
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
