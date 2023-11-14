<?php

namespace App\Http\Controllers;

use App\Jobs\CreateSchedule;
use App\Models\Course;
use App\Models\Enrolment;
use App\Models\Unit;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Invoice;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Item;
use App\Mail\InvoicePaid;
use App\Models\Module;
use App\Models\Preselection;
use App\Models\Product;
use App\Models\Schedule;
use App\Models\ScheduleReserve;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;

class EnrolmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $enrolments = Enrolment::orderBy('updated_at', 'desc')->paginate(10);

        return view('enrolments.index', compact('enrolments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $teachers = User::whereHas('roles', function ($query) {
            $query->where('name', 'teacher');
        })->orderBy('first_name')->orderBy('last_name')->get();

        $users = User::role(['guest', 'student'])->orderBy('first_name')->orderBy('last_name')->get();

        $courses = Course::orderBy('name')->get();

        return view('enrolments.create', compact('teachers', 'courses', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function isScheduleNeeded(Request $request)
    {
        // dump($request);
        $request->validate([
            'course_id' => 'required|numeric|exists:App\Models\Course,id',
        ]);

        $course = Course::find($request->course_id);
        $action = 'manualEnrolment';
        $data = ['manualEnrolment' =>  true];

        if ($course->categories->pluck('name')->contains("Test")) {
            $action = 'examSelection';

            $selected_teacher = $request->teacher_id;
            $student_id = $request->student_id;
            $plan = $request->plan;

            session([
                'enrolment_type' => 'manual_enrolment',
                'selected_course' => $request->course_id,
                'selected_teacher' => $request->teacher_id,
                'student_id' => $request->student_id,
            ]);

            return view('enrolments.schedule-selection', compact('student_id', 'selected_teacher', 'plan', 'action', 'data'));
        } else {
            if ($course->categories->pluck('name')->contains("Synchronous")) {

                $request->validate([
                    'teacher_id' => 'required|numeric|exists:App\Models\User,id',
                    'student_id' => 'numeric|exists:App\Models\User,id',
                    'plan' => 'numeric',
                ]);

                session()->forget([
                    'enrolment_type',
                    'selected_course',
                    'selected_teacher',
                    'student_id',
                ]);

                //GETTING IF STUDENT IS ALREADY ENROLLED//
                $enrolment = Enrolment::where('student_id', $request->student_id)
                    ->where('course_id', $request->course_id)
                    ->first();

                //IF STUDENT IS ALREADY ENROLLED BUT PREENROLMENT IS AVAILABLE CREATE STUDENT'S PREENROLMENT//
                if ($enrolment && EnrolmentController::isPreenrolmentAvailable($enrolment)) {
                    $action = 'schedulePreselection';
                }

                //IF STUDENT IS ALREADY ENROLLED BUT PREENROLMENT IS NOT AVAILABLE REDIRECT BACK//
                if ($enrolment && !EnrolmentController::isPreenrolmentAvailable($enrolment)) {
                    return redirect()->back()->with('error', 'Student is already preenroled in this course.');
                }

                //IF STUDENT IS ALREADY ENROLLED BUT PREENROLMENT IS AVAILABLE CREATE STUDENT'S PREENROLMENT//
                if (empty($enrolment)) {
                    $action = 'scheduleSelection';
                }

                if ($request->student_id == null) {
                    EnrolmentController::store($request);
                    return redirect()->route('enrolments.index');
                } else {
                    $selected_teacher = $request->teacher_id;
                    $student_id = $request->student_id;
                    $plan = $request->plan;

                    session([
                        'enrolment_type' => 'manual_enrolment',
                        'selected_course' => $request->course_id,
                        'selected_teacher' => $request->teacher_id,
                        'student_id' => $request->student_id,
                    ]);

                    return view('enrolments.schedule-selection', compact('student_id', 'selected_teacher', 'plan', 'action', 'data'));
                }
            }

            if ($course->categories->pluck('name')->contains("Asynchronous")) {
                $request->validate([
                    'student_id' => 'required|numeric|exists:App\Models\User,id',
                ]);

                GatherController::editGuestsList([$request->student_id]);
                $this->store($request);

                return redirect()->route('enrolments.index');
            }
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);

        if (empty($request->get('student_id')) && !empty($request->get('teacher_id'))) {
            Enrolment::withTrashed()->updateOrCreate(
                ['student_id' => NULL, 'teacher_id' => $request->get('teacher_id'), 'course_id' => $request->get('course_id')],
                ['deleted_at' => NULL]
            );
        }

        if (empty($request->get('teacher_id')) && !empty($request->get('student_id'))) {
            Enrolment::withTrashed()->updateOrCreate(
                ['student_id' => $request->get('student_id'), 'course_id' => $request->get('course_id')],
                ['deleted_at' => NULL]
            );
        }

        // dd((empty($request->get('student_id')) && !empty($request->get('teacher_id'))), (empty($request->get('teacher_id')) && !empty($request->get('student_id'))));

        if (Course::find($request->get('course_id'))->categories->pluck('name')->contains('Conversational') && empty($request->get('student_id')) && !empty($request->get('teacher_id'))) {
            User::find($request->get('teacher_id'))->givePermissionTo('edit conversational courses');
        }

        if (!empty($request->get('student_id')) && !empty($request->get('teacher_id'))) {
            User::find($request->get('student_id'))->givePermissionTo('view units');
        }

        GatherController::setGuestsList();

        return redirect()->route('enrolments.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Enrolment  $enrolment
     * @return \Illuminate\Http\Response
     */
    public function show(Enrolment $enrolment)
    {
        return $enrolment;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Enrolment  $enrolment
     * @return \Illuminate\Http\Response
     */
    public function edit(Enrolment $enrolment)
    {
        $teachers = User::whereHas('roles', function ($query) {
            $query->where('name', 'teacher');
        })->orderBy('first_name')->orderBy('last_name')->get();

        $students = User::whereHas('roles', function ($query) {
            $query->where('name', 'student');
        })->orderBy('first_name')->orderBy('last_name')->get();

        $courses = Course::orderBy('name')->get();

        return view('enrolments.edit', compact('enrolment', 'teachers', 'students', 'courses'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Enrolment  $enrolment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Enrolment $enrolment)
    {
        // $user_units = User::find($request->user_id)->units;
        // foreach ($user_units as $unit) {
        //     if ($unit->module->course->id == $request->course_id) {
        //         DB::table('unit_user')->upsert(
        //             ['user_id' => $request->user_id, 'unit_id' => $request->unit_id],
        //             ['user_id'],
        //             ['unit_id']
        //         );
        //     }
        // }
        $enrolment->teacher_id = $request->get('teacher_id');
        $enrolment->student_id = $request->get('student_id');
        $enrolment->course_id = $request->get('course_id');
        (new UsersController)->addUnit($request->get('student_id'), $request->get('unit_id'));
        $enrolment->save();
        return redirect()->route('enrolments.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Enrolment  $enrolment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Enrolment $enrolment)
    {
        $student = User::find($enrolment->student_id);

        if (!empty($enrolment)) {
            $enrolment->classes->each(function ($class) {
                if ($class->meeting != null) (new MeetingController)->destroy($class->meeting);
                $class->delete();
            });
            if (!empty($enrolment->schedule)) $enrolment->schedule->delete();
            $enrolment->delete();
        }

        if (!empty($student)) {
            $student->removeRole('student');
            $student->assignRole('guest');
        }

        return redirect()->route('enrolments.index');
    }

    public static function storeSelfEnrolment($student_id, $course_id, $teacher_id = null)
    {
        //GETTING STUDENT AND COURSE//
        $student = User::find($student_id);
        $course = Course::find($course_id);

        //CHANGING STUDENT'S ROLE FROM 'GUEST' TO 'STUDENT'//
        $student->removeRole('guest');
        $student->assignRole('student');

        if ($course->categories()->pluck('name')->contains('Synchronous')) {

            $teacher = User::find(session('teacher_id'));

            $enrolment = Enrolment::where('student_id', $student->id)
                ->where('course_id', $course_id)
                ->withTrashed()
                ->first();

            if (!empty($enrolment)) {
                $deleted = $enrolment->trashed();
            }

            if ($enrolment && !$deleted) {
                $current_period = json_decode(DB::table('metadata')->where('key', '=', 'current_period')->first()->value);
                $now = Carbon::now();
                $current_period_end = new Carbon($current_period->end_date);

                if (session('preselection') == true) {
                    $preselection = Preselection::withTrashed()->updateOrCreate(
                        ['enrolment_id' => $enrolment->id],
                        ['teacher_id' => $teacher->id, 'schedule' => json_decode(session('user_schedule')), 'deleted_at' => NULL]
                    );
                    session()->forget('preselection');

                    $scheduleReservation = ScheduleReserve::where('user_id', $enrolment->student->id)->first();
                    if (!empty($scheduleReservation)) {
                        $scheduleReservation->delete();
                    }

                    return redirect()->route('invoices.show', $invoice->id);
                } else {
                    dd("User has an active enrolment in this course.");
                }
            } else {

                //CREATING STUDENT'S ENROLMENT//
                $enrolment = Enrolment::create([
                    'student_id' => $student->id,
                    'course_id' => $course_id,
                    'teacher_id' => $teacher->id
                ]);
            }

            GatherController::editGuestsList([$student->id, $teacher->id]);
        } else {

            //CREATING STUDENT'S ENROLMENT (OR UPDATING IT, IN CASE IT ALREADY EXISTS BUT IS SOFTDELETED)//
            $enrolment = Enrolment::withTrashed()->updateOrCreate(
                ['student_id' => $student->id, 'course_id' => $course_id],
                ['teacher_id' => NULL, 'deleted_at' => NULL]
            );
            GatherController::editGuestsList([$student->id]);
        }

        if ($student->id != null) {

            User::find($student->id)->givePermissionTo('view units');
            $course = Course::find($course_id);

            if ($course->categories->pluck('name')->contains('Conversational')) {
                $modules_ids = DB::table('module_user')->select('module_id')->where('user_id', $student->id)->get();
                $modules = Module::find($modules_ids->pluck('module_id')->toArray());
                $module = $modules->where('course_id', $course->id)->first();
                if (empty($module)) {
                    $order = $course->modules->sortBy('order')->last() == null ? 1 : $course->modules->sortBy('order')->last()->order + 1;
                    $module = Module::create([
                        'name' => $student->first_name . ' ' . $student->last_name . ' - Lesson Room',
                        'course_id' => $course_id,
                        'description' => 'Welcome to your Conversational Course. 

                        Most of the content set here is based on the information sent by our students. 
                        
                        On this course, you will practice and improve the language you know. 
                        
                        Enjoy the journey.',
                        'status' => 1,
                        'order' => $order,
                    ]);

                    DB::table('module_user')->insertOrIgnore([
                        ['module_id' => $module->id, 'user_id' => $student->id],
                        ['module_id' => $module->id, 'user_id' => session('teacher_id')]
                    ]);
                } else {
                    $module = Module::find($module->id);
                    if ($module->course_id)
                        DB::table('module_user')->insertOrIgnore([
                            ['module_id' => $module->id, 'user_id' => $student->id],
                            ['module_id' => $module->id, 'user_id' => session('teacher_id')]
                        ]);
                }
            } else {
                $unit = $course->units()->sortBy('order')->pluck('exams')->reject(function ($innerCollection) {
                    return $innerCollection->isEmpty();
                })->flatten()->first();

                if (empty($unit)) {
                    $unit_id = $course->units()->sortBy('order')->first()->id;
                } else {
                    $unit_id = $unit->unit_id;
                }

                $current_unit = DB::table('unit_user')->select('unit_id')->where('user_id', $student->id)->first();

                if (empty($current_unit)) {
                    DB::table('unit_user')->insertOrIgnore([
                        ['unit_id' => $unit_id, 'user_id' => $student->id]
                    ]);
                }
            }
        }

        return $enrolment->id;
    }

    public static function calculateApportionment($plan = null, $schedule = null, $course_id = null, $preselection = null, $teacher_id = null)
    {
        if (empty(session('student_id'))) {
            $user = auth()->user();
        } else {
            $user = User::find(session('student_id'));
        }

        if ($teacher_id == null) {
            $teacher_id = session('teacher_id');
        }

        if ($schedule == null) {
            $schedule = session("user_schedule");
        }

        $schedule = json_decode($schedule);

        if ($course_id == null) {
            $course_id = session("selected_course");
        }

        $nowUTC = Carbon::now()->setTimezone('UTC');

        $current_period = ApportionmentController::currentPeriod();
        $next_period = ApportionmentController::nextPeriod();

        $current_period_start = new Carbon($current_period[0]);
        $current_period_end = new Carbon($current_period[1]);

        $next_period_start = new Carbon($next_period[0]);
        $next_period_end = new Carbon($next_period[1]);

        if (empty($preselection)) {
            $qty = 0;
            $days = [];
            foreach ($schedule as $key => $value) {
                $day = $value[1];
                $time = $value[0];

                $nowUTC->hour = $time;

                $qty += $nowUTC->diffInDaysFiltered(function (Carbon $date) use (&$day, &$time, &$days, &$current_period_start) {
                    if ($date->isDayOfWeek($day) && $date->greaterThanOrEqualTo($current_period_start) && $date->greaterThanOrEqualTo(now()->copy()->addHours(12))) {
                        $date->hour = $time;
                        $date->minute = 0;
                        $date->second = 0;
                        array_push($days, $date->toDateTimeString());
                    }

                    return $date->isDayOfWeek($day);
                }, $current_period_end->copy()->addDay()); //It's necessary to add a day '->addDay()' to the end date to include the last day of the period
            }

            if ($qty <= 0) {
                $qty = 0;
                $days = [];
                foreach ($schedule as $key => $value) {
                    $day = $value[1];
                    $time = $value[0];

                    $qty += $next_period_start->diffInDaysFiltered(function (Carbon $date) use (&$day, &$time, &$days) {

                        if ($date->isDayOfWeek($day)) {
                            $date->hour = $time;
                            $date->minute = 0;
                            $date->second = 0;
                            array_push($days, $date->toDateTimeString());
                        }
                        return $date->isDayOfWeek($day);
                    }, $next_period_end->copy()->addDay()); //It's necessary to add a day '->addDay()' to the end date to include the last day of the period
                }
            }

            $absence = User::find($teacher_id)->teacherClasses()->where('status', 1)->whereBetween('start_date', [$nowUTC->toDateTimeString(), ApportionmentController::currentPeriod()[1]])->orderBy('start_date', 'asc')->get()->pluck('start_date');

            if ($absence != null) {
                foreach ($absence as $key => $start_date) {
                    $absence[$key] = $start_date;
                }
                $absence = json_decode($absence);
            } else {
                $absence = [];
            }

            $days_diff = array_diff($days, $absence);
            $days_diff = array_values($days_diff);

            $qty_diff = sizeof($days_diff);
        }

        if (!empty($preselection)) {

            $qty = 0;
            $days = [];
            $absence = [];
            foreach ($schedule as $key => $value) {
                $day = $value[1];
                $time = $value[0];

                $qty += $next_period_start->diffInDaysFiltered(function (Carbon $date) use (&$day, &$time, &$days) {

                    if ($date->isDayOfWeek($day)) {
                        $date->hour = $time;
                        $date->minute = 0;
                        $date->second = 0;
                        array_push($days, $date->toDateTimeString());
                    }
                    return $date->isDayOfWeek($day);
                }, $next_period_end->copy()->addDay()); //It's necessary to add a day '->addDay()' to the end date to include the last day of the period
            }

            $days_diff = array_diff($days, $absence);
            $days_diff = array_values($days_diff);

            $qty_diff = sizeof($days_diff);
        }

        // dd($days);

        return [$qty_diff, $days_diff, $days, $absence];
    }

    public static function isPreselection()
    {
        return false;

        return true;
    }

    public static function isBookable()
    {
    }

    public static function enrolStudent($studentId, $courseId, $teacherId = null)
    {
        //GETTING STUDENT AND COURSE//
        $student = User::find($studentId);
        $course = Course::find($courseId);

        //CHANGING STUDENT'S ROLE FROM 'GUEST' TO 'STUDENT'//
        $student->removeRole('guest');
        $student->assignRole('student');


        //CREATING STUDENT'S ENROLMENT//
        $enrolment = Enrolment::create([
            'student_id' => $studentId,
            'course_id' => $courseId,
            'teacher_id' => $teacherId
        ]);

        //GIVING STUDENT ACCESS TO GATHER//
        GatherController::editGuestsList([$studentId, $teacherId]);

        //GIVE STUDENT PERMISSION TO VIEW UNITS//
        $student->givePermissionTo('view units');

        //CHECK IF COURSE IS CONVERSATIONAL COURSE//
        if ($course->categories->pluck('name')->contains('Conversational')) {

            // GETTING STUDENT'S MODULES
            $moduleIds = DB::table('module_user')->where('user_id', $student->id)->pluck('module_id')->toArray();
            $modules = Module::whereIn('id', $moduleIds)->get();

            // GETTING STUDENT'S MODULES IN THE CONVERSATIONAL COURSE
            $module = $modules->where('course_id', $course->id)->first();

            //IF STUDENT DOESN'T HAVE MODULES IN THE CONVERSATIONAL COURSE, CREATE THEM//
            if (empty($module)) {

                // GETTING THE LAST MODULE'S ORDER
                $order = $course->modules->max('order') + 1;

                // CREATING THE MODULE
                $module = Module::create([
                    'name' => "{$student->first_name} {$student->last_name} - Lesson Room",
                    'course_id' => $course->id,
                    'description' => 'Welcome to your Conversational Course. 
                
                        Most of the content set here is based on the information sent by our students. 
            
                        On this course, you will practice and improve the language you know. 
            
                        Enjoy the journey.',
                    'status' => 1,
                    'order' => $order,
                ]);

                // ASSOCIATING MODULE AND USER IN DATABASE
                DB::table('module_user')->insertOrIgnore([
                    ['module_id' => $module->id, 'user_id' => $student->id],
                    ['module_id' => $module->id, 'user_id' => session('teacher_id')]
                ]);
            } else {

                //IF STUDENT ALREADY HAS MODULES IN THE CONVERSATIONAL COURSE, ASSIGN THEM//
                $module = Module::find($module->id);

                if ($module->course_id)
                    DB::table('module_user')->insertOrIgnore([
                        ['module_id' => $module->id, 'user_id' => $student->id],
                        ['module_id' => $module->id, 'user_id' => session('teacher_id')]
                    ]);
            }
        } else {

            //GETTING STUDENT'S UNITS IN THE COURSE//
            $unit = $course->units()->sortBy('order')->pluck('exams')->reject(function ($innerCollection) {
                return $innerCollection->isEmpty();
            })->flatten()->first();

            //IF STUDENT HAS UNITS IN THE COURSE ASSIGN THEM, IF NOT ASSIGN THEM THE FISRST UNIT OF THE COURSE//
            if (empty($unit)) {
                $unit_id = $course->units()->sortBy('order')->first();
                if (!empty($unit_id)) $unit_id = $unit_id->id;
            } else {
                $unit_id = $unit->unit_id;
            }

            //CHECK IF RELATION STUDENT-UNIT EXISTS IN DATABASE//
            $current_unit = DB::table('unit_user')
                ->where('user_id', $student->id)
                ->value('unit_id');

            //IF RELATION DOESN'T EXIST, CREATE IT//
            if (empty($current_unit)) {
                DB::table('unit_user')->insertOrIgnore([
                    ['unit_id' => $unit_id, 'user_id' => $student->id]
                ]);
            }
        }

        return $enrolment->id;
    }

    public static function preEnrolStudent($studentId, $courseId)
    {
        //GETTING IF STUDENT IS ALREADY ENROLLED//
        $enrolment = Enrolment::where('student_id', $studentId)
            ->where('course_id', $courseId)
            ->first();

        //IF STUDENT IS ALREADY ENROLLED AND PREENROLMENT IS AVAILABLE CREATE STUDENT'S PREENROLMENT//
        if ($enrolment && EnrolmentController::isPreenrolmentAvailable($enrolment)) {

            Preselection::withTrashed()->updateOrCreate(
                ['enrolment_id' => $enrolment->id],
                ['teacher_id' => $enrolment->teacher->id, 'schedule' => json_decode(session('user_schedule')), 'deleted_at' => NULL]
            );

            $invoice_id = ShopController::createInvoice($enrolment->student);
            $invoice = Invoice::find($invoice_id);
            $invoice->payment_method = session('paymentMethod');
            $invoice->paid = 1;
            $invoice->save();

            Cart::destroy();
            session()->forget('paymentMethod');

            return $invoice->id;
        }

        return false;
    }

    public static function isPreenrolmentAvailable($enrolment = null)
    {
        $current_period = DB::table('metadata')->where('key', 'current_period')->value('value');

        $current_period_end = Carbon::parse(json_decode($current_period)->end_date);

        if (Carbon::now()->greaterThan($current_period_end->copy()->subDays(7))) {

            if (!empty($enrolment)) {
                $preselection = Preselection::where('enrolment_id', $enrolment->id)->first();

                if ($preselection) return false;
            }

            return true;
        }

        return false;
    }

    public static function createSchedule($enrolmentId, $userSchedule)
    {
        //GETTING ENROLMENT//
        $enrolment = Enrolment::find($enrolmentId);

        // UPDATING OR CREATING A SCHEDULE ON THE DATABASE FOR THE GIVEN USER AND ENROLMENT
        // $schedule = Schedule::withTrashed()->updateOrCreate(
        //     ['user_id' => $enrolment->student_id, 'enrolment_id' => $enrolmentId],
        //     ['selected_schedule' => $userSchedule, 'deleted_at' => NULL]
        // );

        $schedule = Schedule::create([
            'user_id' => $enrolment->student_id,
            'enrolment_id' => $enrolmentId,
            'selected_schedule' => $userSchedule
        ]);

        if (!$enrolment->course->categories->pluck('name')->contains('Test')) {
            $classDates = EnrolmentController::calculateApportionment(schedule: json_encode($userSchedule));
            return $classDates[1];
        }

        return true;
    }
}
