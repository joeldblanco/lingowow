<?php

namespace App\Http\Controllers;

// use App\Jobs\StudentClassCheck;
// use App\Jobs\TeacherClassCheck;
use App\Models\Classes;
use App\Models\Enrolment;
use App\Models\Schedule;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Comment;
use App\Models\Complaint;
use App\Models\Meeting;
use App\Models\ScheduleReserve;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Notifications\BookedClass;
use App\Notifications\BookedPlacementTest;
use Illuminate\Support\Facades\Notification;

class ClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $teachers = User::role('teacher')->get();
        $students = User::role('student')->get();
        $enrolments = Enrolment::all();

        return view('classes.create', compact('teachers', 'students', 'enrolments'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            // 'teacher_id' => 'required|numeric|exists:App\Models\User,id',
            // 'student_id' => 'required|numeric|exists:App\Models\User,id',
            'enrolment_id' => 'required|numeric|exists:App\Models\Enrolment,id',
            'date_time' => 'required|date_format:Y-m-d\TH:i',
        ]);
        $date_time = Carbon::parse($request->date_time)->format('Y-m-d H:i:s');
        $enrolment = Enrolment::find($request->enrolment_id);
        $meeting_id = Meeting::where('host_id', $enrolment->teacher->id)->where('atendee_id', $enrolment->student->id)->first()->id;
        Classes::create([
            'enrolment_id' => $enrolment->id,
            'start_date' => $date_time,
            'end_date' => Carbon::parse($date_time)->addMinutes(40)->format('Y-m-d H:i:s'),
            'meeting_id' => $meeting_id,
        ]);

        return redirect()->route('admin.classes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Classes  $classes
     * @return \Illuminate\Http\Response
     */
    public function show(Classes $classes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Classes  $classes
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $class = Classes::find($id);
        if (empty($class)) abort(404);
        $enrolment = Enrolment::find($class->enrolment_id);
        $teacher_id = $enrolment->teacher_id;
        $student_id = $enrolment->student_id;
        session([
            'teacher_id' => $teacher_id,
            'toRescheduleClass' => $id,
        ]);

        $class_date = $class->start_date;
        $class_date = new Carbon($class_date);
        $class_date = $class_date->timezone(auth()->user()->timezone)->format('Y/m/d H:00');
        // dd($class_date);

        $teacher_schedule = Schedule::where('user_id', $teacher_id)->select('selected_schedule')->get()->toArray();

        foreach ($teacher_schedule as $key => $value) {
            // dd($value["selected_schedule"]);
            // $teacher_schedule[$key] = json_decode($value["selected_schedule"], 1);
            $teacher_schedule[$key] = $value["selected_schedule"];
        }
        $teacher_schedule = array_merge(...$teacher_schedule);
        // dd($teacher_schedule);


        // $students = [];

        // $aux_students = Enrolment::select('student_id')->get()->toArray();
        // foreach ($aux_students as $key => $value) {
        //     $aux_students[$key] = $value["student_id"];
        // }

        // $aux_students = User::find($aux_students);
        // $students_schedules = [];
        // foreach ($aux_students as $key => $value) {
        //     $students[$key][0] = $value;
        //     $students[$key][1] = $students_schedules[] = json_decode($value->schedules->first()->selected_schedule, 1);
        // }
        // $students_schedules = array_merge(...$students_schedules);

        $user = auth()->user()->id;
        $scheduled_classes = [];
        $students = [];
        $students_schedules = [];
        $scheduled_classes = Enrolment::select('student_id')
            ->where('teacher_id', $teacher_id)
            ->where('student_id', '!=', $user)
            ->get();

        foreach ($scheduled_classes as $key => $value) {
            $students[$key] = $value->student_id;
        }
        $students = User::find($students);

        foreach ($students as $key => $value) {
            $students[$key][1] = Schedule::select('selected_schedule')
                ->where('user_id', $value->id)
                ->get();
            // $students[$key][1] = json_decode($students[$key][1][0]->selected_schedule);
            // dd($students[$key][1][0]->selected_schedule);
            $students[$key][1] = $students[$key][1][0]->selected_schedule;
        }

        foreach ($students as $student) {
            $students_schedules[] = $student[1];
        }
        $students_schedules = array_merge(...$students_schedules);


        //HORARIO DE LA UNIVERSIDAD

        $university_schedule = Schedule::university_schedule();

        return view('classes.edit', compact('university_schedule', 'id', 'class_date', 'student_id', 'teacher_id', 'teacher_schedule', 'students_schedules', 'students'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Classes  $classes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $admin = User::whereHas("roles", function ($q) {
            $q->where("name", "admin");
        })->first()->id;

        $error_message = "";
        // session(['message' => $messages]);

        try {
            $validate = $request->validate([
                "message" => "required",
                "check" => "accepted"
            ]);
        } catch (\Throwable $th) {
            // dd($th->validator->errors()->first());
            // dd(get_class_methods($th));
            switch ($request->error) {
                case "not_enough_days":
                    $error_message .= ". Make sure to select the rescheduled date.";
                    break;
                case "too_much_days":
                    $error_message .= ". You can only select one rescheduled date.";
                    break;
                case "null":
                    $error_message .= ". Please enter the reason for rescheduling.";
                    break;
                case "not_check":
                    $error_message .= ". You must accept the terms of class recovery.";
                    break;
            }
            //dd($request->data);
            session(['message' => $error_message]);
            return redirect()->back();
            // dd($th->getMessage());
        }


        //dd($validate);
        if ($request->error == "false") {
            // $request->data = explode(',', $request->data);
            $id = $request->id;
            $request->data = json_decode($request->data);
            $data = array_filter($request->data);
            $data = array_merge(...array_values($data));
            $class = Classes::find($id); //Ubico la clase, para sacar el id del profesor;


            $teacher = User::find(session('teacher_id'));
            $timezone = Carbon::now()->setTimezone(auth()->user()->timezone);
            $schedule = [$data[0], $data[1]];
            $date = Carbon::now();
            $date_local = Carbon::parse('Next ' . Carbon::now()->setISODate($date->year, $date->weekOfYear, $schedule[1])->format('l') . ' at ' . $schedule[0] . ':00');
            $data[0] = (int)$date_local->copy()->subHours($timezone->offsetHours)->hour;
            $data[1] = (int)$date_local->copy()->subHours($timezone->offsetHours)->dayOfWeek;

            $schedules_reserves = ScheduleReserve::schedulesReserves($class->teacher()->id); // Posicion 0 para los horarios normales, Posicion 1 para los horarios de un solo dia.
            $teacher = User::find($class->teacher()->id);
            // dd(in_array($data, $schedules_reserves[1]),in_array($data, $schedules_reserves[0]), $schedules_reserves[1], $data);
            if (in_array([$data[0], $data[1]], $teacher->studentsSchedules()) || !in_array([$data[0], $data[1]], $teacher->schedules->first()->selected_schedule) || in_array([$data[0], $data[1]], $schedules_reserves[0]) || in_array($data, $schedules_reserves[1])) {
                session(['message' => "Dear Student. That block is not available"]);
                return redirect()->back();
            }


            $newDateStart = Carbon::create((new Carbon())->year, $data[3], $data[4], $data[0]);
            $newDateStart = $newDateStart->toDateTimeString();
            $newDateEnd = Carbon::create((new Carbon())->year, $data[3], $data[4], $data[0])->addMinutes(40);
            $newDateEnd = $newDateEnd->toDateTimeString();

            $message = "Class rescheduled for the following reason: " . $request->message . ". Original date: " . $class->start_date . " - " . "New date: " . $newDateStart . ".";

            $class->start_date = $newDateStart;
            $class->end_date = $newDateEnd;
            //STATUS ONE, MEANS THAT SOMEONE ABCENSES A CLASS
            $class->status = 1;
            $class->save();

            ////IMPORTANTE!!!! PREGUNTAR COMO SE MANEJA EL MODELO COMMENTS
            // $type = "App\Models\Classes";
            // Comment::create([
            //     // 'class_id' => $id,
            //     'author_id' => auth()->id(),
            //     'content' => $message,
            //     'commentable_id' => $id,
            //     'commentable_type' => $type,
            // ]);
            $comment = new Comment();
            $comment->author_id = auth()->user()->id;
            $comment->content = $message;
            $comment->commentable_id = $id;
            $comment->commentable_type = 'App\Models\Classes';
            $comment->save();
        } else {
            switch ($request->error) {
                case "not_enough_days":
                    $error_message .= ". Make sure to select the rescheduled date.";
                    break;
                case "too_much_days":
                    $error_message .= ". You can only select one rescheduled date.";
                    break;
                case "null":
                    $error_message .= ". Please enter the reason for rescheduling.";
                    break;
                case "not_check":
                    $error_message .= ". You must accept the terms of class recovery.";
                    break;
            }
            session(['message' => $error_message]);
            return redirect()->back();
        }

        return redirect()->route('dashboard');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Classes  $classes
     * @return \Illuminate\Http\Response
     */
    public function destroy(Classes $classes)
    {
        //
    }

    public static function getRecordingUrl($class)
    {
        // $meeting = Meeting::where('atendee_id',$class->student()->id)->where('host_id',$class->teacher()->id)->first();
        $recordings = (new MeetingController)->getRecordings($class);
        // dd($recordings);
        // dump($recordings);
        // if(isset($recordings["code"]) && ($recordings["code"] == 3301 || $recordings["code"] === 1001 || $recordings["code"] === 1010))
        // {
        //     return $recordings["message"];
        // }else{

        // }

        return $recordings;
    }

    public function registerComplain(Request $request)
    {
        $request->validate([
            'subject' => 'required|string',
            'complaint' => 'required|string',
            'class_id' => 'required|numeric|exists:App\Models\Classes,id',
        ]);
        $request = $request->except(['_token', '_method']);

        $complaint = new Complaint;
        $complaint->class_id = $request["class_id"];
        $complaint->subject = $request["subject"];
        $complaint->complaint = $request["complaint"];
        $complaint->save();

        return redirect()->route('classes.index');
    }

    public function updateComplain(Request $request)
    {
        $complaint = Complaint::find($request->complaint_id);

        $complaint->subject = $request->subject;
        $complaint->complaint = $request->complaint;
        $complaint->save();

        return redirect()->route('classes.index');
    }

    public function deleteComplain(Complaint $complaint)
    {
        $complaint->delete();

        return redirect()->route('classes.index');
    }

    public static function getClassesByPeriod($period)
    {
        $period = Carbon::parse('Second monday of ' . $period);

        return ApportionmentController::getPeriod($period, true);
    }

    public static function bookClasses($classDates, $enrolmentId)
    {
        $enrolment = Enrolment::find($enrolmentId);

        if ($enrolment->course->categories()->pluck('name')->contains('Test')) {
            $meetingTopic = $enrolment->student->first_name . ' ' . $enrolment->student->last_name . ' - Placement Test';
        } else {
            $meetingTopic = $enrolment->student->first_name . ' ' . $enrolment->student->last_name . ' - Lesson Room';
        }

        //BOOKING STUDENT'S MEETINGS//
        $meetingData = [
            'topic' => $meetingTopic,
            'host_id' => $enrolment->teacher->id,
            'atendee_id' => $enrolment->student->id,
        ];
        $request = new Request($meetingData);
        $meetingId = (new MeetingController)->store($request, true);

        //ADDING CLASS DURATION (40 MIN) TO CLASS START DATETIME AND STORING IT IN ANOTHER VARIABLE (TO CREATE CLASS END DATETIME)//
        foreach ($classDates as $date) {
            $startDateTime = Carbon::parse($date)->toDateTimeString();
            $endDateTime = Carbon::parse($date)->addMinutes(40)->toDateTimeString();
            Classes::create([
                'start_date' => $startDateTime,
                'end_date' => $endDateTime,
                'enrolment_id' => $enrolment->id,
                'meeting_id' => $meetingId,
            ]);
        }

        //SENDING NOTIFICATION TO TEACHER//
        if ($enrolment->course->categories()->pluck('name')->contains('Test')) {
            Notification::sendNow($enrolment->teacher, new BookedPlacementTest($enrolment->student->id));
        } else {
            Notification::sendNow($enrolment->teacher, new BookedClass($enrolment->student->id));
        }

        return $classDates;
    }
}
