<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Module;
use App\Models\User;
use App\Models\GroupUnit;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::find(auth()->id());
        $role = $user->roles->first()->name;

        if ($role == "admin") {
            $courses = Course::all();
            $courses = $courses->unique();
        } else {
            $courses = [];
            
            if ($role == "teacher") {
                $user->enrolments_teacher->each(function ($enrolment, $key) use (&$courses) {
                    $courses[] = $enrolment->course;
                });
            } else {
                $user->enrolments->each(function ($enrolment, $key) use (&$courses) {
                    $courses[] = $enrolment->course;
                });
            }
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

        $modules = $course->modules->where('status', 1); //
        $module_priority = [];

        $group_first = GroupUnit::where('priority', 'FIRST')->first();
        $module_first = $group_first->module;
        // dd($module_first->id);
        $module_priority = (new CourseController)->module_priority($modules, $module_priority, $module_first->id);

        // dd($module_priority);
        $module_first = collect([$module_first]);



        if ($role == "admin") {
            $user_modules = $course->modules;
        } else {
            /*VERSION ANTERIOR*/
            $user_modules = [];
            $user->units->each(function ($unit, $key) use (&$user_modules) {
                $user_modules[] = $unit->group->module;
            });
            $user_modules = array_unique($user_modules);
            // dd($user_modules);
            /*VERSION NUEVA*/
        }

        // dd($modules, $user_modules, $modules->intersect($user_modules));

        // $modules = $modules->diff($module_first);
        $modules = $module_priority;

        // dd($group_first,$module_first,$modules);
        return view('course.show', compact('user', 'role', 'module_first', 'modules'));
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

    //REVIEW: MODIFICAR MODULO DE LA FUNCION

    static function module_passed($module, $user_id)
    {
        $group = $module->groups->first();
        // dump($group);
        if ($group == null) return false;

        $passed = (new CourseController)->is_passed($group->isPassed($user_id, $group->id)->first(), $group->id);

        return $passed;
    }

    public function is_passed($nota, $id)
    {

        if ($nota != null) {

            if (GroupUnit::find($id)->priority == 'FIRST') {
                return true;
            } else {
                $nota = $nota->pivot->nota;
                if ($nota >= 10) {
                    return true;
                } else {
                    return false;
                }
            }
        } else {
            if (GroupUnit::find($id)->priority == 'FIRST') {
                return true;
            } else {
                return false;
            }
        }
    }

    public function module_priority($modules,$module_priority,$module_id){
        
        // $modules[] = Module::where('priority', $module_id);
        $id = $module_id;
        foreach ($modules as $key => $value) {
            
            
            
            foreach ($modules as $key2 => $value2) {
                if($value2->priority == $id){
                    $module_priority[] = $value2;
                    $id = $value2->id;
                    break;
                }
            }
        }  
        return $module_priority; 
    }

}
