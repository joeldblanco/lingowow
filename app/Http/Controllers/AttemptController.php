<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Attempt;
use App\Models\Exam;
use App\Models\Question;
use App\Models\Unit;
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
    public function index(User $user)
    {
        $role = Auth::user()->roles->pluck('name')[0];
        if (!empty($user)) {
            if ($role == ("admin" || "teacher")) {
                //     $attempts = Attempt::all()->sortDesc();
                // } elseif ($role == "teacher") {
                $attempts = Attempt::where('user_id', $user->id)->get()->sortDesc();
            } else {
                Attempt::where('user_id', auth()->id())->get();
            }
        } else {
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
            }
            $exam = Exam::withTrashed()->find($exam_id);
            $questions = $exam->questions;
            $result = $attempt->score;

            $answers = $attempt->answers;

            return view('exams.attempts.show', compact('attempt', 'result', 'answers', 'questions'));
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
    public function showQuestion($attempt_id, $question_id)
    {
        $question = Question::find($question_id);
        $attempt = Attempt::find($attempt_id);
        $answer = Answer::where('question_id', $question_id)->where('attempt_id', $attempt->id)->first();

        return view('exams.attempts.show_question', compact('question', 'attempt_id', 'answer'));
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

    /**
     * Automatically corrects the exam.
     *
     * @param  Attempt  $attempt
     */
    public static function correct(Request $request)
    {
        $attempt = Attempt::find($request->attempt_id);
        if (empty($attempt)) abort(404);

        $answers = $request->except('_token', 'attempt_id');

        if ($attempt->user_id == auth()->id() || auth()->user()->hasRole('admin') || auth()->user()->hasRole('teacher')) {

            $exam_id = $attempt->exam_id;
            $exam = Exam::find($exam_id);
            $questions = $exam->questions;
            $result = 0;

            foreach ($questions as $question) {

                if (isset($answers[$question->id])) {
                    if ($question->answer == $answers[$question->id]) {
                        $result += $question->marks;

                        Answer::create([
                            'answer' => $answers[$question->id],
                            'score' => $question->marks,
                            'attempt_id' => $attempt->id,
                            'question_id' => $question->id,
                        ]);
                    } else {
                        Answer::create([
                            'answer' => $answers[$question->id],
                            'score' => 0,
                            'attempt_id' => $attempt->id,
                            'question_id' => $question->id,
                        ]);
                    }
                } else {
                    Answer::create([
                        'answer' => null,
                        'score' => 0,
                        'attempt_id' => $attempt->id,
                        'question_id' => $question->id,
                    ]);
                }
            }

            // $questions_total_marks = $questions->where('type', '!=', 'info')->sum('marks');
            // $attempt->score = $result / $questions_total_marks * $exam->total_marks;
            $attempt->score = $result;
            $attempt->save();

            //Check if user passed the exam
            if ($attempt->score >= $exam->passing_marks) {

                //Get this module's units that are greater than this exam's unit
                $nextUnits = $exam->unit->course()->units()->where('order', '>', $exam->unit->order)->where('module_id', $exam->unit->module_id)->sortBy('order');

                //Check if there are other units in the same module
                if (!empty($nextUnits) && $nextUnits->count() > 0) {

                    //Check if those units have exams
                    $nextExams = $nextUnits->pluck('exams')->flatten();
                    if ($nextExams->count() > 0) {

                        //Get the first exam's unit
                        $unit = $nextExams->first()->unit;
                    } else {

                        //Get the last unit of the module
                        $unit = $nextUnits->last();
                    }

                    //Associate the unit to the user.
                    $request = new Request([
                        'user' => $attempt->user->id,
                        'unit' => $unit->id,
                    ]);
                    (new UnitController)->userAssociate($request);
                } else {

                    //Get all course's modules that are greater than this exam's unit's module
                    $nextModules = $exam->unit->course()->modules->where('order', '>', $exam->unit->module->order)->sortBy('order');
                    if (!empty($nextModules) && $nextModules->count() > 0) {

                        //Get all exams in the next modules
                        $nextExams = $nextModules->pluck('units')->flatten()->pluck('exams')->flatten();
                    }

                    //Check if there are exams in the next modules
                    if ($nextExams->count() > 0) {

                        //Get the first exam's unit
                        $unit = $nextExams->first()->unit;
                    } else {

                        //If there are no exams in the next modules, get the last unit of the course
                        $unit = $exam->unit->course()->units()->last();
                    }

                    //Associate the unit to the user.
                    $request = new Request([
                        'user' => $attempt->user->id,
                        'unit' => $unit->id,
                    ]);
                    (new UnitController)->userAssociate($request);
                }
            }

            return redirect()->route('attempt.show', $attempt->id);
        } else {
            abort(404);
        }
    }

    /**
     * Shows view for manual correction.
     *
     * @param  int  $exam_id
     */
    public static function manualCorrection(Request $request)
    {
        $request->validate([
            'attempt_id' => 'required|numeric|exists:App\Models\Attempt,id',
            'question_id' => 'required|numeric|exists:App\Models\Question,id',
        ]);

        $attempt = Attempt::find($request->attempt_id);
        $question = Question::find($request->question_id);

        if ($attempt == null || $question == null) abort(404);

        $request->validate([
            'score' => 'required|numeric|min:0|max:' . $question->marks,
        ]);

        $answer = Answer::where('question_id', $request->question_id)->where('attempt_id', $attempt->id)->first();
        $answer->answer = $request->answer ?? null;
        $answer->score = $request->score;
        $answer->save();

        $attempt->score = Answer::where('attempt_id', $attempt->id)->pluck('score')->sum();
        $attempt->save();

        $exam = $attempt->exam;

        //Check if user passed the exam
        if ($attempt->score >= $exam->passing_marks) {

            //Get this module's units that are greater than this exam's unit
            $nextUnits = $exam->unit->course()->units()->where('order', '>', $exam->unit->order)->where('module_id', $exam->unit->module_id)->sortBy('order');

            //Check if there are other units in the same module
            if (!empty($nextUnits) && $nextUnits->count() > 0) {

                //Check if those units have exams
                $nextExams = $nextUnits->pluck('exams')->flatten();
                if ($nextExams->count() > 0) {

                    //Get the first exam's unit
                    $unit = $nextExams->first()->unit;
                } else {

                    //Get the last unit of the module
                    $unit = $nextUnits->last();
                }

                //Associate the unit to the user.
                $request = new Request([
                    'user' => $attempt->user->id,
                    'unit' => $unit->id,
                ]);
                (new UnitController)->userAssociate($request);
            } else {

                //Get all course's modules that are greater than this exam's unit's module
                $nextModules = $exam->unit->course()->modules->where('order', '>', $exam->unit->module->order)->sortBy('order');
                
                if (!empty($nextModules) && $nextModules->count() > 0) {

                    //Get all exams in the next modules
                    $nextExams = $nextModules->pluck('units')->flatten()->pluck('exams')->flatten();
                }

                //Check if there are exams in the next modules
                if ($nextExams->count() > 0) {

                    //Get the first exam's unit
                    $unit = $nextExams->first()->unit;
                } else {

                    //If there are no exams in the next modules, get the last unit of the course
                    $unit = $exam->unit->course()->units()->last();
                }

                //Associate the unit to the user.
                $request = new Request([
                    'user' => $attempt->user->id,
                    'unit' => $unit->id,
                ]);
                (new UnitController)->userAssociate($request);
            }
        }

        return redirect()->route('attempt.show', $attempt->id);
    }
}
