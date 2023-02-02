<?php

namespace App\Http\Controllers;

use App\Jobs\StoreSelfEnrolment;
use App\Models\Classes;
use App\Models\Course;
use App\Models\Enrolment;
use App\Models\Schedule;
use App\Models\ScheduleReserve;
use Illuminate\Http\Request;
use App\Models\User;
use App\Notifications\StudentUnrolment;
use App\Notifications\StudentUnrolmentToTeacher;
// use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;
use App\Notifications\ClassRescheduledToTeacher;
use App\Notifications\ClassRescheduledToStudent;
use Carbon\Carbon;
use Cart;
use Illuminate\Support\Facades\DB;

use function PHPSTORM_META\type;

class SchedulingCalendarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     * 
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $plan = session('plan');
        return view('calendar-selection', compact('plan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public static function store($student_id = null, $enrolment)
    {
        // dispatch(new CreateSchedule($student_id, $enrolment->id));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // dd($request->error);
        if ($request->error == "false") {
            // $request->data = explode(',', $request->data);
            $request->data = json_decode($request->data);
            $requested_schedule = array_filter($request->data);
            $requested_schedule = array_values($requested_schedule);
            // $requested_schedule = array_chunk($request->data,2);

            // dd($request->data);

            $user_role = Auth::user()->roles->pluck('name')[0];
            $user_id = auth()->id();

            $user_schedule = Schedule::select('selected_schedule')->where('user_id', $user_id)->get();
            if (count($user_schedule)) {
                $user_schedule = $user_schedule[0]->selected_schedule;
            }

            if ($user_role == "student") {

                $enrolment = Enrolment::where('student_id', $user_id)->first();
                // dd($enrolment);
                $teacher_id = $enrolment->teacher_id;
                // $teacher_id = $teacher_id[0]->teacher_id;

                $teacher_students = Enrolment::select('student_id')->where('teacher_id', $teacher_id)->get();
                foreach ($teacher_students as $key => $value) {
                    $teacher_students[$key] = $value->student_id;
                }

                $teacher_students_schedule = Schedule::select('selected_schedule')->whereIn('user_id', $teacher_students)->get();
                foreach ($teacher_students_schedule as $key => $value) {
                    $teacher_students_schedule[$key] = $value->selected_schedule;
                }
                $teacher_students_schedule = array_merge(...$teacher_students_schedule);

                foreach ($user_schedule as $t_schedule) {
                    \array_splice($teacher_students_schedule, array_search($t_schedule, $teacher_students_schedule), 1);
                }

                $teacher_selected_schedule = Schedule::select('selected_schedule')->where('user_id', $teacher_id)->get();
                $teacher_selected_schedule = $teacher_selected_schedule[0]->selected_schedule;
                $teacher_available_schedule = $teacher_selected_schedule;
                foreach ($teacher_students_schedule as $t_schedule) {
                    \array_splice($teacher_available_schedule, array_search($t_schedule, $teacher_available_schedule), 1);
                }

                $count = 0;
                foreach ($requested_schedule as $u_schedule) {
                    if (in_array($u_schedule, $teacher_selected_schedule)) {
                        if (in_array($u_schedule, $teacher_available_schedule)) {
                            $count++;
                        } else if (in_array($u_schedule, $user_schedule)) {
                            unset($user_schedule[array_search($u_schedule, $user_schedule)]);
                            $count++;
                        }
                    }
                }
                // dd($count, count($requested_schedule));
                if ($count == count($requested_schedule)) {

                    foreach ($teacher_available_schedule as $t_schedule) {
                        foreach ($requested_schedule as $r_schedule) {
                            if ($r_schedule == $t_schedule) {
                                \array_splice($teacher_available_schedule, array_search($t_schedule, $teacher_available_schedule), 1);
                            }
                        }
                    }

                    foreach ($teacher_selected_schedule as $t_s_schedule) {
                        foreach ($user_schedule as $u_schedule) {
                            if ($t_s_schedule == $u_schedule) {
                                array_push($teacher_available_schedule, $t_s_schedule);
                            }
                        }
                    }

                    // $requested_schedule = json_encode($requested_schedule);
                    // Schedule::where('user_id',$user_id)
                    // ->update(['selected_schedule' => $requested_schedule]);
                    // dd($requested_schedule);
                    $schedule = Schedule::withTrashed()->updateOrCreate(
                        ['user_id' => $user_id, 'enrolment_id' => $enrolment->id],
                        ['next_schedule' => $requested_schedule, 'deleted_at' => NULL]
                    );
                    // dd($schedule);
                    // $teacher_available_schedule = json_encode($teacher_available_schedule);
                    // User::where('id',$teacher_id)
                    // ->update(['available_schedule' => $teacher_available_schedule]);

                    $message = "Request accepted. ";
                    $message .= "However, it will be effective for the following period";

                    $student = User::find($user_id);
                    $teacher = User::find($teacher_id);
                    Notification::sendNow($teacher, new ClassRescheduledToTeacher($student));
                    Notification::sendNow($student, new ClassRescheduledToStudent);
                } else {
                    $message = "Request rejected. Those blocks are not available.";
                }
            } else if ($user_role == "teacher") {

                $students_schedules = [];
                $affected_students = [];
                $students_enrolments = Enrolment::where('teacher_id', $user_id)->where('student_id', '!=', NULL)->get();

                //Fechas para la consulta de las clases reagendadas en el periodo vigente.
                $current_period = ApportionmentController::currentPeriod();
                $period_end_c = new Carbon($current_period[1]);
                $today = new Carbon();

                foreach ($students_enrolments as $student_enrolment) {
                    $student_schedule = Schedule::select('selected_schedule')->where('enrolment_id', $student_enrolment->id)->first();
                    $student_schedule = $student_schedule->selected_schedule;

                    //Consulta de las clases reagendadas en el periodo vigente.
                    $abcense = Classes::select('start_date')
                        ->where('status', '1')
                        ->whereBetween('start_date', [$today->toDateTimeString(), $period_end_c->toDateTimeString()])
                        ->get();

                    foreach ($abcense as $key => $value) {
                        $abcense[$key] = $value->start_date;
                    }
                    $abcense = json_decode($abcense);

                    foreach ($abcense as $key => $value) {
                        $abcense[$key] = new Carbon($abcense[$key]);
                    }

                    $abcense_classes = [];
                    foreach ($abcense as $key => $value) {
                        $abcense_classes[$key] = $abcense[$key]->isoFormat('H') . '-' . $abcense[$key]->isoFormat('d');
                    }
                    //Se añaden las clases reagendadas al horario de los estudiantes para un compendio general
                    foreach ($abcense_classes as $classes) {
                        $class = explode("-", $classes);
                        array_push($student_schedule, $class);
                    }

                    array_push($students_schedules, $student_schedule);
                }

                foreach ($students_schedules as $key => $student_schedule) {

                    // dd($requested_schedule, $students_schedules);

                    // if($student_block != null){
                    foreach ($student_schedule as $index => $student_block) {

                        // dd($students_schedules, $key, $student_block, $students_enrolments[$key]->student_id);

                        if (!in_array($student_block, $requested_schedule)) {
                            array_push($affected_students, $students_enrolments[$key]->student_id);
                        }
                    }
                    // }
                }

                $affected_students = array_unique($affected_students);

                // dd($students_schedules, $requested_schedule, $affected_students);

                if (count($requested_schedule) <= 0) $requested_schedule = null;


                Schedule::withTrashed()->updateOrCreate(
                    ['user_id' => $user_id],
                    ['selected_schedule' => $requested_schedule, 'deleted_at' => NULL]
                );

                // Schedule::upsert([
                //     ['user_id' => $user_id, 'selected_schedule' => json_encode($requested_schedule)]
                // ],['user_id'],['selected_schedule']);

                // $students_schedules = array_merge(...$students_schedules);

                // $teacher_available_schedule = $requested_schedule;

                // foreach($students_schedules as $s_schedule){
                //     if(in_array($s_schedule, $teacher_available_schedule)){
                //         \array_splice($teacher_available_schedule, array_search($s_schedule,$teacher_available_schedule), 1);
                //     }
                // }

                // User::where('id',$user_id)
                // ->update(['available_schedule' => json_encode($teacher_available_schedule)]);

                $message = "Your schedule has been successfully updated. ";

                if (count($affected_students) > 0) {
                    session(['affected_students' => $affected_students]);
                    $message .= "However, the blocks taken and classes rescheduled by the following students will remain intact until the end of the current academic period: ";
                }
            }
        } else {
            $message = "Request rejected";
            switch ($request->error) {
                case "same_day":
                    $message .= ". You cannot select two classes for the same day.";
                    break;
                case "not_enough_days":
                    $message .= ". You selected fewer classes than those reflected in your plan.";
                    break;
                case "too_much_days":
                    $message .= ". You selected more classes than those reflected in your plan.";
                    break;
            }
        }

        // dd($requested_schedule,$user_id,$teacher_id,$teacher_available_schedule,$teacher_selected_schedule,$user_role,$user_schedule);
        session(['message' => $message]);

        return redirect()->route('dashboard');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $student_id
     * @param  int  $course_id
     * @return \Illuminate\Http\Response
     */
    public function destroy($student_id, $course_id)
    {
        $user_enrolment = Enrolment::where('student_id', $student_id)->where('course_id', $course_id)->first();

        if ($user_enrolment) {

            $student = User::find($student_id);
            $teacher = User::find($user_enrolment->teacher_id);
            $student_schedule = $user_enrolment->schedule;
            $to_delete_schedule = $student_schedule;

            $student_schedule->delete();
            $user_enrolment->delete();

            Notification::sendNow($teacher, new StudentUnrolmentToTeacher($student, $course_id, $to_delete_schedule));
            Notification::sendNow($student, new StudentUnrolment($student->id, $course_id));
        } else {
            return "User not enrolled";
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function checkForTeachers(Request $request)
    {
        if ($request->error == "false") {
            // session()->forget('teacher_id');
            $cells = json_decode($request->data);
            // $cells = array_chunk($request->data, 2);
            // dd($cells);
            session(['user_schedule' => json_encode($cells)]);
            session(['schedule_reserve' => json_encode($cells)]);


            // dd(session()->all(), json_decode(session('user_schedule')), $cells);
            $teachers = [];
            $teachers_available = [];
            $day_of_exam = [$cells[0][0], $cells[0][1]];
            $course_id = session('selected_course');
            $modality = Course::find($course_id)->modality;
            $error = false;

            if ($modality == "exam") {
                // dd(session('teacher_id', "hola"));
                $model_roles = DB::table('model_has_roles')->select('role_id', 'model_id')->get();
                foreach ($model_roles as $model_role) {

                    if ($model_role->role_id == 3) {
                        $teachers[] = $model_role->model_id;
                    }
                }
            } else {
                $teachers[] = session('teacher_id');
                // dd(session('teacher_id', "hola1"));
            }
            $teachers = User::find($teachers);

            foreach ($teachers as $teacher) {
                $T_schedule = $teacher->schedules->first()->selected_schedule;
                if ($T_schedule != null && in_array($day_of_exam, $T_schedule)) {
                    $classes = [];
                    foreach ($teacher->teacherClasses as $class) {
                        $classes[] = [(new Carbon($class->start_date))->isoFormat('H'), (new Carbon($class->start_date))->isoFormat('d')];
                    }
                    // dd($day_of_exam,$classes, !in_array($day_of_exam, $classes));
                    if (!in_array($day_of_exam, $classes)) {
                        // dd($modality, new Carbon(),(Carbon::create((new Carbon())->year, $cells[0][3], $cells[0][4], $cells[0][0], 0)), !(Carbon::create((new Carbon())->year, $cells[0][3], $cells[0][4], $cells[0][0], 0))->lessThan(new Carbon()));
                        if (($modality == "exam" && (Carbon::create((new Carbon())->year, $cells[0][3], $cells[0][4], $cells[0][0], 0))->lessThan(new Carbon()) == false) || $modality == "synchronous") {
                            // dd("todo perfect");
                            array_push($teachers_available, $teacher->id);
                        }
                    } else {
                        if ($modality != "exam") {
                            $error = true;
                            break;
                        }
                    }
                    // dd($T_schedule,$classes);
                } else {
                    if ($modality != "exam") {
                        $error = true;
                        break;
                    }
                }
            }



            if (count($teachers_available) > 0 && !$error) {

                $T_selected = rand(0, count($teachers_available) - 1);
                $teacher = User::find(7); //IMPORTANTE!!!!!! AQUI SUSTITUIR EL 7 POR "$T_selected"
                $schedules_reserves = ScheduleReserve::schedulesReserves($teacher->id); // Posicion 0 para los horarios normales, Posicion 1 para los horarios de un solo dia.
                // dd($schedules_reserves, count($cells), $cells);
                // dd($teacher->studentsSchedules(), $teacher->schedules->first()->selected_schedule, $cells, $cell);
                foreach ($cells as $cell) {
                    // dd(in_array($cell, $teacher->studentsSchedules()), !in_array($cell, $teacher->schedules->first()->selected_schedule));
                    if (in_array($cell, $teacher->studentsSchedules()) || !in_array($cell, $teacher->schedules->first()->selected_schedule) || in_array($cell, $schedules_reserves[0]) || (count($cells) == 1 && in_array($cell, $schedules_reserves[1]))) {
                        Cart::destroy();
                        session(['message' => "Dear Linguado. That block is not available"]);
                        return redirect()->route("schedule.create");
                    }
                }
                Cart::destroy();

                $product = Course::find($course_id)->products->first();
                $apportionment = ApportionmentController::calculateApportionment(session('plan'));
                $product_qty = $apportionment[0];

                if ($modality == "exam") {
                    $product_qty = 1;
                    session(['teacher_id' => 7]); //IMPORTANTE!!!!!! AQUI SUSTITUIR EL 7 POR "$T_selected"
                }
                // dd($apportionment);
                self::saveScheduleReserve($cells);

                Cart::add($product->id, $product->name, $product_qty, ($product->sale_price == null ? $product->regular_price : $product->sale_price), ['editable' => false])->associate('App\Models\Product');
                session([
                    'course_id' => $course_id,
                    'classes_dates' => $apportionment[1]
                ]);

                // dd("hola que tal", $teachers, $teachers_available, count($teachers_available), rand(0, count($teachers_available) - 1), session()->all(), $cells);
                // dd(session()->exists('enrolment_type'), session('enrolment_type') == "manual_enrolment");
                if (session()->exists('enrolment_type') && session('enrolment_type') == "manual_enrolment") {
                    // dd(session()->all());
                    $student = User::find(session('student_id'));
                    dispatch(new StoreSelfEnrolment($student));
                    session()->forget('enrolment_type');
                    return redirect()->route('enrolments.index');
                } else {
                    return redirect()->route('cart');
                }
            } else {
                Cart::destroy();
                if ($modality == "exam") {
                    $message = "Sorry dear Linguado. There are not teachers availables for that date";
                } else {
                    $message = "Dear Linguado. That block is not available";
                    session()->forget('teacher_id');
                }
            }
        } else {
            Cart::destroy();
            $message = "Request rejected";
            switch ($request->error) {
                case "same_day":
                    $message .= ". You cannot select two classes for the same day.";
                    break;
                case "not_enough_days":
                    $message .= ". You selected fewer classes than those reflected in your plan.";
                    break;
                case "too_much_days":
                    $message .= ". You selected more classes than those reflected in your plan.";
                    break;
            }
        }

        session(['message' => $message]);
        //dd($message);
        return redirect()->route("schedule.create");
    }

    public static function saveScheduleReserve($schedule = [])
    {

        $type = "";
        if (count($schedule[0]) > 2) {
            $type = "exam";
        } else {
            $type = "schedule";
        }
        $teacher_id = session('teacher_id');
        $schedule_encode = json_encode($schedule);


        $reserve = ScheduleReserve::withTrashed()->updateOrCreate(
            ['user_id' => auth()->id()],
            ['teacher_id' => $teacher_id, 'selected_schedule' => $schedule_encode, 'type' => $type]
            // ['type' => 'exam']
        );
    }
}
