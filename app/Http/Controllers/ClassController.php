<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\Enrolment;
use App\Models\Schedule;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Comment;

class ClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd("hola");
        // $posts = auth()->user()->posts()->orderBy('updated_at', 'DESC');

        // $posts = auth()->user()->posts->sortByDesc('updated_at');

        $teachers = [];
        $students = [];

        if (auth()->user()->roles[0]->name == "teacher") {
            $classes = User::find(auth()->id())->teacherClasses()->orderBy('start_date', 'ASC')->get();
            // dd($classes);
            foreach ($classes as $key => $value) {

                $students[$key] = $value->student();

                if ($value->enrolment_id == 2) {
                    // dd($students);
                }
            }
        } else if (auth()->user()->roles[0]->name == "student") {

            $classes = User::find(auth()->id())->studentClasses;
            // dd($classes);
            foreach ($classes as $key => $value) {
                $teachers[$key] = $value->teacher();
            }
        } else if (auth()->user()->roles[0]->name == "admin") {
            $classes = Classes::all()->sortBy('start_date');

            foreach ($classes as $key => $value) {
                $students[$key] = $value->student();
                $teachers[$key] = $value->teacher();
            }
        }


        return view('classes.index', compact('classes', 'students', 'teachers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $enrolment = Enrolment::find($class->enrolment_id);
        $teacher_id = $enrolment->teacher_id;
        $student_id = $enrolment->student_id;

        $class_date = $class->start_date;
        $class_date = new Carbon($class_date);
        $class_date = $class_date->toCookieString();
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
        $scheduled_classes =[];
        $students = [];
        $students_schedules = [];
        $scheduled_classes = Enrolment::select('student_id')
            ->where('teacher_id', $teacher_id)
            ->where('student_id','!=',$user)
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
            $message = "Class rescheduled for the following reason: " . $request->message;
            $request->data = json_decode($request->data);
            $data = array_filter($request->data);
            $data = array_merge(...array_values($data));

            $newDateStart = Carbon::create("2022", $data[3], $data[4], $data[0]);
            $newDateStart = $newDateStart->toDateTimeString();
            $newDateEnd = Carbon::create("2022", $data[3], $data[4], $data[0])->addMinutes(40);
            $newDateEnd = $newDateEnd->toDateTimeString();

            $class = Classes::find($id);
            $class->start_date = $newDateStart;
            $class->end_date = $newDateEnd;
            //ESTATUS ONE, MEANS THAT SOMEONE ABCENSES A CLASS
            $class->status = 1;
            $class->save();


            Comment::create([
                'class_id' => $id,
                'comment' => $message,
                'author' => $admin
            ]);
        }else{
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
}
