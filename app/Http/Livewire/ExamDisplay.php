<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ExamDisplay extends Component
{
    public $exam, $question, $total_questions, $index, $answer;
    public $answers = [];

    public function mount()
    {
        $this->index = 0;
        $this->total_questions = count($this->exam->questions);
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
            dd("This is the end.");
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
        $this->answers[$this->index] = $answer;
        dd($this->answers);
    }
    
    public function render()
    {
        $this->question = $this->exam->questions[$this->index];
        return view('livewire.exam-display');
    }
}
