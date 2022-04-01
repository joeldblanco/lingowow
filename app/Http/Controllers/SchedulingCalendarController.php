<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\Course;
use App\Models\Enrolment;
use App\Models\Schedule;
use Illuminate\Http\Request;
use App\Models\User;
use App\Notifications\BookedClass;
use App\Notifications\ClassCanceledToStudent;
use App\Notifications\ClassCanceledToTeacher;
// use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;
use App\Notifications\ClassRescheduledToTeacher;
use App\Notifications\ClassRescheduledToStudent;
use Carbon\Carbon;
use Cart;

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
    public static function store()
    {    
        //VARIABLE INITIALIZATION//
        $student_id = auth()->id();
        $student = User::find($student_id);
        $teacher_id = session('selected_teacher');
        $teacher = User::find($teacher_id);
        $course_id = session('course_id');
        $student_schedule = json_decode(session('user_schedule'));
        $classes_dates = session('classes_dates');
        $teacher_students = Enrolment::where('teacher_id',$teacher_id)->select('student_id')->get();
        

        //CREATING STUDENT'S ENROLMENT (OR UPDATING IT, IN CASE IT ALREADY EXISTS BUT IS SOFTDELETED)//
        $enrolment = Enrolment::withTrashed()->updateOrCreate(
            ['student_id' => $student_id, 'course_id' => $course_id],
            ['teacher_id' => $teacher_id, 'deleted_at' => NULL]
        );

        //CREATING STUDENT'S SCHEDULE (OR UPDATING IT, IN CASE IT ALREADY EXISTS BUT IS SOFTDELETED)//
        $student_schedule = json_encode($student_schedule);
        Schedule::withTrashed()->updateOrCreate(
            ['user_id' => $student_id,'enrolment_id' => $enrolment->id],
            ['selected_schedule' => $student_schedule, 'deleted_at' => NULL]
        );


        //ADDING CLASS DURATION (40 MIN) TO CLASS START DATETIME AND STORING IT IN ANOTHER VARIABLE (TO CREATE CLASS END DATETIME)//
        foreach ($classes_dates as $key => $value) {
            $classes_dates[$key] = [];

            $classes_dates[$key][0] = new Carbon($value);
            $classes_dates[$key][0] = $classes_dates[$key][0]->toDateTimeString();

            $classes_dates[$key][1] = new Carbon($value);
            $classes_dates[$key][1] = $classes_dates[$key][1]->addMinutes(40);
            $classes_dates[$key][1] = $classes_dates[$key][1]->toDateTimeString();
        }


        //CREATING CLASSES (CLASS BOOKING)//
        foreach ($classes_dates as $date) {
            Classes::create([
                'start_date' => $date[0],
                'end_date' => $date[1],
                'enrolment_id' => $enrolment->id,
            ]);
        }
            

        //STORING ALL TEACHER'S STUDENTS' SCHEDULES IN ONE ARRAY//
        foreach ($teacher_students as $tskey => $tsvalue) {
            $teacher_students_schedule[$tskey] = Schedule::where('user_id',$tsvalue->student_id)->select('selected_schedule')->first();
            $teacher_students_schedule[$tskey] = $teacher_students_schedule[$tskey]->selected_schedule;
            $teacher_students_schedule = json_decode($teacher_students_schedule[$tskey]);
        }


        //SENDING NOTIFICATION TO TEACHER//
        Notification::sendNow($teacher, new BookedClass($student->id));
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
        if($request->error == "false")
        {
            $request->data = explode(',', $request->data);
            $requested_schedule = array_chunk($request->data,2);

            $user_role = Auth::user()->roles->pluck('name')[0];
            $user_id = auth()->id();

            $user_schedule = Schedule::select('selected_schedule')->where('user_id',$user_id)->get();
            $user_schedule = json_decode($user_schedule[0]->selected_schedule);

            if($user_role == "student"){

                $enrolment = Enrolment::where('student_id',$user_id)->get();
                dd($enrolment);
                $teacher_id = $enrolment->teacher_id;
                $teacher_id = $teacher_id[0]->teacher_id;

                $teacher_students = Enrolment::select('student_id')->where('teacher_id',$teacher_id)->get();
                foreach ($teacher_students as $key => $value) {
                    $teacher_students[$key] = $value->student_id;
                }

                $teacher_students_schedule = Schedule::select('selected_schedule')->whereIn('user_id',$teacher_students)->get();
                foreach ($teacher_students_schedule as $key => $value) {
                    $teacher_students_schedule[$key] = json_decode($value->selected_schedule);
                }
                $teacher_students_schedule = array_merge(...$teacher_students_schedule);

                foreach ($user_schedule as $t_schedule) {
                    \array_splice($teacher_students_schedule, array_search($t_schedule,$teacher_students_schedule), 1);
                }
                
                $teacher_selected_schedule = Schedule::select('selected_schedule')->where('user_id',$teacher_id)->get();
                $teacher_selected_schedule = json_decode($teacher_selected_schedule[0]->selected_schedule);
                $teacher_available_schedule = $teacher_selected_schedule;
                foreach ($teacher_students_schedule as $t_schedule) {
                    \array_splice($teacher_available_schedule, array_search($t_schedule,$teacher_available_schedule), 1);
                }

                $count = 0;
                foreach($requested_schedule as $u_schedule){
                    if(in_array($u_schedule,$teacher_selected_schedule)){
                        if(in_array($u_schedule,$teacher_available_schedule)){
                            $count++;
                        }else if(in_array($u_schedule,$user_schedule)){
                            unset($user_schedule[array_search($u_schedule, $user_schedule)]);
                            $count++;
                        }
                    }
                }

                if($count == count($requested_schedule)){

                    foreach($teacher_available_schedule as $t_schedule){
                        foreach($requested_schedule as $r_schedule){
                            if($r_schedule == $t_schedule){
                                \array_splice($teacher_available_schedule, array_search($t_schedule,$teacher_available_schedule), 1);
                            }
                        }
                    }

                    foreach($teacher_selected_schedule as $t_s_schedule){
                        foreach($user_schedule as $u_schedule){
                            if($t_s_schedule == $u_schedule){
                                array_push($teacher_available_schedule,$t_s_schedule);
                            }
                        }
                    }

                    // $requested_schedule = json_encode($requested_schedule);
                    // Schedule::where('user_id',$user_id)
                    // ->update(['selected_schedule' => $requested_schedule]);

                    Schedule::withTrashed()->updateOrCreate(
                        ['user_id' => $user_id, 'enrolment_id' => $enrolment->id],
                        ['selected_schedule' => json_encode($requested_schedule), 'deleted_at' => NULL]
                    );

                    // $teacher_available_schedule = json_encode($teacher_available_schedule);
                    // User::where('id',$teacher_id)
                    // ->update(['available_schedule' => $teacher_available_schedule]);

                    $message = "Request accepted";

                    $student = User::find($user_id);
                    $teacher = User::find($teacher_id);
                    Notification::sendNow($teacher, new ClassRescheduledToTeacher($student));
                    Notification::sendNow($student, new ClassRescheduledToStudent);

                }else{
                    $message = "Request rejected. Those blocks are not available.";
                }

            }else if($user_role == "teacher"){
                
                $students_schedules = [];
                $affected_students = [];
                $students_enrolments = Enrolment::where('teacher_id',$user_id)->get();
                
                foreach($students_enrolments as $student_enrolment){
                    $student_schedule = Schedule::select('selected_schedule')->where('enrolment_id',$student_enrolment->id)->first();
                    $student_schedule = json_decode($student_schedule->selected_schedule);
                    array_push($students_schedules,$student_schedule);
                }

                foreach($students_schedules as $key => $student_block){

                    // dd($requested_schedule, $students_schedules);

                    // if($student_block != null){
                        // foreach($value as $index => $student_block){
                            // dd($students_schedules, $key, $student_block, $students_enrolments[$key]->student_id);

                            if(in_array($student_block,$requested_schedule) && !in_array($students_enrolments[$key]->student_id,$affected_students)){
                                array_push($affected_students,$students_enrolments[$key]->student_id);
                            }
                        // }
                    // }
                }

                Schedule::withTrashed()->updateOrCreate(
                    ['user_id' => $user_id],
                    ['selected_schedule' => json_encode($requested_schedule), 'deleted_at' => NULL]
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

                if(count($affected_students) > 0){
                    session(['affected_students' => $affected_students]);
                    $message .= "However, the blocks taken by the following students will remain intact until the end of the current academic period: ";
                }
            }
        }else{
            $message = "Request rejected";
            switch($request->error)
            {
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
    public function destroy($student_id,$course_id)
    {
        $user_enrolment = Enrolment::where('student_id',$student_id)->where('course_id',$course_id)->first();

        if($user_enrolment){

            $student = User::find($student_id);
            $teacher = User::find($user_enrolment->teacher_id);
            $student_schedule = $user_enrolment->schedule;
            $to_delete_schedule = $student_schedule;

            $student_schedule->delete();
            $user_enrolment->delete();

            Notification::sendNow($teacher, new ClassCanceledToTeacher($student,$to_delete_schedule));
            Notification::sendNow($student, new ClassCanceledToStudent($course_id));

        }else{
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
        $request->data = explode(',', $request->data);
        $cells = array_chunk($request->data,2);

        session(['user_schedule' => json_encode($cells)]);

        // $teachers = User::join('model_has_roles',function($join){
        //                 $join->on('users.id','=','model_has_roles.model_id')
        //                      ->where('model_has_roles.role_id','=','3');
        //             })
        //             ->get();

        // $available_teachers = [];

        // $teachers_available_schedule = [];
        // $teachers_students_schedule = [];
        // foreach ($teachers as $key => $value) {

        //     $teachers_available_schedule[$key] = Schedule::where('user_id',$value->id)->select('selected_schedule')->get();
            
        //     $teachers_students = Enrolment::where('teacher_id',$value->id)->select('student_id')->get();

        //     foreach ($teachers_students as $tskey => $tsvalue) {

        //         $teachers_students_schedule[$tskey] = Schedule::where('user_id',$tsvalue->student_id)->select('selected_schedule')->get();

        //         $teachers_students_schedule[$tskey] = $teachers_students_schedule[$tskey][0]->selected_schedule;
            
        //         $teachers_students_schedule = json_decode($teachers_students_schedule[$tskey]);
        //     }

        //     $teachers_available_schedule[$key] = json_decode($teachers_available_schedule[$key][0]->selected_schedule);

        //     foreach ($teachers_students_schedule as $s_schedule) {
        //         if($teachers_available_schedule[$key] != null)
        //             array_splice($teachers_available_schedule[$key], array_search($s_schedule,$teachers_available_schedule[$key]), 1);
        //     }
            
        // }

        // foreach($teachers_available_schedule as $key => $value){

        //     $matched_blocks = 0;

        //     if($value != null){
        //         foreach($cells as $cell){
        //             // dd($teacher_schedule);
        //             if(in_array($cell,$value)){
        //                 $matched_blocks++;
        //             }
        //         }
        //     }

        //     if($matched_blocks == count($cells)){
        //         array_push($available_teachers,$teachers[$key]);
        //     }
        // }

        // session(['available_teachers' => $available_teachers]);

        Cart::destroy();
        $course_id = session('selected_course');
        // $teacher_id = session('teacher_id');

        $product = Course::find($course_id)->products->first();

        $apportionment = ApportionmentController::calculateApportionment(session('plan'));
        $product_qty = $apportionment[0];

        Cart::add($product->id, $product->name, $product_qty, ($product->sale_price == null ? $product->regular_price : $product->sale_price))->associate('App\Models\Product');
        session([
            'course_id' => $course_id,
            'classes_dates' => $apportionment[1]
        ]);

        return view('cart');
    }
}