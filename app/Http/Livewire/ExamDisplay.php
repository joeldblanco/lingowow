<?php

namespace App\Http\Livewire;

use App\Http\Controllers\UnitController;
use App\Models\Answer;
use App\Models\Attempt;
use Illuminate\Http\Request;
use Livewire\Component;

class ExamDisplay extends Component
{
    public $exam, $question, $total_questions, $index, $answer, $attempt, $startAttempt, $examContent, $essay = [];
    public $answers = [];
    public $loadingState = false;
    protected $listeners = ['timerExpired' => 'submitExam'];

    public function mount($exam, $attempt)
    {
        $this->attempt = $attempt;
        $this->exam = $exam;
        $this->index = 0;
        $this->total_questions = count($this->exam->questions);
        $this->startAttempt = true;
        $this->examContent = false;
        if (!empty($this->attempt))
            $this->answers = Answer::where('attempt_id', $this->attempt->id)->get()->pluck('answer', 'question_id')->toArray();
    }

    public function startAttempt()
    {
        $this->startAttempt = false;
        $this->examContent = true;

        $this->attempt = Attempt::where('user_id', auth()->id())->where('exam_id', $this->exam->id)->whereNull('completed_at')->first();
        if (empty($this->attempt)) {
            $this->attempt = new Attempt();
            $this->attempt->user_id = auth()->id();
            $this->attempt->exam_id = $this->exam->id;
            $this->attempt->save();
        }


        $this->dispatchBrowserEvent('startAttempt');
    }

    public function updatedEssay()
    {
        foreach ($this->essay as $question_id => $essay) {

            $question = $this->exam->questions->where('id', $question_id)->first();

            Answer::updateOrCreate([
                'attempt_id' => $this->attempt->id,
                'question_id' => $question->id,
                'score' => $question->marks,
            ], [
                'answer' => $essay,
            ]);
        }
    }

    public function saveAnswer($answer)
    {
        $answer = explode("-", $answer);
        $question = $this->exam->questions->where('id', $answer[1])->first();
        
        Answer::updateOrCreate([
            'attempt_id' => $this->attempt->id,
            'question_id' => $question->id,
            'score' => $question->marks,
        ], [
            'answer' => $answer[0],
        ]);
    }

    public function submitExam()
    {
        $this->examContent = false;
        $this->loadingState = true;

        if (!auth()->user()->hasRole('student')) {
            $answersIds = Answer::where('attempt_id', $this->attempt->id)->get()->pluck('id')->toArray();
            $this->attempt->answers->whereIn('id', $answersIds)->each(function ($answer) {
                $answer->delete();
            });
            $this->attempt->delete();
            redirect()->route('exams.show', $this->exam->id);
        }

        $this->correct();
    }

    private function correct()
    {
        $attempt = $this->attempt;
        if (empty($attempt)) abort(404);

        $answers = Answer::where('attempt_id', $this->attempt->id)->get();

        if ($attempt->user_id == auth()->id() || auth()->user()->hasRole('admin') || auth()->user()->hasRole('teacher')) {

            $exam = $this->exam;
            $questions = $exam->questions;
            $result = 0;

            foreach ($questions as $question) {

                if (!empty($answers->where('question_id', $question->id)->first())) {
                    if ($question->answer == $answers->where('question_id', $question->id)->first()->answer) {
                        $result += $question->marks;

                        $answers->where('question_id', $question->id)->first()->score = $question->marks;
                        $answers->where('question_id', $question->id)->first()->save();
                    } else {
                        $answers->where('question_id', $question->id)->first()->score = 0;
                        $answers->where('question_id', $question->id)->first()->save();
                    }
                } else {
                    Answer::updateOrCreate([
                        'attempt_id' => $attempt->id,
                        'question_id' => $question->id,
                    ], [
                        'answer' => null,
                        'score' => 0,
                    ]);
                }
            }

            $attempt->score = $result;
            $attempt->completed_at = now()->toDateTimeString();
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

    public function render()
    {
        // dump($this->answers);
        if (!empty($this->attempt->completed_at)) $this->correct();
        if (!empty($this->attempt)) $this->answers = Answer::where('attempt_id', $this->attempt->id)->get()->pluck('answer', 'question_id')->toArray();

        if (count($this->exam->questions) > 0) $this->question = $this->exam->questions[$this->index];
        return view('livewire.exam-display');
    }
}
