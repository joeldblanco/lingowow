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
        $exams = Exam::all();

        return view('exams.index', compact('exams'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if (empty($request->module_id)) {
            $courses = Course::all();
            return view('exams.create', compact('courses'));
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
            'title' => 'string|nullable',
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
        $attempt = null;
        if (auth()->user()->hasRole('student')) {
            $attempt = new Attempt();
            $attempt->user_id = auth()->id();
            $attempt->exam_id = $exam->id;
            $attempt->save();
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
