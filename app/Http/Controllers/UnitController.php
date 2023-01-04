<?php

namespace App\Http\Controllers;

use App\Models\Module;
use App\Models\Unit;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UnitController extends Controller
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
    public function create()
    {
        $modules = Module::all();
        return view('course.module.unit.create', compact('modules'));
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
        $request->validate([
            'name' => 'required',
            'status' => 'required',
            'module_id' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $unit = new Unit();
        $unit->name = $request->name;
        $unit->status = $request->status;
        $unit->module_id = $request->module_id;
        $unit->order = Unit::where('module_id', $request->module_id)->max('order') + 1;
        $image = $request->file('image');
        $path_to_file = $image == null ? DB::table('metadata')->where('key', 'sample_image_url')->first()->value : $image->storeAs('public/images/units/covers', str_replace(" ", "_", $request->name) . '.' . $image->getClientOriginalExtension());
        $unit->image = $path_to_file;
        $unit->save();

        return redirect()->route('modules.show', $request->module_id)->with('success', 'Unit created successfully.');
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

        if ($role == "admin") {
            $unit = Unit::findOrFail($id);
        }

        if ($role == "teacher") {
            $teacher_courses = $user->enrolments_teacher->pluck('course');
            $teacher_units = new Collection();
            foreach ($teacher_courses as $course) {
                if (count($course->units()) > 0) {
                    $teacher_units->push($course->units());
                }
            }
            $teacher_units = $teacher_units->flatten();

            if ($teacher_units->contains(Unit::findOrFail($id))) {
                $unit = Unit::find($id);
            } else {
                abort(403, 'USER DOES NOT HAVE THE RIGHT PERMISSIONS.');
            }
        }

        if ($role == "student") {
            //REVISAR QUE EL CURSO DE LA UNIDAD SOLICITADA SE ENCUENTRE ENTRE LOS CURSOS A LOS QUE EL ESTUDIANTE ESTÁ INSCRITO
            $student_courses = $user->enrolments->pluck('course');
            $unit = Unit::findOrFail($id);
            $unit_course = $unit->course();
            if ($student_courses->contains($unit_course)) {
                //REVISAR QUE EL ORDEN DE LA UNIDAD SOLICITADA SEA IGUAL O MENOR AL ORDEN DE LA UNIDAD DEL ESTUDIANTE

                foreach ($user->units as $user_unit) {
                    if ($user_unit->course()->id == $unit_course->id) {
                        if ($unit->order > $user_unit->order) {
                            abort(403, 'USER DOES NOT HAVE THE RIGHT PERMISSIONS.');
                        }
                    }
                }
            } else {
                abort(403, 'USER DOES NOT HAVE THE RIGHT PERMISSIONS.');
            }
        }

        if ($role == "guest") {
            $unit = Unit::findOrFail($id);
            $unit_course = $unit->course();
            $course_units = $unit_course->units()->sortBy('order');
            $first_unit = $course_units->first();

            if ($first_unit->id != $id) {
                abort(403, 'USER DOES NOT HAVE THE RIGHT ROLES.');
            }
        }

        $activities = $user->activities()->where('status', '1')->get();

        return view('course.module.unit.show', compact('unit', 'activities'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function edit(Unit $unit)
    {
        $modules = Module::all();
        return view('course.module.unit.edit', compact('modules', 'unit'));
    }

    /**
     * Show the details of the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function details($unit_id)
    {
        $unit = Unit::find($unit_id);
        $users = $unit->users;

        return view('course.module.unit.details', compact('users', 'unit_id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Unit $unit)
    {
        $image = $request->file('image');
        $path_to_file = $unit->image;
        if ($image != null) {
            $path_to_file = $image->storeAs('public/images/units/covers', $unit->id . '.' . $image->getClientOriginalExtension());
        }

        $unit->update([
            "module_id" => $request->module_id,
            "name" => $request->name,
            "status" => $request->status,
            'image' => $path_to_file,
        ]);

        return redirect()->route('modules.show', $unit->module_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Unit $unit)
    {
        $module_id = $unit->module->id;
        $unit->delete();

        return redirect()->route('modules.details', $module_id);
    }

    /**
     * Sort units in module
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function sort(Request $request)
    {
        $newUnitsOrder = json_decode($request->data);
        foreach ($newUnitsOrder as $key => $value) {
            if ($value != null) {
                $unit = Unit::find($key);
                $unit->order = (int)$value;
                $unit->save();
            }
        }
        return redirect()->route('modules.details', $request->module_id);
    }
}
