<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QuestionController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $exam_id)
    {
        try {
            $request->validate([
                'question-file' => 'file|mimes:mp3,jpg,png|max:10000',
                'question-type' => 'required',
                'question-value' => 'required',
                'question-description' => 'required',
                'question-value' => 'min:0|max:100',
            ]);

            if($request->input('question-type') == "multiple-choice"){
                $request->validate([
                    'selected-option' => 'required',
                ]);
            }

        } catch (\Throwable $th) {
            $request->session()->flash('error',$th->getMessage());
            return redirect()->route('exam.show',$exam_id);
        }


        $file = $request->file('question-file');
        $path_to_file = $file == null ? null : $request->file('question-file')->storeAs('public/questions/files', time().'.'.$file->getClientOriginalExtension());

        $question = new Question;
        $question->value = $request->input('question-value');
        $question->description = $request->input('question-description');
        $question->type = $request->input('question-type');
        $question->data = json_encode([
            'path-to-file' => $path_to_file,
            'options' =>[
                'option-text-1' => $request->input('option-text-1'),
                'option-text-2' => $request->input('option-text-2'),
                'option-text-3' => $request->input('option-text-3'),
                'selected-option' => $request->input('selected-option')
            ]
        ]);

        $question->save();
        DB::table('exam_question')->insert([
            'question_id' => $question->id,
            'exam_id' => $exam_id,
        ]);

        return redirect()->route('exam.show',$exam_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show($exam_id, $question_id)
    {
        $question = Question::find($question_id);

        return view('admin.exams.questions.show',compact('question','exam_id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $exam_id, $question_id)
    {
        try {
            $request->validate([
                'question-file' => 'file|mimes:mp3,jpg,png|max:10000',
                'question-type' => 'required',
                'question-value' => 'required',
                'question-description' => 'required',
                'question-value' => 'min:0|max:100',
            ]);

            if($request->input('question-type') == "multiple-choice"){
                $request->validate([
                    'selected-option' => 'required',
                ]);
            }

        } catch (\Throwable $th) {
            $request->session()->flash('error',$th->getMessage());
            return redirect()->route('exam.show',$exam_id);
        }


        $file = $request->file('question-file');
        $path_to_file = $file == null ? null : $request->file('question-file')->storeAs('questions/files', time().'.'.$file->getClientOriginalExtension());

        $question = Question::find($question_id);
        $question->value = $request->input('question-value');
        $question->description = $request->input('question-description');
        $question->type = $request->input('question-type');
        $question->data = json_encode([
            'path-to-file' => $path_to_file,
            'options' =>[
                'option-text-1' => $request->input('option-text-1'),
                'option-text-2' => $request->input('option-text-2'),
                'option-text-3' => $request->input('option-text-3'),
                'selected-option' => $request->input('selected-option')
            ]
        ]);
        $question->save();

        return redirect()->route('exam.show',$exam_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
        //
    }
}
