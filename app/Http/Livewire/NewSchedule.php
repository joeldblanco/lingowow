<?php

namespace App\Http\Livewire;

use App\Http\Controllers\SchedulingCalendarController;
use App\Jobs\StoreSelfEnrolment;
use App\Models\Classes;
use App\Models\Enrolment;
use App\Models\ScheduleReserve;
use App\Models\User;
use App\Notifications\ClassRescheduledToStudent;
use App\Notifications\ClassRescheduledToTeacher;
use Carbon\Carbon;
use DateTimeZone;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class NewSchedule extends Component
{
    public $days = [
        'Sun',
        'Mon',
        'Tue',
        'Wed',
        'Thu',
        'Fri',
        'Sat',
    ];

    public $schedules = [];
    public $users = [];
    // public $mode;
    public $studentsInfo = [];
    public $schedulesDiff = [];
    public $limit;
    public $week;
    public $date = [];
    public $action;
    public $absenceReason = "";
    public $classForSelected = "";
    public $classForSelectees = "";

    protected $listeners = [
        'updateSchedule',
        'saveSchedule',
        'loadSelectingSchedule',
    ];

    protected $rules = [
        'absenceReason' => 'required',
    ];

    public function mount($limit = null, $week = null, $action, $users)
    {
        // Set global variables
        // $this->mode = $mode;
        $this->users = $users;
        $this->limit = $limit;
        $this->week = $week;
        $this->action = $action;

        switch ($action) {
            case 'teacherShow':

                $this->classForSelected = "selected";
                $this->classForSelectees = "selectee";

                if (User::find($users)->hasRole('teacher')) {

                    // Get teacher schedule
                    $this->schedules = $this->utcToLocal($this->getUserSchedule($users));

                    // Get students' schedules and data
                    $this->studentsInfo = array_map(function ($arr) {
                        return ['student' => $arr['student'], 'schedule' => $this->utcToLocal($arr['schedule'])];
                    }, $this->getStudentsInfo($users));
                }

                break;

            case 'studentShow':

                $this->classForSelected = "selected";

                // Get student schedule
                $this->schedules = $this->utcToLocal($this->getUserSchedule($users));

                break;


            case 'scheduleSelection':
                $this->classForSelectees = "available";
                $this->classForSelected = "available";

                // Get teacher schedule
                $this->users = session('first_teacher');

                // Get teacher schedule
                $this->schedules = $this->utcToLocal($this->getTeachersAvailability($this->users));

                break;

            case 'schedulePreselection':

                $scheduleReservation = ScheduleReserve::where('user_id', auth()->id())->first();
                if (!empty($scheduleReservation)) {
                    $scheduleReservation->delete();
                }

                $this->classForSelectees = "available";
                $this->classForSelected = "available";

                // Get teacher schedule
                $this->users = session('first_teacher');

                // Get teacher schedule
                $this->schedules = $this->utcToLocal($this->getTeachersPreselectionAvailability($this->users));

                break;
            case 'manualEnrolment':

                $this->classForSelectees = "available";
                $this->classForSelected = "available";

                if (!empty($week)) {
                    // Get teacher's free blocks
                    $this->schedules = $this->utcToLocal($this->getTeachersAvailability($users, $week));
                } else {
                    // Get teacher schedule
                    $this->schedules = $this->utcToLocal($this->getTeachersAvailability($users));
                }

                break;

            case 'classRescheduling':

                $this->classForSelectees = "available";
                $this->classForSelected = "available";

                // Get teacher's free blocks
                $this->schedules = $this->utcToLocal($this->getTeachersAvailability($users, $week));

                break;

            case 'adminShow':

                $this->classForSelected = "selected";

                if (!User::withTrashed()->find($users)->trashed()) {

                    if (User::find($users)->hasRole('teacher')) {

                        // Get teacher schedule
                        $this->schedules = $this->utcToLocal($this->getUserSchedule($users));

                        // Get students' schedules and data
                        $this->studentsInfo = array_map(function ($arr) {
                            return ['student' => $arr['student'], 'schedule' => $this->utcToLocal($arr['schedule'])];
                        }, $this->getStudentsInfo($users));
                    }

                    if (User::find($users)->hasRole('student')) {

                        // Get student schedule
                        $this->schedules = $this->utcToLocal($this->getUserSchedule($users));
                    }

                    // Emit event of schedule updated and send schedule to parent component
                    // $this->dispatchBrowserEvent('scheduleLoaded', ['schedule' => $this->schedules]);
                }
        }
    }

    public function loadSelectingSchedule($teacherId = null)
    {
        if (!empty($teacherId)) {
            if ($this->action == 'scheduleSelection') {
                $this->schedules = $this->utcToLocal($this->getTeachersAvailability($teacherId));
            }

            if ($this->action == 'schedulePreselection') {
                $this->schedules = $this->utcToLocal($this->getTeachersPreselectionAvailability($teacherId));
            }
        }

        // Emit event of schedule updated and send schedule to parent component
        $this->dispatchBrowserEvent('scheduleLoaded', ['schedule' => $this->schedules]);
    }

    public function datesToScheduleFormat($dates)
    {
        $schedule = [];
        foreach ($dates as $date) {
            $schedule[] = [
                0 => (int)Carbon::parse($date)->format('H'),
                1 => Carbon::parse($date)->dayOfWeek,
            ];
        }

        return $schedule;
    }

    public function getOcassionalClasses($teacher, $week = null)
    {
        $academicPeriod = json_decode(DB::table('metadata')->where('key', 'current_period')->first()->value);
        $periodStart = new Carbon($academicPeriod->start_date);

        // $now = Carbon::now('UTC');
        // $timezone = new DateTimeZone(auth()->user()->timezone);
        // $now->setTimezone($timezone);

        // $weekStart = $periodStart->copy()->subDay()->addWeeks($week - 1)->subSeconds($timezone->getOffset($now));
        // $weekEnd = $periodStart->copy()->subDay()->addWeeks($week)->subSeconds($timezone->getOffset($now));

        $weekStart = $periodStart->copy()->subDay()->addWeeks($week - 1);
        $weekEnd = $periodStart->copy()->subDay()->addWeeks($week);

        $this->date = [];
        for ($i = $weekStart->dayOfWeek; $i <= 7; $i++) {
            $this->date[] = $weekStart->copy()->addDays($i - $weekStart->dayOfWeek)->isoFormat('M/D');
        }

        // Verify if $teachers is an array and transform it into a collection if it's not
        $teacher = User::find($teacher);

        // Get teacher's enrolments
        $teacherEnrolments = Enrolment::where('teacher_id', $teacher->id)->whereNotNull('student_id')->get();

        // Get teacher's ocassional classes
        $ocassionalClasses = [];

        foreach ($teacherEnrolments as $enrolment) {
            if (Classes::where('enrolment_id', $enrolment->id)->where('status', 1)->whereDate('start_date', '>=', $weekStart)->whereDate('start_date', '<', $weekEnd)->count()) {
                $ocassionalClasses[] = Classes::where('enrolment_id', $enrolment->id)->where('status', 1)->whereDate('start_date', '>=', $weekStart)->whereDate('start_date', '<', $weekEnd)->get()->pluck('start_date')->toArray();
            }
        }
        $ocassionalClasses = array_merge(...$ocassionalClasses);

        $weekStart->diffInHoursFiltered(function (Carbon $date) use (&$ocassionalClasses) {
            if ($date < now()) array_push($ocassionalClasses, $date->toDateTimeString());
        }, $weekEnd);

        return $ocassionalClasses;
    }

    public function getTeachersAvailability($teachers, $week = null)
    {
        // Verify if $teachers is an array and transform it into a collection if it's not
        is_array($teachers) == true ? $teachers = User::find($teachers) : $teachers = User::find([$teachers]);

        foreach ($teachers as $key => $teacher) {

            // Get students' schedules
            $studentsSchedules[$key] = $this->getStudentsSchedules($teacher->id, false);

            // Get teacher schedule
            $teacherSchedule[$key] = $this->getUserSchedule($teacher->id);

            // Get difference between teacher schedule and students' schedules
            $teachersAvailability[$key] = $this->schedulesDiff($teacherSchedule[$key], $studentsSchedules[$key]);

            if (!empty($week)) {
                // Get teacher's ocassional classes
                $ocassionalClasses[$teacher->id] = $this->getOcassionalClasses($teacher->id, $week);
            }
        }
        $teachersAvailability = array_merge(...$teachersAvailability);

        // Remove duplicate schedules
        $teachersAvailability = array_values(array_map("unserialize", array_unique(array_map("serialize", $teachersAvailability))));

        if (!empty($week)) {
            $ocassionalClasses = array_merge(...$ocassionalClasses);
            $ocassionalClasses = $this->datesToScheduleFormat($ocassionalClasses);
            $teachersAvailability = $this->schedulesDiff($teachersAvailability, $ocassionalClasses);
        }

        return $teachersAvailability;
    }

    public function getTeachersPreselectionAvailability($teachers, $week = null)
    {
        // Verify if $teachers is an array and transform it into a collection if it's not
        is_array($teachers) == true ? $teachers = User::find($teachers) : $teachers = User::find([$teachers]);

        foreach ($teachers as $key => $teacher) {

            // Get students' schedules
            $nextStudentsSchedules[$key] = $this->getNextStudentsSchedules($teacher->id, false);

            // Get teacher schedule
            $teacherNextSchedule[$key] = $this->getUserSchedule($teacher->id);

            // Get difference between teacher schedule and students' schedules
            $teachersPreselectionAvailability[$key] = $this->schedulesDiff($teacherNextSchedule[$key], $nextStudentsSchedules[$key]);

            if (!empty($week)) {
                // Get teacher's ocassional classes
                $ocassionalClasses[$teacher->id] = $this->getOcassionalClasses($teacher->id, $week);
            }
        }
        $teachersPreselectionAvailability = array_merge(...$teachersPreselectionAvailability);

        // Remove duplicate schedules
        $teachersPreselectionAvailability = array_values(array_map("unserialize", array_unique(array_map("serialize", $teachersPreselectionAvailability))));

        if (!empty($week)) {
            $ocassionalClasses = array_merge(...$ocassionalClasses);
            $ocassionalClasses = $this->datesToScheduleFormat($ocassionalClasses);
            $teachersPreselectionAvailability = $this->schedulesDiff($teachersPreselectionAvailability, $ocassionalClasses);
        }

        return $teachersPreselectionAvailability;
    }

    public function getStudentsInfo($teachers)
    {
        // Verify if $teachers is an array and transform it into a collection if it's not
        is_array($teachers) == true ? $teachers = User::find($teachers) : $teachers = User::find([$teachers]);

        foreach ($teachers as $key => $teacher) {

            // Get students' schedules and data
            $studentsInfo[$key] = $this->getStudentsSchedules($teacher->id, true);
        }

        // Merge students' schedules and data
        $studentsInfo = array_merge(...$studentsInfo);

        // Convert students' schedules from UTC to local time
        foreach ($studentsInfo as $key => $studentInfo) {
            $studentInfo['schedule'] = $studentInfo['schedule'];
            $studentsInfo[$key] = $studentInfo;
        }

        return $studentsInfo;
    }

    /**
     * Get students' schedules and data
     * 
     * @param array $teacherEnrolments
     * @param boolean $getStudentsInfo
     * 
     * @return array $studentsSchedules
     * @return array $studentsInfo
     * 
     */
    public function getStudentsSchedules($teacherId, $getStudentsInfo = false)
    {
        // Get teacher enrolments
        $teacherEnrolments = Enrolment::where('teacher_id', $teacherId)->whereNotNull('student_id')->get();

        // Get students' schedules and data
        $studentsSchedules = [];
        $studentsInfo = [];
        foreach ($teacherEnrolments as $enrolment) {
            if ($getStudentsInfo == true) {
                $studentsInfo[] = [
                    'student' => $enrolment->student,
                    'schedule' => $enrolment->schedule->selected_schedule,
                ];
            }
            $studentsSchedules[] = $enrolment->schedule->selected_schedule;
        }

        // Merge students' schedules
        $studentsSchedules = array_merge(...$studentsSchedules);

        // Remove duplicate schedules
        $studentsSchedules = array_values(array_map("unserialize", array_unique(array_map("serialize", $studentsSchedules))));

        return $getStudentsInfo == true ? $studentsInfo : $studentsSchedules;
    }

    public function getNextStudentsSchedules($teacherId, $getStudentsInfo = false)
    {
        // Get teacher enrolments
        // $preselections = Enrolment::where('teacher_id', 7)->whereNotNull('student_id')->get()->pluck('preselection');
        $preselections = Enrolment::where('teacher_id', $teacherId)->whereNotNull('student_id')->get()->pluck('preselection')->filter();

        // Get students' schedules and data
        $studentsSchedules = [];
        $studentsInfo = [];

        foreach ($preselections as $preselection) {
            if ($getStudentsInfo == true) {
                $studentsInfo[] = [
                    'student' => $preselection->enrolment->student,
                    'schedule' => $preselection->schedule,
                ];
            }
            $studentsSchedules[] = $preselection->schedule;
        }

        // Merge students' schedules
        $studentsSchedules = array_merge(...$studentsSchedules);

        // Remove duplicate schedules
        $studentsSchedules = array_values(array_map("unserialize", array_unique(array_map("serialize", $studentsSchedules))));

        return $getStudentsInfo == true ? $studentsInfo : $studentsSchedules;
    }

    public function schedulesDiff($scheduleA, $scheduleB)
    {
        $scheduleA = array_map(function ($arr) {
            return array_map('intval', $arr);
        }, $scheduleA);

        $scheduleB = array_map(function ($arr) {
            return array_map('intval', $arr);
        }, $scheduleB);

        // Get difference between two schedules
        $schedulesDiff = array_values(array_map("unserialize", array_diff(array_map("serialize", $scheduleA), array_map("serialize", $scheduleB))));

        return $schedulesDiff;
    }

    public function schedulesIntersect($scheduleA, $scheduleB)
    {
        // Get intersection between two schedules
        $schedulesIntersect = array_values(array_map("unserialize", array_intersect(array_map("serialize", $scheduleA), array_map("serialize", $scheduleB))));

        return $schedulesIntersect;
    }

    public function getUserSchedule($users)
    {
        // Get user schedule
        is_array($users) == true ? $users = User::find($users) : $users = User::find([$users]);

        // Get first schedule of each user
        $schedules = [];
        foreach ($users as $user) {
            if (!empty($user->schedules->count())) {
                $schedules[] = $user->schedules->first()->selected_schedule;
            }
        }

        // Merge schedules
        $schedules = array_merge(...$schedules);

        // Remove duplicate schedules
        $schedules = array_values(array_map("unserialize", array_unique(array_map("serialize", $schedules))));

        return $schedules;
    }

    public function utcToLocal($schedule, $timezone = null)
    {
        $timezone == null ? $timezone = auth()->user()->timezone : $timezone = $timezone;

        // Convert UTC to local time
        $localSchedule = [];

        // Get local date and time of the UTC schedule and convert it to array of hour and day of week (0-6)
        $tempDate = Carbon::now();
        foreach ($schedule as $key => $value) {
            $localDate = Carbon::parse('This ' . Carbon::now()->copy()->setISODate($tempDate->year, $tempDate->weekOfYear, $value[1])->format('l') . ' at ' . $value[0] . ':00')->timezone(auth()->user()->timezone);
            $localSchedule[$key] = [$localDate->hour, $localDate->dayOfWeek];
        }

        return $localSchedule;
    }

    public function localToUtc($schedule, $timezone = null)
    {
        $timezone == null ? $timezone = auth()->user()->timezone : $timezone = $timezone;

        // Convert local time to UTC
        $utcSchedule = [];

        // Get UTC date and time of the local schedule and convert it to array of hour and day of week (0-6)
        $tempDate = Carbon::now();
        foreach ($schedule as $key => $value) {
            $utcDate = Carbon::parse('This ' . Carbon::now()->setISODate($tempDate->year, $tempDate->weekOfYear, $value[1])->format('l') . ' at ' . $value[0] . ':00', auth()->user()->timezone)->timezone('UTC');
            $utcSchedule[$key] = [$utcDate->hour, $utcDate->dayOfWeek];
        }
        return $utcSchedule;
    }

    public function updateSchedule($schedule)
    {
        $affectedStudentsSchedules = $this->schedulesDiff($this->getStudentsSchedules($this->users), $this->localToUtc($schedule));
        $teacherStudents = $this->getStudentsSchedules($this->users, true);
        $affectedStudents = [];
        foreach ($teacherStudents as $student) {
            if (count($this->schedulesIntersect($student['schedule'], $affectedStudentsSchedules)) > 0) {
                $affectedStudents[] = $student['student']->id;

                //Por los momentos solo guarda el id del estudiante afectado, pero se puede guardar también el horario afectado utilizando la linea comentada abajo (considerar para futuras mejoras)
                // $affectedStudents[$student['student']->id] = $this->schedulesIntersect($student['schedule'], $affectedStudentsSchedules);
            }
        }

        // Update schedule
        $user = User::find($this->users);
        if (!empty($user->schedules->first())) {
            $user->schedules->first()->selected_schedule = $this->localToUtc($schedule);
            $user->schedules->first()->save();
        } else {
            $user->schedules()->create([
                'selected_schedule' => $this->localToUtc($schedule),
            ]);
        }

        // Convert schedule to local time
        $schedule = $this->utcToLocal($this->getUserSchedule($user->id));

        // Emit event of schedule updated and send schedule to parent component
        $this->dispatchBrowserEvent('scheduleUpdated', ['schedule' => $schedule]);
    }

    public function previousWeek()
    {
        $this->week > 1 ? $this->week -= 1 : $this->week = 1;
        $this->schedules = $this->utcToLocal($this->getTeachersAvailability($this->users, $this->week));

        // Emit event of schedule updated and send schedule to parent component
        $this->dispatchBrowserEvent('weekChanged', ['schedule' => $this->schedules]);
    }

    public function nextWeek()
    {
        $this->week < 4 ? $this->week += 1 : $this->week = 4;
        $this->schedules = $this->utcToLocal($this->getTeachersAvailability($this->users, $this->week));

        // Emit event of schedule updated and send schedule to parent component
        $this->dispatchBrowserEvent('weekChanged', ['schedule' => $this->schedules]);
    }

    public function failedValidation()
    {
        // Emit event of schedule updated and send schedule to parent component
        $this->dispatchBrowserEvent('updateSchedule', ['schedule' => $this->schedules]);
    }

    public function saveSchedule($data)
    {
        switch ($this->action) {
            case 'classRescheduling':

                $this->validate();

                // Get class to reschedule
                $toRescheduleClass = session('toRescheduleClass');

                // Check if class exists
                if (!empty($toRescheduleClass)) {

                    // Get class to reschedule
                    $toRescheduleClass = Classes::find($toRescheduleClass);

                    $classOldDate = (new Carbon($toRescheduleClass->start_date))->timezone($toRescheduleClass->teacher()->timezone)->isoFormat('MMMM Do - Oh:00 a');

                    // Get new class date
                    $newClassDate = array_merge(...$data);

                    // Convert new class date to Carbon object
                    $datetime = $newClassDate[2] . " " . $newClassDate[0] . ":00:00";

                    // Get new class date in user timezone
                    $newClassDate = Carbon::createFromFormat('m/d H:i:s', $datetime, auth()->user()->timezone);

                    // Get new class date in UTC
                    $newClassDate = $newClassDate->timezone('UTC');

                    // Update class date
                    $toRescheduleClass->start_date = $newClassDate;
                    $toRescheduleClass->end_date = $newClassDate->copy()->addMinutes(40);
                    $toRescheduleClass->status = 1;
                    $s = $toRescheduleClass->save();

                    $classNewDate = $toRescheduleClass->start_date->copy()->timezone($toRescheduleClass->teacher()->timezone)->isoFormat('MMMM Do - Oh:00 a');
                    Notification::sendNow($toRescheduleClass->student(), new ClassRescheduledToStudent());
                    Notification::sendNow($toRescheduleClass->teacher(), new ClassRescheduledToTeacher($toRescheduleClass->student(), $classOldDate, $classNewDate));


                    session()->forget('toRescheduleClass');

                    if (auth()->user()->hasRole('admin')) {
                        redirect()->to('admin/classes')->with('success', 'Class rescheduled successfully.');
                    } else {
                        redirect()->to('/classes')->with('success', 'Class rescheduled successfully.');
                    }
                } else {
                    // Class not found
                    // session()->flash('error', 'There was an error rescheduling the class. Please try again.');
                }

                break;
            case 'examSelection':
                //
                break;
            case 'manualEnrolment':

                if ($this->limit == count($data)) {

                    $schedule = $this->localToUtc($data);
                    $schedule = $this->utcToLocal($schedule);

                    $request = new Request([
                        "data" => json_encode($schedule),
                        "error" => "false",
                        "action" => $this->action,
                        "_token" => csrf_token(),
                    ]);

                    (new SchedulingCalendarController)->checkForTeachers($request);
                }

                break;

            case 'scheduleSelection':

                if ($this->limit == count($data)) {

                    $schedule = $this->localToUtc($data);
                    $schedule = $this->utcToLocal($schedule);

                    $request = new Request([
                        "data" => json_encode($schedule),
                        "error" => "false",
                        "action" => $this->action,
                        "_token" => csrf_token(),
                    ]);

                    (new SchedulingCalendarController)->checkForTeachers($request);
                }

                break;
            case 'schedulePreselection':

                if ($this->limit == count($data)) {

                    $schedule = $this->localToUtc($data);
                    $schedule = $this->utcToLocal($schedule);

                    $request = new Request([
                        "data" => json_encode($schedule),
                        "error" => "false",
                        "action" => $this->action,
                        "_token" => csrf_token(),
                    ]);

                    (new SchedulingCalendarController)->checkForTeachers($request);
                }

                break;
        }
    }

    public function render()
    {
        return view('livewire.new-schedule');
    }
}
