<?php

namespace App\Http\Controllers;

use App\Jobs\CreateSchedule;
use App\Models\Course;
use App\Models\Enrolment;
use App\Models\Unit;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EnrolmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $enrolments = Enrolment::paginate(50);

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

        $students = User::whereHas('roles', function ($query) {
            $query->where('name', 'student');
        })->orderBy('first_name')->orderBy('last_name')->get();

        $courses = Course::orderBy('name')->get();

        return view('enrolments.create', compact('teachers', 'courses', 'students'));
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
            'teacher_id' => 'required',
            // 'student_id' => 'required',
            'course_id' => 'required',
        ]);

        $enrolment = new Enrolment([
            'teacher_id' => $request->get('teacher_id'),
            'student_id' => $request->get('student_id'),
            'course_id' => $request->get('course_id'),
        ]);
        $enrolment->save();
        
        if(Course::find($request->get('course_id'))->categories->pluck('name')->contains('Conversational') && ($request->get('student_id') == null) && ($request->get('teacher_id') != null))
        {
            User::find($request->get('teacher_id'))->givePermissionTo('edit conversational courses');
        }

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
        $enrolment->delete();
        return redirect()->route('enrolments.index');
    }
}
