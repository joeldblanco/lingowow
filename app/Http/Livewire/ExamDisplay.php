<?php

namespace App\Http\Livewire;

use App\Http\Controllers\ExamController;
use App\Models\Attempt;
use Livewire\Component;

class ExamDisplay extends Component
{
    public $exam, $question, $total_questions, $index, $answer, $attempt, $startAttempt, $examContent;
    public $answers = [];

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
        if(auth()->user()->roles[0]->name == "student"){
            $this->attempt = new Attempt;
            $this->attempt->user_id = auth()->id();
            $this->attempt->exam_id = $this->exam->id;
            $this->attempt->save();
        }

        $this->dispatchBrowserEvent('question-changed', [
            'questionIndex' => $this->index,
            'totalQuestions' => $this->total_questions,
        ]);
    }

    public function nextQuestion()
    {
        if($this->index < ($this->total_questions-1)){
            $this->index++;
            $this->question = $this->exam->questions[$this->index];
            $this->dispatchBrowserEvent('question-changed', [
                'questionIndex' => $this->index,
                'totalQuestions' => $this->total_questions,
            ]);
        }else{
            $this->submitExam();
        }
    }

    public function prevQuestion()
    {
        if($this->index > 0) $this->index--;
        $this->question = $this->exam->questions[$this->index];
        $this->dispatchBrowserEvent('question-changed', [
            'questionIndex' => $this->index,
            'totalQuestions' => $this->total_questions,
        ]);
    }

    public function updatedAnswer($answer)
    {
        // array_push($this->answers, $this->index => $answer);
        $this->answers[$this->index] = $answer;
    }

    public function submitExam()
    {
        // ExamController::correct($this->exam->id, $this->answers);
        $this->attempt->data = json_encode(["answers" => $this->answers]);
        $this->attempt->save();
        return redirect()->route('exam.result',$this->attempt->id);
    }
    
    public function render()
    {
        if(count($this->exam->questions) > 0) $this->question = $this->exam->questions[$this->index];
        return view('livewire.exam-display');
    }
}
