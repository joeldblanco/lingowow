<?php

namespace App\Http\Controllers;

use App\Models\Attempt;
use App\Models\Course;
use App\Models\Exam;
use App\Models\Module;
use App\Models\Question;
use App\Models\Unit;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;


class ExamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        if (auth()->user()->hasRole('admin')) {
            $exams = Exam::all();
        }

        if (auth()->user()->hasRole('teacher')) {
            $exams = Exam::all();
            
            $modules = auth()->user()->modules->intersect($exams->pluck('unit')->pluck('module'));
            
            $exams = $modules->flatMap(function ($module) {
                return $module->exams();
            });

            $exams = $exams->reject(function ($subcoleccion) {
                return $subcoleccion->isEmpty();
            })->flatten();
        }

        return view('exams.index', compact('exams'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if (!empty($request->module_id)) {
            if (auth()->user()->hasRole('admin')) {
                $courses = Course::all();
                $modules = $courses->pluck('modules')->flatten();
            }

            if (auth()->user()->hasRole('teacher')) {
                $courses = auth()->user()->modules->pluck('course')->filter()->unique();
                $modules = auth()->user()->modules;
            }

            return view('exams.create', compact('courses', 'modules'));
        }

        return abort(404);
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
            'unit_id' => 'required|numeric|exists:App\Models\Unit,id',
            'passing_marks' => 'required|numeric|min:0|max:100',
            'total_marks' => 'required|numeric|min:0|max:100',
            'title' => 'required|string|nullable',
            'description' => 'string|nullable',
            'type' => 'numeric',
            'duration' => 'required|numeric',
            'status' => 'required|numeric',
        ]);

        $exam = Exam::create($request->all());

        return redirect()->route('exams.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Exam $exam)
    {

        $user = User::find(auth()->id());
        $role = $user->roles->first()->name;

        if ($role == "student") {
            $unit_base = $user->units->first();
            $unit_exam = Unit::find($exam->unit_id);
            $unit_course = $unit_exam->course();
            $student_courses = $user->enrolments->pluck('course');
            $course = Course::findOrFail($unit_exam->module->course->id);

            // COMPROBAR SI EL EXAMEN ES DE UN CURSO ADQUIRIDO POR EL ESTUDIANTE

            if (!$student_courses->contains($course)) {
                abort(403, 'USER DOES NOT HAVE THE RIGHT PERMISSIONS.');
            } else {
                // COMPROBAR SI EL EXAMEN ESTA DISPONIBLE DENTRO DE SUS UNIDADES PERMITIDAS EN USER-UNIT 
                foreach ($user->units as $user_unit) {
                    if ($user_unit->course()->id == $unit_course->id) {
                        if ($unit_exam->module->order > $user_unit->module->order) {
                            abort(403, 'USER DOES NOT HAVE THE RIGHT PERMISSIONS.');
                        }

                        if ($unit_exam->module->order == $user_unit->module->order) {
                            if ($unit_exam->order > $user_unit->order) {
                                abort(403, 'USER DOES NOT HAVE THE RIGHT PERMISSIONS.');
                            }
                        }
                    }
                }
            }
        }

        $attempt = null;
        if (auth()->user()->hasRole('student')) {
            $attempt = Attempt::where('user_id', auth()->id())->where('exam_id', $exam->id)->whereNull('completed_at')->first();
        }

        return view('exams.show', compact('exam', 'attempt'));
    }

    /**
     * Display the exam for users.
     *
     * @param  int  $exam_id
     */
    public function display($exam_id)
    {
        $exam = Exam::find($exam_id);

        return view('exams.display', compact('exam'));
    }

    /**
     * Show the details of the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function details($exam_id)
    {
        $exam = Exam::find($exam_id);

        if ($exam != null) {
            $attempts = $exam->attempts->sortDesc();
            return view('exams.details', compact('attempts'));
        } else {
            abort(404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Exam $exam)
    {
        $courses = Course::all();

        return view('exams.edit', compact('exam', 'courses'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'unit_id' => 'required|numeric|exists:App\Models\Unit,id',
            'passing_marks' => 'required|numeric|min:0|max:100',
            'total_marks' => 'required|numeric|min:0|max:100',
            'title' => 'string|nullable',
            'description' => 'string|nullable',
            'type' => 'numeric',
            'duration' => 'required|numeric',
            'status' => 'required|numeric',
        ]);

        $exam = Exam::find($id);
        $exam->update($request->all());

        return redirect()->route('exams.edit', $exam->id)->with('success', 'Exam updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $exam = Exam::find($id);
        $exam->delete();

        return redirect()->route('exams.index');
    }
}
