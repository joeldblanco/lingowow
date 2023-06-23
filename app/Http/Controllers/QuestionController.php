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
    public function create(Request $request)
    {
        $method = $request->method;
        return view('admin.exams.questions.create', compact('method'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $exam_id = $request->exam_id;
        try {
            $request->validate([
                'exam_id' => 'required|numeric|exists:App\Models\Exam,id',
                'title' => 'string|max:255',
                'description' => 'string',
                // 'type' => 'required',
                'marks' => 'required|min:0|max:100',
                'options' => 'array',
                'file' => 'file|mimes:mp3,jpg,png|max:10000',
                'description' => 'required',
            ]);

            if ($request->input('type') == "multiple-choice") {
                $request->validate([
                    'answer' => 'required',
                ]);

                $options = json_encode($request->only([
                    'option-text-1',
                    'option-text-2',
                    'option-text-3',
                ]));
            }
        } catch (\Throwable $th) {
            $request->session()->flash('error', $th->getMessage());
            return redirect()->route('exams.edit', $exam_id);
        }


        $file = $request->file('file');
        $path_to_file = $file == null ? null : $request->file('file')->storeAs('public/questions/files', time() . '.' . $file->getClientOriginalExtension());

        // dd($file, $path_to_file);

        $order = Question::where('exam_id', $exam_id)->max('order') + 1;

        $question = Question::create([
            'exam_id' => $exam_id,
            'title' => $request->title,
            'description' => $request->description,
            'type' => $request->type,
            'marks' => $request->marks,
            'options' => $options ?? null,
            'answer' => $request->input('answer'),
            'file_path' => $path_to_file,
            'order' => $order,
        ]);

        return redirect()->route('exams.edit', $exam_id);
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
                    }
                    $options = $options_aux;

                    $order = Question::where('exam_id', $exam_id)->max('order') + 1;

                    $question = new Question;
                    $question->marks = 1;
                    $question->exam_id = $exam_id;
                    $question->description = $question_description;
                    $question->type = 'multiple-choice';
                    $question->options = json_encode($options);
                    $question->answer = $answer;
                    $question->order = $order;

                    $question->save();

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

        return redirect()->route('exams.edit', $exam_id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Question $question)
    {
        $exam_id = $question->exam_id;
        $question_id = $question->question_id;

        return view('exams.questions.show', compact('question', 'exam_id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Question $question)
    {
        try {
            $request->validate([
                'title' => 'string|max:255',
                'description' => 'string|max:255',
                // 'type' => 'required',
                'marks' => 'required|min:0|max:100',
                'options' => 'array',
                'file' => 'file|mimes:mp3,jpg,png|max:10000',
                'description' => 'required',
            ]);

            if ($request->input('type') == "multiple-choice") {
                $request->validate([
                    'answer' => 'required',
                ]);

                $options = json_encode($request->only([
                    'option-text-1',
                    'option-text-2',
                    'option-text-3',
                ]));
            }
        } catch (\Throwable $th) {
            session()->flash('error', $th->getMessage());
            return redirect()->route('exams.edit', $question->exam_id);
        }

        $file = $request->file('question-file');
        $path_to_file = $file == null ? $question->file : $request->file('question-file')->storeAs('questions/files', time() . '.' . $file->getClientOriginalExtension());

        $question = Question::find($question->id);
        $question->marks = $request->marks;
        $question->title = $request->title;
        $question->description = $request->description;
        $question->type = $request->type;
        $question->options = $options ?? null;
        $question->answer = $request->answer;
        $question->file_path = $path_to_file;
        $question->save();

        return redirect()->route('exams.edit', $question->exam_id);
    }

    public function sort(Request $request)
    {
        $newQuestionsOrder = json_decode($request->data);
        foreach ($newQuestionsOrder as $key => $value) {
            if (!empty($value)) {
                $question = Question::find($key);
                $question->order = (int)$value;
                $question->save();
            }
        }

        return redirect()->route('exams.edit', $request->exam_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
        $exam_id = $question->exam_id;
        $question->delete();
        return redirect()->route('exams.edit', $exam_id);
    }
}
