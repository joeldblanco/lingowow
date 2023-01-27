<?php

namespace App\Http\Livewire;

use App\Http\Controllers\ApportionmentController;
// use App\Jobs\StudentClassCheck;
// use App\Jobs\TeacherClassCheck;
use App\Models\Classes;
use App\Models\Comment;
use App\Models\Enrolment;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Pagination\LengthAwarePaginator;
use Livewire\Component;
use Livewire\WithPagination;

class ClassesComponent extends Component
{
    use WithPagination;

    // public $classes;
    // public $studentClassCheck = "";
    // public $teacherClassCheck = "";
    public $comment = "";
    public $current_class;
    public $comments = [];
    public $enrolment;
    public $to_review_classes;
    public $start_date;
    public $end_date;
    public $classDetails = false;
    // public $sortBy = 'class_date';
    // public $sortDirection = 'asc';


    protected $rules = [
        'comment' => 'required|string|max:500',
    ];

    public function mount()
    {
        $this->start_date = ApportionmentController::currentPeriod(true)[0];
        $this->end_date = ApportionmentController::currentPeriod(true)[1];
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
        $this->classDetails = true;
    }

    public function saveComment()
    {
        $comment = new Comment([
            'commentable_id' => $this->current_class->id,
            'content' => $this->comment,
            'author_id' => auth()->user()->id,
        ]);

        $class = Classes::find($this->current_class->id)->comments()->save($comment);
    }

    public function clearComment()
    {
        $this->comment = "";
    }

    // public function sort($column)
    // {
    //     if ($this->sortBy === $column) {
    //         $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
    //     } else {
    //         $this->sortBy = $column;
    //         $this->sortDirection = 'asc';
    //     }
    // }

    public function render()
    {
        $this->to_review_classes = [];
        if (auth()->user()->roles[0]->name == "teacher") {
            $classes = User::find(auth()->id())->teacherClasses()->where('start_date', '>=', $this->start_date)->where('end_date', '<=', $this->end_date)->orderBy('start_date')->paginate(15);
        } else if (auth()->user()->roles[0]->name == "student") {
            $classes = User::find(auth()->id())->studentClasses()->where('start_date', '>=', $this->start_date)->where('end_date', '<=', $this->end_date)->orderBy('start_date')->paginate(15);
        } else if (auth()->user()->roles[0]->name == "admin") {
            $classes = Classes::where('start_date', '>=', $this->start_date)->where('end_date', '<=', $this->end_date)->orderBy('start_date')->paginate(15);
            foreach ($classes as $key => $value) {
                // $this->students[$key] = $value->student();
                // $this->teachers[$key] = $value->teacher();

                if (empty($value->rating)) {
                    $this->to_review_classes[] = $value->id;
                }
            }
            if (empty($this->to_review_classes)) $this->to_review_classes = [];
        }

        // $this->current_class = $classes->last();
        if ($this->current_class) {
            $this->enrolment = Enrolment::withTrashed()->where('id', $this->current_class->enrolment_id)->first();
        }

        if (is_int($this->current_class)) $this->current_class = Classes::find($this->current_class);

        if (!empty($this->current_class)) {
            $this->current_class = $this->current_class;
            $this->comments = $this->current_class->comments;
        } else {
            $this->comments = [];
        }

        return view('livewire.classes-component', [
            'classes' => $classes,
        ]);
    }
}
