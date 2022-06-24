<?php

namespace App\Http\Livewire;

use App\Models\Classes;
use App\Models\Comment;
use App\Models\Enrolment;
use App\Models\User;
use Livewire\Component;

class ClassesComponent extends Component
{
    public $classes, $teachers, $students, $studentClassCheck = "", $teacherClassCheck = "", $comment = "", $current_class, $comments = [], $enrolment, $to_review_classes;

    protected $rules = [
        'comment' => 'required|string|max:500',
    ];

    public function studentClassCheck($class_id)
    {
        if (auth()->user()->roles[0]->name == "student" || auth()->user()->roles[0]->name == "admin") {
            $student_check = Classes::select('student_check')->where('id', $class_id)->first()->student_check;
            $student_check = intval(!$student_check);
            try {
                $class = Classes::find($class_id);
                $class->student_check = $student_check;
                $class->save();
            } catch (\Throwable $th) {
                dd($th->getCode());
            }
        }
    }

    public function teacherClassCheck($class_id)
    {
        if (auth()->user()->roles[0]->name == "teacher" || auth()->user()->roles[0]->name == "admin") {
            $teacher_check = Classes::select('teacher_check')->where('id', $class_id)->first()->teacher_check;
            $teacher_check = intval(!$teacher_check);
            try {
                Classes::where('id', $class_id)->update(['teacher_check' => $teacher_check]);
            } catch (\Throwable $th) {
                dd($th->getCode());
            }
        }
    }

    public function loadComment($id)
    {
        $this->enrolment = Enrolment::find(Classes::find($id)->enrolment_id);
        $this->current_class = $id;
        $this->comment = Classes::find($id)->comments;

        if ($this->comment == NULL) {
            $this->comment = "";
        }
    }

    public function showClass($id)
    {
        $this->current_class = Classes::find($id);
        $this->enrolment = Enrolment::find($this->current_class->enrolment_id);
    }

    public function saveComment()
    {

        // $class_comment = Comment::where('claid',$this->current_class)->first();
        // $class_comment->comments = $this->comment;

        // if($class_comment->comments == "")
        //     $class_comment->comments = NULL;
        // $class_comment->save();

        Comment::create([
            'class_id' => $this->current_class->id,
            'comment' => $this->comment,
        ]);
    }

    public function clearComment()
    {
        $this->comment = "";
        $this->current_class = "";
    }

    public function render()
    {
        $this->teachers = [];
        $this->students = [];
        $this->to_review_classes = [];
        $role = auth()->user()->roles[0]->name;

        if ($role == "teacher") {
            $this->classes = User::find(auth()->id())->teacherClasses;
            // $this->classes = User::find(auth()->id())->teacherClasses()->orderBy('start_date', 'ASC')->get();
            $this->classes = $this->classes->sortBy('start_date');
            foreach ($this->classes as $key => $value) {
                $this->students[$key] = $value->student();
            }
        } else if ($role == "student") {
            $this->classes = User::find(auth()->id())->studentClasses;
            $this->classes = $this->classes->sortBy('start_date');
            foreach ($this->classes as $key => $value) {
                $this->teachers[$key] = $value->teacher();
            }
        } else if ($role == "admin") {
            $this->classes = Classes::all();
            $this->classes = $this->classes->sortBy('start_date');
            foreach ($this->classes as $key => $value) {
                $this->students[$key] = $value->student();
                $this->teachers[$key] = $value->teacher();

                if (!$value->student_check || !$value->teacher_check) {
                    $this->to_review_classes[] = $value->id;
                }
            }
        }

        if (is_int($this->current_class)) $this->current_class = Classes::find($this->current_class);

        if ($this->current_class != NULL) {
            $this->current_class = $this->current_class;
            $this->comments = $this->current_class->comments;
        } else {
            $this->comments = [];
        }

        // dd($this->comments, $this->current_class);

        return view('livewire.classes-component');
    }
}
