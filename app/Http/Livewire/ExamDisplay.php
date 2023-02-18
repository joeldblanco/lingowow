<?php

namespace App\Http\Livewire;

use App\Http\Controllers\AttemptController;
use App\Http\Controllers\ExamController;
use App\Models\Attempt;
use Livewire\Component;

class ExamDisplay extends Component
{
    public $exam, $question, $total_questions, $index, $answer, $attempt, $startAttempt, $examContent, $essay_content = "";
    public $answers = [];
    protected $listeners = ['timerExpired' => 'submitExam'];

    public function mount()
    {
        $this->index = 0;
        $this->total_questions = count($this->exam->questions);
        $this->startAttempt = true;
        $this->examContent = false;
    }

    public function startAttempt()
    {
        $this->startAttempt = false;
        $this->examContent = true;
        // if (auth()->user()->roles[0]->name == "student") {
        $this->attempt = new Attempt;
        $this->attempt->user_id = auth()->id();
        $this->attempt->exam_id = $this->exam->id;
        $this->attempt->data = json_encode(["answers" => json_encode([])]);
        $this->attempt->save();
        // }

        $this->dispatchBrowserEvent('question-changed', [
            'questionIndex' => $this->index,
            'totalQuestions' => $this->total_questions,
        ]);
    }

    public function nextQuestion()
    {
        if ($this->index < ($this->total_questions - 1)) {
            $this->index++;
            $this->question = $this->exam->questions[$this->index];
            $this->dispatchBrowserEvent('question-changed', [
                'questionIndex' => $this->index,
                'totalQuestions' => $this->total_questions,
            ]);
        } else {
            $this->submitExam();
        }
    }

    public function prevQuestion()
    {
        if ($this->index > 0) $this->index--;
        $this->question = $this->exam->questions[$this->index];
        $this->dispatchBrowserEvent('question-changed', [
            'questionIndex' => $this->index,
            'totalQuestions' => $this->total_questions,
        ]);
    }

    public function updatedAnswer($answer)
    {
        $answer = explode("-", $answer);
        // array_push($this->answers, $this->index => $answer);
        $this->answers[$answer[1]] = $answer[0];
        // dd($this->answers);

        $indexes = [];
        $essay_index = null;

        foreach ($this->exam->questions as $question) {
            if ($question->type == "essay") {
                $essay_index = $question->id;
            } else {
                $indexes[] = $question->id;
            }
        }

        foreach ($indexes as $index) {
            if (!isset($this->answers[$index])) {
                $this->answers[$index] = -1;
            }
        }

        if (!empty($essay_index))
            $this->answers[$essay_index] = $this->essay_content;

        ksort($this->answers);

        $this->attempt->data = json_encode(["answers" => json_encode($this->answers)]);
        $this->attempt->save();
    }

    public function submitExam()
    {
        // $this->answers = array_values($this->answers);

        if (!auth()->user()->hasRole('student')) {
            $this->attempt->delete();
            return redirect()->route('exams.show', $this->exam->id);
        } else {
            $this->attempt->score = AttemptController::correct($this->attempt->id);
            $this->attempt->save();

            return redirect()->route('attempt.show', $this->attempt->id);
        }
    }

    public function render()
    {
        // dd($this->answer);
        // dd(in_array($this->exam->questions[1]->id, array_keys($this->answers)));
        if (count($this->exam->questions) > 0) $this->question = $this->exam->questions[$this->index];
        return view('livewire.exam-display');
    }
}
