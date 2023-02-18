<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Enrolment;
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
    public function create(Request $request)
    {
        // Check if the authenticated user is an admin
        if (auth()->user()->hasRole("admin")) {
            // If the user is an admin, get the module using the given module_id in the request
            $modules = new Collection([Module::find($request->module_id)]);
        } else {
            // If the user is not an admin, get all modules the user is assigned to, sorted by order
            $modules = auth()->user()->modules->sortBy('order');
        }
        // Return the view, passing in the modules
        return view('course.module.unit.create', compact('modules'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'name' => 'required',
            'status' => 'required',
            'module_id' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Create a new unit object
        $unit = new Unit();

        // Assign validated data to the unit object
        $unit->name = $validatedData['name'];
        $unit->status = $validatedData['status'];
        $unit->module_id = $validatedData['module_id'];
        $unit->order = Unit::where('module_id', $validatedData['module_id'])->max('order') + 1;

        // Get the image path
        $image = $request->file('image');
        $path_to_file = $this->getImagePath($image, $validatedData['name']);
        $unit->image = $path_to_file;

        // Save the unit object
        $unit->save();

        // Redirect to the show view for the module with a success message
        return redirect()->route('modules.show', $validatedData['module_id'])->with('success', 'Unit created successfully.');
    }

    /**
     * Get the path for the unit image.
     *
     * @param $image
     * @param $name
     * @return string
     */
    private function getImagePath($image, $name)
    {
        // If the image is null, return the sample image URL
        if ($image === null) {
            return DB::table('metadata')->where('key', 'sample_image_url')->first()->value;
        }

        // Store the image and return its path
        return $image->storeAs('public/images/units/covers', str_replace(" ", "_", $name) . '.' . $image->getClientOriginalExtension());
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

            $unit = Unit::findOrFail($id);
            $course = $unit->course();

            if ($course->categories->pluck('name')->contains('Conversational')) {
                $teacher_units = $user->modules->pluck('units')->flatten();

                if (!$teacher_units->contains($unit, false))
                    abort(404);
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

            if ($user->hasPermissionTo('view units')) {
                if ($unit->course()->categories->pluck('name')->contains('Conversational')) {
                    if ($user->modules->sortBy('order')->contains($unit->module)) {
                        $module_units  = $unit->module->units->where('status', 1)->sortBy('order');
                        $user_units = $module_units;
                    } else {
                        abort(404);
                    }
                } else {
                    //REVISAR QUE EL CURSO DE LA UNIDAD SOLICITADA SE ENCUENTRE ENTRE LOS CURSOS A LOS QUE EL ESTUDIANTE ESTÁ INSCRITO
                    $student_courses = Enrolment::withTrashed()->where('student_id', $user->id)->get()->pluck('course');
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
            } else {
                $course_units = $unit->course()->units()->sortBy('order');
                $first_unit = $course_units->first();

                if ($first_unit->id != $id) {
                    abort(403, 'USER DOES NOT HAVE THE RIGHT ROLES.');
                }
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
    public function details(Unit $unit)
    {
        $users = $unit->users;
        $unit_id = $unit->id;

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
        // Store the image in the public/images/units/covers directory
        $image = $request->file('image');
        $path_to_file = $unit->image;
        if ($image != null) {
            $path_to_file = $image->storeAs('public/images/units/covers', $unit->id . '.' . $image->getClientOriginalExtension());
        }

        // Update the unit's information in the database
        $unit->update([
            "module_id" => $request->module_id,
            "name" => $request->name,
            "status" => $request->status,
            'image' => $path_to_file,
        ]);

        // Redirect to the module's show page
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
        $user = User::find(auth()->id());
        $role = $user->roles->first()->name;

        // Check if the user is an admin
        if ($role == "admin") {
            $unit->delete();
        }

        // Check if the user is a teacher
        if ($role == "teacher") {
            $course = $unit->course();

            // Check if the course is conversational
            if ($course->categories->pluck('name')->contains('Conversational')) {
                $teacher_units = $user->modules->pluck('units')->flatten();

                // Check if the teacher owns the unit
                if (!$teacher_units->contains($unit, false)) {
                    abort(404);
                }

                $unit->delete();
            }
        }

        return redirect()->route('modules.details', $module_id);
    }

    /**
     * This function sorts the units in a given module.
     * 
     * @param \Illuminate\Http\Request $request The request object
     * @return \Illuminate\Http\Response The response
     */
    public function sort(Request $request)
    {
        // Decode the data from the request
        $newUnitsOrder = json_decode($request->data);

        // Loop through the decoded data
        foreach ($newUnitsOrder as $key => $value) {
            // Check if the value is not null
            if ($value != null) {
                // Find the unit and assign the value to its order
                $unit = Unit::find($key);
                $unit->order = (int)$value;
                $unit->save();
            }
        }
        // Redirect to the module details page
        return redirect()->route('modules.details', $request->module_id);
    }



    /**
     * Show the form to associate users with units
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function userAssociation()
    {
        // Retrieve all users with the role 'student'
        $users = User::whereHas('roles', function ($query) {
            $query->where('name', 'student');
        })->orderBy('first_name')->get();

        // Retrieve all courses
        $courses = Course::all();

        // Return the view with the users and courses data
        return view('course.module.unit.userAssociation', compact('users', 'courses'));
    }

    /**
     * Associate users with units
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function userAssociate(Request $request)
    {
        // Validate the request data
        $request->validate([
            'user' => 'required|numeric|exists:App\Models\User,id',
            'unit' => 'required|numeric|exists:App\Models\Unit,id',
        ]);

        // Get the user object
        $user = User::find($request->user);

        // Detach user from all units
        $user->units()->detach();

        // Attach the user to the unit
        $user->units()->attach($request->unit);

        // Set a success message
        // session(['success' => 'User associated with unit successfully']);

        // Redirect to the unit association page
        return redirect()->route('units.association')->with('success', 'User associated with unit successfully');
    }
}
