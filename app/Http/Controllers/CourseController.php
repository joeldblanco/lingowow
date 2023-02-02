<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Course;
use App\Models\Module;
use App\Models\User;
use App\Models\Group_unit;
use App\Models\Product;
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

    public function adminIndex()
    {
        $courses = Course::all();
        return view('admin.courses.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('course.create', [
            'categories' => Category::all(),
        ]);
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
            'name' => 'required',
            'description' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg|max:2048',
            'modality' => 'required|in:synchronous,asynchronous',
            'categories' => 'exists:App\Models\Category,id',
        ]);

        $image = $request->file('image');
        $path_to_file = $image == null ? DB::table('metadata')->where('key', 'sample_image_url')->first()->value : $image->storeAs('public/images/courses/covers', str_replace(" ", "_", $request->name) . '.' . $image->getClientOriginalExtension());
        $course_image = $path_to_file;

        $course = Course::create([
            'name' => $request->name,
            'description' => $request->description,
            'modality' => $request->modality,
            'image_url' => $course_image,
        ]);

        if (!empty($request->categories)) {
            $categories = explode(',', $request->categories);
            $course->categories()->sync($categories);
        }

        return redirect()->route('courses.index')->with('success', 'Course created successfully.');
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
            if ($user->hasPermissionTo('view units')) {

                $user_modules = new Collection();

                if ($course->categories->pluck('name')->contains('Conversational')) {
                    $user_module = DB::table('module_user')->select('module_id')->where('user_id', auth()->user()->id)->first();
                    if (!empty($user_module)) {
                        $user_module = Module::findOrFail($user_module->module_id);
                        $user_modules->push($user_module);
                        $modules = $user_modules;
                    }
                } else {
                    foreach ($modules as $module) {
                        if ($module->order <= $user->units->first()->module->order) {   //TO DO: use $module->order instead of $module->id *URGENT*
                            $user_modules->push($module);
                        }
                    }
                    $user_modules = $user_modules->unique();
                }
            } else {
                $user_modules = new Collection([$modules->first()]);
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
    public function edit($course)
    {
        $course = Course::findOrFail($course);
        $categories = Category::all();
        $products = Product::all();
        return view('course.edit', compact('course', 'categories', 'products'));
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
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg|max:2048',
            'modality' => 'required|in:synchronous,asynchronous',
        ]);

        if (!empty($request->categories)) {
            $request->validate(['categories' => 'exists:App\Models\Category,id']);
        }

        if (!empty($request->products)) {
            $request->validate(['products' => 'exists:App\Models\Product,id']);
        }

        $image = $request->file('course_image');
        $path_to_file = $image == null ? DB::table('metadata')->where('key', 'sample_image_url')->first()->value : $image->storeAs('public/images/courses/covers', str_replace(" ", "_", $request->name) . '.' . $image->getClientOriginalExtension());
        $course_image = $path_to_file;

        $course->update([
            'name' => $request->name,
            'description' => $request->description,
            'course_image' => $course_image,
            'modality' => $request->modality,
        ]);

        if (!empty($request->categories)) {
            $categories = explode(',', $request->categories);
            $course->categories()->sync($categories);
        } else {
            $course->categories()->detach();
        }

        if (!empty($request->products)) {
            $products = explode(',', $request->products);
            $course->products()->sync($products);
        } else {
            $course->products()->detach();
        }

        return redirect()->route('admin.courses.index')->with('success', 'Course updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        $course->categories()->detach();
        $course->products()->detach();
        $course->delete();

        return redirect()->route('admin.courses.index')->with('success', 'Course deleted successfully.');
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
}
