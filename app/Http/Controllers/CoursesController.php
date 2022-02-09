<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Enrolment;
use App\Models\Module;
use App\Models\Unit;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CoursesController extends Controller
{
    
    public function index(){

        $user = User::find(auth()->id());
        $role = Auth::user()->roles->pluck('name')[0];

        if($role != "admin")
        {
            $units = $user->units;
        }else{
            $units = Unit::all();
        }
        
        $modules = [];
        foreach ($units as $unit) {
            array_push($modules, $unit->module_id);
        }

        $courses = [];
        $modules = Module::find($modules);
        foreach ($modules as $module) {
            array_push($courses, $module->id_course);
        }

        $courses = Course::find($courses);

        return view('courses', compact('courses'));
    }

    public function show_course($id_course){

        $user = User::find(auth()->id());
        $role = Auth::user()->roles->pluck('name')[0];
        
        if($role != "admin")
        {
            $units = $user->units;
        }else{
            $units = Unit::all();
        }

        $modules = [];
        if($role != "admin"){
            foreach ($units as $unit) {
                array_push($modules, $unit->module_id);
            }
            $modules = Module::find($modules);
        }else{
            $modules = Module::all();
        }
        
        return view('modules', compact('modules'));
    }

    public function show_module($id_course,$id_module){

        $user_id = auth()->id();
        $user = User::find($user_id);
        $role = Auth::user()->roles->pluck('name')[0];
        $enrolment = Enrolment::where('student_id',$user_id)->orWhere('teacher_id',$user_id)->get();
        $units = Module::find($id_module)->units;
        $units = $units->intersect($user->units);

        if($role != "student" && $role != "guest"){
            $units = Module::find($id_module)->units;
        }

        // dd($units, $role);

        return view('Modules.Units', compact('units'));
    }

}
