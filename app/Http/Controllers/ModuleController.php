<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Module;
use App\Models\User;
use App\Models\Group_unit;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
    public function create(Request $request)
    {
        if (auth()->user()->hasRole('admin')) {
            $courses = collect(Course::all());
        } else {
            $courses = collect([Course::find($request->course)]);
        }

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
        $order = Module::where('course_id', $request->course_id)->max('order') + 1;
        $module = Module::create([
            "course_id" => $request->course_id,
            "name" => $request->name,
            "description" => $request->description,
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

        if ($role == "admin") {
            $module_units  = $module->units->sortBy('order');
            $user_units = $module_units;
        } else if ($role == "teacher") {
            if ($module->course->categories->pluck('name')->contains('Conversational')) {
                if ($user->modules->sortBy('order')->contains($module)) {
                    $module_units  = $module->units->where('status', 1)->sortBy('order');
                    $user_units = $module_units;
                } else {
                    abort(404);
                }
            } else {
                $module_units  = $module->units->where('status', 1)->sortBy('order');
                $user_units = $module_units;
            }
        } else if ($role == "student") {
            $module_units  = $module->units->where('status', 1)->sortBy('order');
            if ($user->units->count() > 0) {
                $user_units = $module_units->where('order', '<=', $user->units->first()->order);
            } else {
                $user_units = new Collection([]);
            }
        } else if ($role == "guest") {

            if ($user->hasPermissionTo('view units')) {
                $user_units = $module->units->where('status', 1)->sortBy('order')->where('order', '<=', $user->units->first()->order);

                if ($module->course->categories->pluck('name')->contains('Conversational')) {
                    if ($user->modules->sortBy('order')->contains($module)) {
                        $module_units  = $module->units->where('status', 1)->sortBy('order');
                        $user_units = $module_units;
                    } else {
                        abort(404);
                    }
                } else {
                    $module_units  = $module->units->where('status', 1)->sortBy('order');
                    $user_units = $module_units;
                }
            } else {
                $module_units  = $module->units->where('status', 1)->sortBy('order');
                $user_units = new Collection([$module_units->where('order', 1)->first()]);
            }
        }
        return view('course.module.show', compact('user', 'role', 'module_units', 'user_units', 'module'));
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
        return view('course.module.edit', compact('courses', 'module'));
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
        $image = $request->file('image');
        $path_to_file = $image == null ? DB::table('metadata')->where('key', 'sample_image_url')->first()->value : $request->file('image')->storeAs('public/images/modules/covers', $module->id . '.' . $image->getClientOriginalExtension());
        $module->update([
            "course_id" => $request->course_id,
            "name" => $request->name,
            "description" => $request->description,
            "status" => $request->status,
            "image" => $path_to_file,
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
            if ($value != null) {
                $module = Module::find($key);
                $module->order = (int)$value;
                $module->save();
            }
        }
        return redirect()->route('courses.details', $request->course_id);
    }

    /**
     * Show module details
     *
     * @param  \App\Models\Module  $module
     * @return \Illuminate\Http\Response
     */
    public function details(Module $module)
    {
        return view('course.module.details', compact('module'));
    }

    // static function is_passed($nota, $id)
    // {

    //     if ($nota != null) {

    //         if (GroupUnit::find($id)->priority == 'FIRST') {
    //             return true;
    //         } else {
    //             $nota = $nota->pivot->nota;
    //             if ($nota >= 10) {
    //                 return true;
    //             } else {
    //                 return false;
    //             }
    //         }
    //     } else {
    //         if (GroupUnit::find($id)->priority == 'FIRST') {
    //             return true;
    //         } else {
    //             return false;
    //         }
    //     }
    // }
}
