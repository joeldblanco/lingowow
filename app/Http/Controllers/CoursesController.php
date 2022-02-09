<?php

namespace App\Http\Controllers;

use App\Models\course;
use App\Models\module;
use App\Models\unit;
use Illuminate\Http\Request;

class CoursesController extends Controller
{
    
    public function index(){

        $course = course::all();

        return view('courses', compact("course"));
    }

    public function show_modules($id_course){

        $module = module::where("id_course","=",$id_course)->get();
        // return $id_module;
        return view('modules', compact("module"));
    }

    public function show_units($id_course,$id_module){

        $unit = unit::where("id_module","=",$id_module)->get();
        // return $id_module;
        return view('Modules.Units', compact("unit"));
    }

    //
}
