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

            if ($request->input('question-type') == "multiple-choice") {
                $request->validate([
                    'selected-option' => 'required',
                ]);
            }
        } catch (\Throwable $th) {
            $request->session()->flash('error', $th->getMessage());
            return redirect()->route('exam.show', $exam_id);
        }


        $file = $request->file('question-file');
        $path_to_file = $file == null ? null : $request->file('question-file')->storeAs('public/questions/files', time() . '.' . $file->getClientOriginalExtension());

        $question = new Question;
        $question->value = $request->input('question-value');
        $question->description = $request->input('question-description');
        $question->type = $request->input('question-type');
        $question->data = json_encode([
            'path-to-file' => $path_to_file,
            'options' => [
                'option-text-1' => $request->input('option-text-1'),
                'option-text-2' => $request->input('option-text-2'),
                'option-text-3' => $request->input('option-text-3'),
                'selected-option' => $request->input('selected-option')
            ]
        ]);

        $question->save();
        $question->exams()->attach([$exam_id]);

        return redirect()->route('exam.show', $exam_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show($exam_id, $question_id)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function import(Request $request)
    {
        $exam_id = $request->exam_id;
        $file = $request->file('import-file');
        $mime_type = $file->getClientMimeType();
        $file = file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        if ($file && $mime_type == "text/plain") {
            $options = [];
            $options_aux = [];
            $answer = "";
            $counter = 0;
            $question_description = "";
            foreach ($file as $line) {

                if (preg_match("/[ABCDEFGHIJKLMNOPQRSTUVWXYZ]\./", $line)) {
                    $options[] = preg_replace("/[ABCDEFGHIJKLMNOPQRSTUVWXYZ]\. /", "", $line);
                } else if (preg_match("/ANSWER:/", $line)) {
                    $answer = str_replace("ANSWER: ", "", $line);
                    switch ($answer) {
                        case 'A':
                            $answer = 1;
                            break;

                        case 'B':
                            $answer = 2;
                            break;

                        case 'C':
                            $answer = 3;
                            break;

                        case 'D':
                            $answer = 4;
                            break;

                        case 'E':
                            $answer = 5;
                            break;

                        case 'F':
                            $answer = 6;
                            break;

                        default:
                            $answer = null;
                            break;
                    }

                    foreach ($options as $key => $value) {
                        $options_aux['option-text-' . ($key + 1)] = $value;
                        $options_aux['selected-option'] = $answer;
                    }
                    $options = $options_aux;

                    $question = new Question;
                    $question->value = 1;
                    $question->description = $question_description;
                    $question->type = 'multiple-choice';
                    $question->data = json_encode([
                        'path-to-file' => NULL,
                        'options' => $options,
                    ]);
                    
                    $question->save();
                    $question->exams()->attach([$exam_id]);

                    $options = [];
                    $options_aux = [];
                    $answer = "";
                    $counter = 0;
                    $question_description = "";
                } else {
                    $question_description = $line;
                }

                $counter++;
            }
        } else {
            return redirect()->back()->with("error", "Invalid data");
        }

        return redirect()->route('exam.show', $exam_id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function edit($exam_id, $question_id)
    {
        $question = Question::find($question_id);

        return view('admin.exams.questions.show', compact('question', 'exam_id'));
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

            if ($request->input('question-type') == "multiple-choice") {
                $request->validate([
                    'selected-option' => 'required',
                ]);
            }
        } catch (\Throwable $th) {
            $request->session()->flash('error', $th->getMessage());
            return redirect()->route('exam.show', $exam_id);
        }


        $file = $request->file('question-file');
        $path_to_file = $file == null ? null : $request->file('question-file')->storeAs('questions/files', time() . '.' . $file->getClientOriginalExtension());

        $question = Question::find($question_id);
        $question->value = $request->input('question-value');
        $question->description = $request->input('question-description');
        $question->type = $request->input('question-type');
        $question->data = json_encode([
            'path-to-file' => $path_to_file,
            'options' => [
                'option-text-1' => $request->input('option-text-1'),
                'option-text-2' => $request->input('option-text-2'),
                'option-text-3' => $request->input('option-text-3'),
                'selected-option' => $request->input('selected-option')
            ]
        ]);
        $question->save();

        return redirect()->route('exam.show', $exam_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy($exam_id, $question_id)
    {
        $question = Question::find($question_id);
        $question->delete();
        return redirect()->route('exam.show', $exam_id);
    }
}
