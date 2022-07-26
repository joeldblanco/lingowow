<?php

namespace App\Http\Livewire\Admin\Exams;

use App\Models\Exam;
use App\Models\Question;
use Livewire\Component;

class Show extends Component
{

    public $exam_id, $questions;

    public function moveQuestionUp($questionId)
    {
        $current_question = Question::find($questionId);
        $prev_question = [];
        $exam = Exam::find($this->exam_id);
        
        foreach($exam->questions as $key => $value){
            if($value->id == $questionId){
                $prev_question = Question::find($exam->questions[$key-1]->id);

                $current_question->id = 0;
                $current_question->save();

                $aux = $prev_question->id;
                $prev_question->id = $questionId;
                $prev_question->save();
                
                $current_question = Question::find(0);
                $current_question->id = $aux;
                $current_question->save();
                
                break;
            }
        }

    }

    public function moveQuestionDown($questionId)
    {
        $current_question = Question::find($questionId);
        $next_question = [];
        $exam = Exam::find($this->exam_id);
        
        foreach($exam->questions as $key => $value){
            if($value->id == $questionId){
                $next_question = Question::find($exam->questions[$key+1]->id);

                $current_question->id = 0;
                $current_question->save();

                $aux = $next_question->id;
                $next_question->id = $questionId;
                $next_question->save();
                
                $current_question = Question::find(0);
                $current_question->id = $aux;
                $current_question->save();
                
                break;
            }
        }
    }

    public function render()
    {
        $exam = Exam::find($this->exam_id);
        $this->questions = $exam->questions;

        return view('livewire.admin.exams.show');
    }
}
