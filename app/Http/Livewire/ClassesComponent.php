<?php

namespace App\Http\Livewire;

use App\Models\Classes;
use App\Models\Comment;
use App\Models\User;
use Livewire\Component;

class ClassesComponent extends Component
{
    public $classes, $teachers, $students, $studentClassCheck = "", $teacherClassCheck = "", $loadingState = false, $comment = "", $current_class, $comments = "";

    protected $rules = [
        'comment' => 'required|string|max:500',
    ];

    public function studentClassCheck($class_id)
    {

        if(auth()->user()->roles[0]->name == "student" || auth()->user()->roles[0]->name == "admin")
        {
            $this->loadingState = true;
            
            $student_check = Classes::select('student_check')->where('id',$class_id)->first()->student_check;
            $student_check = intval(!$student_check);
            try {
                Classes::select('student_check')->where('id',$class_id)->update(['student_check' => $student_check]);
            } catch (\Throwable $th) {
                dd($th->getCode());
            }

            $this->loadingState = false;
        }
    }

    public function teacherClassCheck($class_id)
    {
        if(auth()->user()->roles[0]->name == "teacher" || auth()->user()->roles[0]->name == "admin")
        {
            $this->loadingState = true;
            
            $teacher_check = Classes::select('teacher_check')->where('id',$class_id)->first()->teacher_check;
            $teacher_check = intval(!$teacher_check);
            try {
                Classes::select('teacher_check')->where('id',$class_id)->update(['teacher_check' => $teacher_check]);
            } catch (\Throwable $th) {
                dd($th->getCode());
            }

            $this->loadingState = false;
        }
    }

    public function loadComment($id){
        $this->current_class = $id;
        $this->comment = Classes::where('id',$this->current_class)->first()->comments;
        // dd($this->comments);
        
        if($this->comment == NULL){
            $this->comment = "";
        }
    }

    public function saveComment(){
        $this->loadingState = true;

        // $class_comment = Comment::where('claid',$this->current_class)->first();
        // $class_comment->comments = $this->comment;
        
        // if($class_comment->comments == "")
        //     $class_comment->comments = NULL;
        // $class_comment->save();

        Comment::create([
            'class_id' => $this->current_class,
            'comment' => $this->comment,
        ]);

        $this->loadingState = false;
    }

    public function clearComment(){
        $this->comment = "";
        $this->current_class = "";
    }

    public function render()
    {
        $this->teachers = [];
        $this->students = [];

        if(auth()->user()->roles[0]->name == "teacher")
        {
            $classes = User::find(auth()->id())->teacherClasses()->orderBy('start_date', 'ASC')->get();
            foreach ($classes as $key => $value) {
                $this->students[$key] = $value->student();
            }
        }
        else if(auth()->user()->roles[0]->name == "student")
        {
            
            $classes = User::find(auth()->id())->studentClasses;
            foreach ($classes as $key => $value) {
                $this->teachers[$key] = $value->teacher();
            }
        }else if(auth()->user()->roles[0]->name == "admin")
        {
            $classes = Classes::all();
            foreach ($classes as $key => $value) {
                $this->students[$key] = $value->student();
                $this->teachers[$key] = $value->teacher();
            }
        }

        $this->comments = Classes::find($this->current_class);
        if($this->comments != NULL){
            $this->comments = $this->comments->comments;
        }else{
            $this->comments = [];
        }
        
        return view('livewire.classes-component');
    }
}
