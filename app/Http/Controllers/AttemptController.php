<?php

namespace App\Http\Controllers;

use App\Models\Attempt;
use App\Models\Exam;
use App\Models\Question;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AttemptController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  int  $user_id
     * 
     * @return \Illuminate\Http\Response
     */
    public function index($user_id)
    {
        $role = Auth::user()->roles->pluck('name')[0];
        $user = User::find($user_id);
        if ($user != null) {
            if ($role == "admin") {
                $attempts = Attempt::all()->sortDesc();
            } elseif ($role == "teacher") {
                $attempts = Attempt::where('user_id', $user_id)->get()->sortDesc();
            } else {
                Attempt::where('user_id', auth()->id())->get();
            }
        }else{
            abort(404);
        }

        return view('exams.attempts.index', compact('attempts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $attempt = Attempt::find($id);

        if ($attempt == null) abort(404);

        if ($attempt->user_id == auth()->id() || auth()->user()->roles[0]->name == "admin" || auth()->user()->roles[0]->name == "teacher") {
            $exam_id = $attempt->exam_id;
            if ($attempt->data != NULL) {
                $student_answers = json_decode($attempt->data);
                $student_answers = json_decode(json_encode($student_answers), true);
                $student_answers = $student_answers["answers"];
            }
            $exam = Exam::find($exam_id);
            $questions = $exam->questions;
            $answers = [];
            $result = $attempt->score;

            foreach ($questions as $key => $value) {
                if (!isset($student_answers[$key])) {
                    $student_answers[$key] = -1;
                }
                $answers[$key] = [$questions[$key]->answer(), $student_answers[$key]];
            }

            return view('exams.result', compact('attempt', 'result', 'answers', 'questions'));
        } else {
            abort(404);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show_question($attempt_id, $question_id)
    {
        $attempt = Attempt::find($attempt_id);
        $questions = $attempt->exam->questions->toArray();
        $essay_id = -1;
        ksort($questions);
        $questions = array_values($questions);
        foreach ($questions as $key => $value) {
            if ($value["type"] == "essay") {
                $essay_id = $key;
                $question = $value;
                $attempt->data = json_decode($attempt->data, 1)["answers"];
                $answer = $attempt->data[$essay_id];
                return view('exams.attempts.show_question', compact('question', 'answer', 'attempt_id'));
            }
        }
        // dd(json_decode($attempt->data), $essay_id);
        // $question = $attempt->data[$essay_id];
        // if ($question->type == "essay") {
        //     return view('exams.attempts.show_question', compact('question'));
        // }

        return "Error";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Attempt  $attempt
     * @return \Illuminate\Http\Response
     */
    public function edit(Attempt $attempt)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Attempt  $attempt
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Attempt $attempt)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Attempt  $attempt
     * @return \Illuminate\Http\Response
     */
    public function destroy(Attempt $attempt)
    {
        //
    }
}
