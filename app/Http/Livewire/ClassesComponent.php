<?php

namespace App\Http\Livewire;

use App\Http\Controllers\ApportionmentController;
use App\Jobs\StudentClassCheck;
use App\Jobs\TeacherClassCheck;
use App\Models\Classes;
use App\Models\Comment;
use App\Models\Enrolment;
use App\Models\User;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;

class ClassesComponent extends Component
{
    use WithPagination;

    public /*$classes, $teachers, $students,*/ $studentClassCheck = "", $teacherClassCheck = "", $comment = "", $current_class, $comments = [], $enrolment, $to_review_classes;

    protected $rules = [
        'comment' => 'required|string|max:500',
    ];

    public function mount()
    {
        if (auth()->user()->getRoleNames()->first() == "student") {
            $this->current_class = User::find(auth()->user()->id)->studentClasses->last();
        } else if (auth()->user()->getRoleNames()->first() == "teacher") {
            $this->current_class = User::find(auth()->user()->id)->teacherClasses->last();
        } else {
            $this->current_class = Classes::all()->last();
        }

        $this->enrolment = Enrolment::withTrashed()->where('id', $this->current_class->enrolment_id)->first();
    }

    public function studentClassCheck($class_id)
    {
        StudentClassCheck::dispatch($class_id);
    }

    public function teacherClassCheck($class_id)
    {
        TeacherClassCheck::dispatch($class_id);
    }

    public function loadComment($id)
    {
        $this->current_class = Classes::find($id);
        $this->enrolment = Enrolment::withTrashed()->where('id', $this->current_class->enrolment_id)->first();

        $this->comment = $this->current_class->comments;

        if ($this->comment == NULL) {
            $this->comment = "";
        }
    }

    public function showClass($id)
    {
        $this->current_class = Classes::find($id);
        $this->enrolment = Enrolment::withTrashed()->where('id', $this->current_class->enrolment_id)->first();
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
        // $this->current_class = "";
    }

    public function previousPeriod()
    {
        $class_period = ApportionmentController::getPeriod($this->current_class->start_date, true);
        $class_period = (new Carbon($class_period[0]))->subMonth();
        $class_period = ApportionmentController::getPeriod($class_period->toDateTimeString(), true);


        if (auth()->user()->getRoleNames()->first() == "student") {
            $period_classes = User::find(auth()->user()->id)->studentClasses->whereBetween('start_date', $class_period);
            if ($period_classes->count() > 0) {
                $this->current_class = User::find(auth()->user()->id)->studentClasses->whereBetween('start_date', $class_period)->last();
            }
        } else if (auth()->user()->getRoleNames()->first() == "teacher") {
            $period_classes = User::find(auth()->user()->id)->teacherClasses->whereBetween('start_date', $class_period);
            if ($period_classes->count() > 0) {
                $this->current_class = User::find(auth()->user()->id)->teacherClasses->whereBetween('start_date', $class_period)->last();
            }
        } else {
            $period_classes = Classes::all()->whereBetween('start_date', $class_period);
            if ($period_classes->count() > 0) {
                $this->current_class = $period_classes->last();
            }
        }

        $this->enrolment = Enrolment::withTrashed()->where('id', $this->current_class->enrolment_id)->first();

        $this->setPage(1);
    }

    public function nextPeriod()
    {
        $class_period = ApportionmentController::getPeriod($this->current_class->start_date, true);
        $class_period = (new Carbon($class_period[0]))->addMonth();
        $class_period = ApportionmentController::getPeriod($class_period->toDateTimeString(), true);


        if (auth()->user()->getRoleNames()->first() == "student") {
            $period_classes = User::find(auth()->user()->id)->studentClasses->whereBetween('start_date', $class_period);
            if ($period_classes->count() > 0) {
                $this->current_class = User::find(auth()->user()->id)->studentClasses->whereBetween('start_date', $class_period)->last();
            }
        } else if (auth()->user()->getRoleNames()->first() == "teacher") {
            $period_classes = User::find(auth()->user()->id)->teacherClasses->whereBetween('start_date', $class_period);
            if ($period_classes->count() > 0) {
                $this->current_class = User::find(auth()->user()->id)->teacherClasses->whereBetween('start_date', $class_period)->last();
            }
        } else {
            $period_classes = Classes::all()->whereBetween('start_date', $class_period);
            if ($period_classes->count() > 0) {
                $this->current_class = $period_classes->last();
            }
        }

        $this->enrolment = Enrolment::withTrashed()->where('id', $this->current_class->enrolment_id)->first();

        $this->setPage(1);
    }

    public function render()
    {
        // $this->teachers = [];
        // $this->students = [];
        $this->to_review_classes = [];
        $role = auth()->user()->roles[0]->name;

        if ($role == "teacher") {
            $classes = User::find(auth()->id())->teacherClasses()->whereBetween('start_date', ApportionmentController::getPeriod($this->current_class->start_date, true))->orderBy('start_date')->paginate(10);
            // $classes = User::find(auth()->id())->teacherClasses->sortBy('start_date', 'ASC')->get();
            // $classes = $classes->sortBy('start_date');
            // foreach ($classes as $key => $value) {
            //     $this->students[$key] = $value->student();
            // }
        } else if ($role == "student") {
            $classes = User::find(auth()->id())->studentClasses()->whereBetween('start_date', ApportionmentController::getPeriod($this->current_class->start_date, true))->orderBy('start_date')->paginate(10);
            // foreach ($classes as $key => $value) {
            //     // $this->teachers[$key] = $value->teacher();
            // }
        } else if ($role == "admin") {
            // dd(ApportionmentController::getPeriod($this->current_class->start_date, true));
            $classes = Classes::whereBetween('start_date', ApportionmentController::getPeriod($this->current_class->start_date, true))->orderBy('start_date')->paginate(10);
            // $classes = $classes->sortBy('start_date');
            foreach ($classes as $key => $value) {
                // $this->students[$key] = $value->student();
                // $this->teachers[$key] = $value->teacher();

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


        return view('livewire.classes-component', [
            'classes' => $classes
        ]);
    }
}
