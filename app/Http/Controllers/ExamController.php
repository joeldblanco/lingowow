<?php

namespace App\Http\Controllers;

use App\Models\Attempt;
use App\Models\Exam;
use App\Models\Question;
use App\Models\User;
use Illuminate\Http\Request;

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

        return view('admin.exams.index', compact('exams'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.exams.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $exam = new Exam;
        $exam->save();
        return redirect()->route('exam.show', $exam->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($exam_id)
    {
        $exam = Exam::find($exam_id);
        $questions = $exam->questions;
        return view('admin.exams.show', compact('questions', 'exam_id'));
    }

    /**
     * Display the exam for users.
     *
     * @param  int  $exam_id
     */
    public function display($exam_id)
    {
        $exam = Exam::find($exam_id);
        // $questions = $exam->questions;

        return view('exams.display', compact('exam'));
    }

    /**
     * Automatically corrects the exam.
     *
     * @param  int  $exam_id
     */
    public static function correct($attempt_id)
    {
        $attempt = Attempt::find($attempt_id);

        if ($attempt == null) abort(404);

        if ($attempt->user_id == auth()->id() || auth()->user()->roles[0]->name == "admin" || auth()->user()->roles[0]->name == "teacher") {
            $exam_id = $attempt->exam_id;
            $student_answers = json_decode($attempt->data);
            $student_answers = json_decode(json_encode($student_answers), true);
            $student_answers = $student_answers["answers"];
            $exam = Exam::find($exam_id);
            $questions = $exam->questions;
            $answers = [];
            $result = 0;

            foreach ($student_answers as $key => $value) {
                // dd($student_answers, $questions, $attempt->data);
                if ($questions[$key]->answer() == $value) {
                    $result += $questions[$key]->value;
                }
            }
            $attempt->score = $result;
            $attempt->save();

            foreach ($questions as $key => $value) {
                if (!isset($student_answers[$key])) {
                    $student_answers[$key] = -1;
                }
                $answers[$key] = [$questions[$key]->answer(), $student_answers[$key]];
            }

            if ($attempt->score >= $exam->min_score) {
                $user = new UsersController;
                $user->addUnit(auth()->id(), auth()->user()->units->last()->id + 1, auth()->user()->units->last()->id + 2);
            }

            return view('exams.result', compact('result', 'answers', 'questions'));
        } else {
            abort(404);
        }
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
     * Shows view for manual correction.
     *
     * @param  int  $exam_id
     */
    public static function manually_correct($attempt_id, $question_id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
