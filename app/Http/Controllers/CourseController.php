<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Module;
use App\Models\User;
use App\Models\Group_unit;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        } else if ($role == "guest") {
            $courses = Course::all();
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
        return view('course.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request);
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'modality' => 'required|in:synchronous,asynchronous',
            'category' => 'required|in:spanish,english',
        ]);

        $course = new Course();
        $course->name = $request->name;
        $course->description = $request->description;
        $course->modality = $request->modality;
        $course->category = $request->category;
        $course->image = $request->image;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $course = Course::findOrFail($id);
        $user = User::find(auth()->id());
        $role = $user->roles->first()->name;
        $modules = $course->modules->where('status', 1)->sortBy('order');

        if ($role == "guest") {
            $user_modules = new Collection([$modules->first()]);

            if ($user->hasPermissionTo('view units')) {
                $user_modules = new Collection();
                foreach ($modules as $module) {
                    if ($module->id <= $user->units->first()->module->order) {   //TO DO: use $module->order instead of $module->id *URGENT*
                        $user_modules->push($module);
                    }
                }
                $user_modules = $user_modules->unique();
            }
        } else if ($role == "student") {
            $user_modules = new Collection();
            if ($course->categories->pluck('name')->contains('Conversational')) {
                $user_module = DB::table('module_user')->select('module_id')->where('user_id', auth()->user()->id)->first();
                if (!empty($user_module)) {
                    $user_module = Module::findOrFail($user_module->module_id);
                    $user_modules->push($user_module);
                }
            } else {
                foreach ($modules as $module) {
                    if ($module->id <= $user->units->first()->module->order) {
                        $user_modules->push($module);
                    }
                }
                $user_modules = $user_modules->unique();
            }
        } else if ($role == "teacher") {
            if ($course->categories->pluck('name')->contains('Conversational')) {
                $user_modules = $user->modules->sortBy('order');
                $modules = $user_modules;
            } else {
                $user_modules = $modules;
            }
        } else if ($role == "admin") {
            $user_modules = $course->modules->sortBy('order');
        }

        return view('course.show', compact('user_modules', 'modules', 'course'));
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

    /**
     * Show course details
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function details($id)
    {
        $course = Course::find($id);
        return view('course.details', compact('course'));
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

    public function module_priority($modules, $module_priority, $module_id)
    {

        // $modules[] = Module::where('priority', $module_id);
        $id = $module_id;
        foreach ($modules as $key => $value) {



            foreach ($modules as $key2 => $value2) {
                if ($value2->priority == $id) {
                    $module_priority[] = $value2;
                    $id = $value2->id;
                    break;
                }
            }
        }
        return $module_priority;
    }
}
