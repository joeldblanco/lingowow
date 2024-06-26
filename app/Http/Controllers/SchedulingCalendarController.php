<?php

namespace App\Http\Controllers;

use App\Http\Livewire\ScheduleController;
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
use Gloudemans\Shoppingcart\Facades\Cart;
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
        dd($request->error);
        // if ($request->error == "false") {
        //     // $request->data = explode(',', $request->data);
        //     $request->data = json_decode($request->data);
        //     $requested_schedule = array_filter($request->data);
        //     $requested_schedule = array_values($requested_schedule);

        //     $timezone = Carbon::now()->setTimezone(auth()->user()->timezone);
        //     $schedule_utc = [];
        //     foreach ($requested_schedule as $key => $value) {
        //         $date = Carbon::now();
        //         $date_local = Carbon::parse('Next ' . Carbon::now()->setISODate($date->year, $date->weekOfYear, $value[1])->format('l') . ' at ' . $value[0] . ':00');
        //         $schedule_utc[$key][0] = (int)$date_local->copy()->subHours($timezone->offsetHours)->hour;
        //         $schedule_utc[$key][1] = (int)$date_local->copy()->subHours($timezone->offsetHours)->dayOfWeek;
        //     }
        //     $requested_schedule = $schedule_utc;

        //     $user_role = Auth::user()->roles->pluck('name')[0];
        //     $user_id = auth()->id();

        //     $user_schedule = Schedule::select('selected_schedule')->where('user_id', $user_id)->get();
        //     if (count($user_schedule)) {
        //         $user_schedule = $user_schedule[0]->selected_schedule;
        //     }

        //     if ($user_role == "student") {

        //         $enrolment = Enrolment::where('student_id', $user_id)->first();
        //         // dd($enrolment);
        //         $teacher_id = $enrolment->teacher_id;
        //         // $teacher_id = $teacher_id[0]->teacher_id;

        //         $teacher_students = Enrolment::select('student_id')->where('teacher_id', $teacher_id)->get();
        //         foreach ($teacher_students as $key => $value) {
        //             $teacher_students[$key] = $value->student_id;
        //         }

        //         $teacher_students_schedule = Schedule::select('selected_schedule')->whereIn('user_id', $teacher_students)->get();
        //         foreach ($teacher_students_schedule as $key => $value) {
        //             $teacher_students_schedule[$key] = $value->selected_schedule;
        //         }
        //         $teacher_students_schedule = array_merge(...$teacher_students_schedule);

        //         foreach ($user_schedule as $t_schedule) {
        //             \array_splice($teacher_students_schedule, array_search($t_schedule, $teacher_students_schedule), 1);
        //         }

        //         $teacher_selected_schedule = Schedule::select('selected_schedule')->where('user_id', $teacher_id)->get();
        //         $teacher_selected_schedule = $teacher_selected_schedule[0]->selected_schedule;
        //         $teacher_available_schedule = $teacher_selected_schedule;
        //         foreach ($teacher_students_schedule as $t_schedule) {
        //             \array_splice($teacher_available_schedule, array_search($t_schedule, $teacher_available_schedule), 1);
        //         }

        //         $count = 0;
        //         foreach ($requested_schedule as $u_schedule) {
        //             if (in_array($u_schedule, $teacher_selected_schedule)) {
        //                 if (in_array($u_schedule, $teacher_available_schedule)) {
        //                     $count++;
        //                 } else if (in_array($u_schedule, $user_schedule)) {
        //                     unset($user_schedule[array_search($u_schedule, $user_schedule)]);
        //                     $count++;
        //                 }
        //             }
        //         }
        //         // dd($count, count($requested_schedule));
        //         if ($count == count($requested_schedule)) {

        //             foreach ($teacher_available_schedule as $t_schedule) {
        //                 foreach ($requested_schedule as $r_schedule) {
        //                     if ($r_schedule == $t_schedule) {
        //                         \array_splice($teacher_available_schedule, array_search($t_schedule, $teacher_available_schedule), 1);
        //                     }
        //                 }
        //             }

        //             foreach ($teacher_selected_schedule as $t_s_schedule) {
        //                 foreach ($user_schedule as $u_schedule) {
        //                     if ($t_s_schedule == $u_schedule) {
        //                         array_push($teacher_available_schedule, $t_s_schedule);
        //                     }
        //                 }
        //             }

        //             // $requested_schedule = json_encode($requested_schedule);
        //             // Schedule::where('user_id',$user_id)
        //             // ->update(['selected_schedule' => $requested_schedule]);
        //             // dd($requested_schedule);
        //             $schedule = Schedule::withTrashed()->updateOrCreate(
        //                 ['user_id' => $user_id, 'enrolment_id' => $enrolment->id],
        //                 ['next_schedule' => $requested_schedule, 'deleted_at' => NULL]
        //             );
        //             // dd($schedule);
        //             // $teacher_available_schedule = json_encode($teacher_available_schedule);
        //             // User::where('id',$teacher_id)
        //             // ->update(['available_schedule' => $teacher_available_schedule]);

        //             $message = "Request accepted. ";
        //             $message .= "However, it will be effective for the following period";

        //             $student = User::find($user_id);
        //             $teacher = User::find($teacher_id);
        //             Notification::sendNow($teacher, new ClassRescheduledToTeacher($student));
        //             Notification::sendNow($student, new ClassRescheduledToStudent);
        //         } else {
        //             $message = "Request rejected. Those blocks are not available.";
        //         }
        //     } else if ($user_role == "teacher") {

        //         $students_schedules = [];
        //         $affected_students = [];
        //         $students_enrolments = Enrolment::where('teacher_id', $user_id)->where('student_id', '!=', NULL)->get();

        //         //Fechas para la consulta de las clases reagendadas en el periodo vigente.
        //         $current_period = ApportionmentController::currentPeriod();
        //         $period_end_c = new Carbon($current_period[1]);
        //         $today = new Carbon();

        //         foreach ($students_enrolments as $student_enrolment) {
        //             $student_schedule = Schedule::select('selected_schedule')->where('enrolment_id', $student_enrolment->id)->first();
        //             $student_schedule = $student_schedule->selected_schedule;

        //             //Consulta de las clases reagendadas en el periodo vigente.
        //             $abcense = Classes::select('start_date')
        //                 ->where('status', '1')
        //                 ->whereBetween('start_date', [$today->toDateTimeString(), $period_end_c->toDateTimeString()])
        //                 ->get();

        //             foreach ($abcense as $key => $value) {
        //                 $abcense[$key] = $value->start_date;
        //             }
        //             $abcense = json_decode($abcense);

        //             foreach ($abcense as $key => $value) {
        //                 $abcense[$key] = new Carbon($abcense[$key]);
        //             }

        //             $abcense_classes = [];
        //             foreach ($abcense as $key => $value) {
        //                 $abcense_classes[$key] = $abcense[$key]->isoFormat('H') . '-' . $abcense[$key]->isoFormat('d');
        //             }
        //             //Se añaden las clases reagendadas al horario de los estudiantes para un compendio general
        //             foreach ($abcense_classes as $classes) {
        //                 $class = explode("-", $classes);
        //                 array_push($student_schedule, $class);
        //             }

        //             array_push($students_schedules, $student_schedule);
        //         }

        //         $timezone = Carbon::now()->setTimezone(auth()->user()->timezone);
        //         foreach ($students_schedules as $key1 => $value1) {
        //             $schedule_utc = [];
        //             foreach ($value1 as $key => $value) {
        //                 $date = Carbon::now();
        //                 $date_local = Carbon::parse('Next ' . Carbon::now()->setISODate($date->year, $date->weekOfYear, $value[1])->format('l') . ' at ' . $value[0] . ':00');
        //                 $schedule_utc[$key][0] = (int)$date_local->copy()->addHours($timezone->offsetHours)->hour;
        //                 $schedule_utc[$key][1] = (int)$date_local->copy()->addHours($timezone->offsetHours)->dayOfWeek;
        //             }
        //             $students_schedules[$key1] = $schedule_utc;
        //         }


        //         foreach ($students_schedules as $key => $student_schedule) {

        //             // dd($requested_schedule, $students_schedules);

        //             foreach ($student_schedule as $index => $student_block) {

        //                 // dd($students_schedules, $key, $student_block, $students_enrolments[$key]->student_id);

        //                 if (!in_array($student_block, $requested_schedule)) {
        //                     array_push($affected_students, $students_enrolments[$key]->student_id);
        //                 }
        //             }
        //             // }
        //         }

        //         $affected_students = array_unique($affected_students);

        //         // dd($students_schedules, $requested_schedule, $affected_students);

        //         if (count($requested_schedule) <= 0) $requested_schedule = null;


        //         Schedule::withTrashed()->updateOrCreate(
        //             ['user_id' => $user_id],
        //             ['selected_schedule' => $requested_schedule, 'deleted_at' => NULL]
        //         );

        //         // Schedule::upsert([
        //         //     ['user_id' => $user_id, 'selected_schedule' => json_encode($requested_schedule)]
        //         // ],['user_id'],['selected_schedule']);

        //         // $students_schedules = array_merge(...$students_schedules);

        //         // $teacher_available_schedule = $requested_schedule;

        //         // foreach($students_schedules as $s_schedule){
        //         //     if(in_array($s_schedule, $teacher_available_schedule)){
        //         //         \array_splice($teacher_available_schedule, array_search($s_schedule,$teacher_available_schedule), 1);
        //         //     }
        //         // }

        //         // User::where('id',$user_id)
        //         // ->update(['available_schedule' => json_encode($teacher_available_schedule)]);

        //         $message = "Your schedule has been successfully updated. ";

        //         if (count($affected_students) > 0) {
        //             session(['affected_students' => $affected_students]);
        //             $message .= "However, the blocks taken and classes rescheduled by the following students will remain intact until the end of the current academic period: ";
        //         }
        //     }
        // } else {
        //     $message = "Request rejected";
        //     switch ($request->error) {
        //         case "same_day":
        //             $message .= ". You cannot select two classes for the same day.";
        //             break;
        //         case "not_enough_days":
        //             $message .= ". You selected fewer classes than those reflected in your plan.";
        //             break;
        //         case "too_much_days":
        //             $message .= ". You selected more classes than those reflected in your plan.";
        //             break;
        //     }
        // }

        // // dd($requested_schedule,$user_id,$teacher_id,$teacher_available_schedule,$teacher_selected_schedule,$user_role,$user_schedule);
        // session(['message' => $message]);

        // return redirect()->route('dashboard');
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
        $cells = json_decode($request->data);
        $cells = ScheduleController::localToUtc($cells);

        session(['user_schedule' => json_encode($cells)]);
        session(['schedule_reserve' => json_encode($cells)]);

        // $teachers = [];
        // $teachers_available = [];
        // $day_of_exam = [$cells[0][0], $cells[0][1]];

        $course_id = session('selected_course');
        // $modality = Course::find($course_id)->modality;
        // $error = false;

        // if ($modality == "exam") {

        //Get all teachers in an array
        // $teachers = User::role('teacher')->get()->toArray(); //EL ARRAY $teachers DEBERÍA LLENARSE SOLO CON LOS PROFESORES QUE ESTÉN DISPUESTOS A DAR EXÁMENES DE CLASIFICACIÓN

        // $model_roles = DB::table('model_has_roles')->select('role_id', 'model_id')->get();
        // foreach ($model_roles as $model_role) {

        //     if ($model_role->role_id == 3) {
        //         $teachers[] = $model_role->model_id; 
        //     }
        // }
        // } else {
        //     $teachers[] = session('teacher_id');
        // }
        // $teachers = User::find($teachers);

        // foreach ($teachers as $teacher) {
        //     array_push($teachers_available, $teacher->id);
        // }

        // $teachers_available[] = session('teacher_id');

        // if (count($teachers_available) > 0 && !$error) {

        if (session()->exists('enrolment_type') && session('enrolment_type') == "manual_enrolment") {
            $student = User::find(session('student_id'));
        } else {
            $student = auth()->user();
        }

        // $T_selected = rand(0, count($teachers_available) - 1);
        // $teacher = User::find($teachers_available[$T_selected]);
        $teacher = User::find(session('teacher_id'));

        $scheduleReservation = ScheduleReserve::where('user_id', $student->id)->first();
        if (!empty($scheduleReservation)) {
            $scheduleReservation->delete();
        }

        $schedules_reserves = ScheduleController::schedulesReserves($teacher->id); // Posicion 0 para los horarios normales, Posicion 1 para los horarios de un solo dia.
        $schedule_teacher = $teacher->schedules->first()->selected_schedule;

        foreach ($cells as $cell) {
            if (!in_array($cell, $schedule_teacher)) {
                Cart::destroy();
                session(['message' => "Dear Student. That block is not available in teacher " . $teacher->first_name . " " . $teacher->last_name . " schedule."]);
                return redirect()->route("schedule.create")->with('error', "Sorry, you selected one or more unavailable blocks. Please try again.");
            }

            if (in_array($cell, $schedules_reserves[0]) || (count($cells) == 1 && in_array($cell, $schedules_reserves[1]))) {
                Cart::destroy();

                session(['message' => "Dear Student. That block is not available."]);

                if (in_array($cell, $schedules_reserves[0])) session(['message' => "Dear Student. That block is not available. It is already reserved by another student."]);

                return redirect()->route("schedule.create")->with('error', "Sorry, you selected one or more unavailable blocks. Please try again.");
            }
        }
        Cart::destroy();


        $old_customers = json_decode(
            DB::table('metadata')
                ->where('key', 'old_customers')
                ->first()->value,
        );

        $course_products = Course::find($course_id)
            ->products()
            ->whereHas('categories', function ($query) {
                $query->where('name', 'course');
            })
            ->get();

        $product = $course_products->first();
        foreach ($course_products as $course_product) {
            if (in_array($student->id, $old_customers) && str_contains($course_product->slug, 'old')) {
                $product = $course_product;
                break;
            }

            if (!in_array($student->id, $old_customers) && !str_contains($course_product->slug, 'old')) {
                $product = $course_product;
                break;
            }
        }

        $apportionment = ApportionmentController::calculateApportionment();
        if (session('preselection') == true) $apportionment = ApportionmentController::calculateApportionment(null, null, null, true);
        $product_qty = $apportionment[0];

        // if ($modality == "exam") {
        //     $product_qty = 1;
        //     session(['teacher_id' => $teachers_available[$T_selected]]); //IMPORTANTE!!!!!! AQUI SUSTITUIR EL 7 POR "$T_selected"
        // }

        self::saveScheduleReserve($cells);

        // Cart::add($product->id, $product->name, $product_qty, ($product->sale_price == null ? $product->regular_price : $product->sale_price), ['editable' => false])->associate('App\Models\Product');
        ShopController::addToCart($product->id, $product_qty);
        session([
            'course_id' => $course_id,
            'classes_dates' => $apportionment[1]
        ]);

        if (session()->exists('enrolment_type') && session('enrolment_type') == "manual_enrolment") {
            $student = User::find(session('student_id'));
            dispatch(new StoreSelfEnrolment($student));
            session()->forget('enrolment_type');
            session()->forget('student_id');

            return redirect()->route('enrolments.index');
        } else {
            return redirect()->route('cart');
        }
        // } else {
        //     Cart::destroy();
        //     if ($modality == "exam") {
        //         $message = "Sorry, dear student. There are not teachers available for that date.";
        //     } else {
        //         $message = "Dear Student, that block is not available.";
        //         session()->forget('teacher_id');
        //     }
        // }

        // session(['message' => $message]);
        // return redirect()->route("schedule.create");
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

        if (session()->exists('enrolment_type') && session('enrolment_type') == "manual_enrolment") {
            $student_id = session('student_id');
        } else {
            $student_id = auth()->id();
        }

        $reserve = ScheduleReserve::withTrashed()->updateOrCreate(
            ['user_id' => $student_id],
            ['teacher_id' => $teacher_id, 'selected_schedule' => $schedule_encode, 'type' => $type, 'deleted_at' => null]
            // ['type' => 'exam']
        );
    }
}
