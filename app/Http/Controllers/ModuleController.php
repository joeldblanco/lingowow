<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Module;
use App\Models\User;
use App\Models\Group_unit;
use Illuminate\Http\Request;

class ModuleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $courses = Course::all();
        // return view('course.module.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $courses = Course::all();
        return view('course.module.create', compact('courses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $order = Module::where('course_id',$request->course_id)->latest()->first()->order + 1;
        $module = Module::create([
            "course_id" => $request->course_id,
            "module_name" => $request->module_name,
            "module_description" => $request->module_description,
            "status" => $request->status,
            "order" => $order
        ]);

        return redirect()->route('courses.show', $module->course_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Module $module)
    {
        $user = User::find(auth()->id());
        $role = $user->roles->first()->name;
        $units_module  = $module->units;
        //dd($units_module);

        // $units_module = [];
        // $module->groups->each(function($group, $key) use (&$units_module){
        //     $group->units->each(function($unit, $key2) use (&$units_module){
        //         array_push($units_module,$unit);
        //     });
        // });

        // dd($module->groups->count());


        // foreach ($groups as $key => $value) {
        //     // dd(json_decode($value->units()->where('status','1')->get()));
        //     $unit[] = $value->units()->where('status','1')->get();

        // }

        // dd($unit);
        // $units = $module->units->where('status', 1)->sort();

        if ($role == "admin") {
            // $user_units = $module->units;
            $user_units = $units_module;
        } else {
            $user_units = $units_module;
            // $user_units = $user->units->where('status', 1);
            // $user_units = $user_units->diff($user_units->diff($module->units->where('status', 1)));

            // $user_units = $user->units->intersect($units)->sort();
        }

        // $units = $units->diff($user_units);
        // dd($units_module->first()->isPassed);
        // foreach ($units_module->first()->isPassed($user->id) as $key => $value) {
        // dd($units_module->first()->isPassed($user->id)->first()->pivot->nota);
        // }
        // $units = array_diff($units_module,$user_units);
        $units = [];
        // dd($units[0]->exams);
        // dd($units_module, $user_units, $units);
        // dd($user->id);
        // dd($user_units);
        return view('course.module.show', compact('user', 'role', 'units', 'user_units'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Module  $module
     * @return \Illuminate\Http\Response
     */
    public function edit(Module $module)
    {
        $courses = Course::all();
        return view('course.module.edit', compact('courses','module'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Module  $module
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Module $module)
    {
        $module_image = $request->file('module_image');
        $path_to_file = $module_image == null ? null : $request->file('module_image')->storeAs('public/images/modules/covers', $module->id.'.'.$module_image->getClientOriginalExtension());
        $module->update([
            "course_id" => $request->course_id,
            "module_name" => $request->module_name,
            "module_description" => $request->module_description,
            "status" => $request->status,
            'module_image' => $path_to_file,
        ]);

        return redirect()->route('courses.details', $module->course_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Module  $module
     * @return \Illuminate\Http\Response
     */
    public function destroy(Module $module)
    {
        $course_id = $module->course->id;
        $module->delete();

        return redirect()->route('courses.details', $course_id);
    }

    /**
     * Sort modules in course
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function sort(Request $request)
    {
        $newModulesOrder = json_decode($request->data);
        foreach ($newModulesOrder as $key => $value) {
            if ($value != null){
                $module = Module::find($key);
                $module->order = (int)$value;
                $module->save();
            }
        }
        return redirect()->route('courses.details', $request->course_id);
    }

    static function is_passed($nota, $id)
    {

        if ($nota != null) {

            if (Group_unit::find($id)->priority == 'FIRST') {
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
            if (Group_unit::find($id)->priority == 'FIRST') {
                return true;
            } else {
                return false;
            }
        }
    }
}
