<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Module;
use App\Models\User;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $user = User::find(auth()->id());
        $role = $user->roles->first()->name;

        if($role == "admin"){
            $courses = Course::all();
            $courses = $courses->unique();
        }else{
            $courses = [];
            $user->units->each(function ($unit, $key) use (&$courses){
                $courses[] = $unit->module->course;
            });
            $courses = array_unique($courses);
        }
        
        return view('course.index', compact('courses'));
    }

    // public function show_module($id_course, $id_module){

    //     $user_id = auth()->id();
    //     $user = User::find($user_id);
    //     $role = Auth::user()->roles->pluck('name')[0];
    //     $enrolment = Enrolment::where('student_id',$user_id)->orWhere('teacher_id',$user_id)->get();
    //     $units = Module::find($id_module)->units;
    //     $units = $units->intersect($user->units);
    //     // dd($user->units);

    //     if($role != "student" && $role != "guest"){
    //         $units = Module::find($id_module)->units;
    //     }

    //     // dd($units, $role);

    //     return view('Modules.Units', compact('units'));
    // }




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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find(auth()->id());
        $role = $user->roles->first()->name;
        $course = Course::find($id);
        $modules = $course->modules->where('status',1);
        
        if($role == "admin"){
            $user_modules = $course->modules;
        }else{
            $user_modules = [];
            $user->units->each(function ($unit, $key) use (&$user_modules){
                $user_modules[] = $unit->module;
            });
            $user_modules = array_unique($user_modules);
        }

        // dd($modules, $user_modules, $modules->intersect($user_modules));

        $modules = $modules->diff($user_modules);
        
        return view('course.show', compact('user_modules','modules'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        //
    }
}
