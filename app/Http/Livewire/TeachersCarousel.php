<?php

namespace App\Http\Livewire;

use App\Http\Controllers\ApportionmentController;
use App\Models\Course;
use App\Models\Product;
use App\Models\Schedule;
use App\Models\User;
use Livewire\Component;
use Cart;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

class TeachersCarousel extends Component
{

    public $selectedTeacher = 7;
    public $loadingState = false;
    public $available_teachers;
    public $teachers_ids;
    protected $listeners = ['loadingState'];

    public function mount($available_teachers = null)
    {
        if ($available_teachers == null) {
            $this->available_teachers = new Collection([]);
            $this->available_teachers = User::role('teacher')->get()->pluck('schedules')->flatten()->whereNotNull('selected_schedule')->pluck('user');
            $this->teachers_ids = $this->available_teachers->pluck('id');
        } else {
            $this->teachers_ids = $available_teachers;
            if (!is_array($available_teachers)) {
                $available_teachers = [$available_teachers];
            }
            $this->available_teachers = User::role('teacher')->whereIn('id', $available_teachers)->get()->pluck('schedules')->flatten()->whereNotNull('selected_schedule')->pluck('user');
        }

        $this->available_teachers = $this->available_teachers->shuffle();
        if (count($this->available_teachers) > 0) {
            session(['first_teacher' => $this->available_teachers[0]->id]);
        } else {
            session()->forget('first_teacher');
        }
    }

    public function saveTeacher($teacher_id)
    {
        Cart::destroy();
        $course_id = session('selected_course');

        $product = Course::find($course_id)->products->first();

        $apportionment = ApportionmentController::calculateApportionment(session('plan'));
        $product_qty = $apportionment[0];

        Cart::add($product->id, $product->name, $product_qty, ($product->sale_price == null ? $product->regular_price : $product->sale_price))->associate('App\Models\Product');
        session([
            'selected_teacher' => $teacher_id,
            'course_id' => $course_id,
            'classes_dates' => $apportionment[1]
        ]);
        redirect()->route('cart');
    }

    public function loadSchedule($teacher_id = 0)
    {
        // dd($teacher_id);
        // if($teacher_id != 0){
        $this->loadingState = true;
        $this->selectedTeacher = $teacher_id;
        session(['teacher_id' => $teacher_id]);
        session(['user_schedule' => []]); //Para hacer la precarga del scheduling vacia cada vez que se recarga
        $this->emit('loadSelectingSchedule', $teacher_id);
        // }
        // dd($this->emit('loadSchedule', $teacher_id));
    }

    public function loadingState($state)
    {
        $this->loadingState = $state;
    }

    public function render()
    {
        // dd($this->teachers_ids);
        if (!is_iterable($this->teachers_ids)) {
            $this->teachers_ids = [$this->teachers_ids];
        }
        $this->available_teachers = new Collection([]);
        $this->available_teachers = User::role('teacher')->whereIn('id', $this->teachers_ids)->get()->pluck('schedules')->flatten()->whereNotNull('selected_schedule')->pluck('user');

        $this->available_teachers = $this->available_teachers->shuffle();
        if (count($this->available_teachers) > 0) {
            session(['first_teacher' => $this->available_teachers[0]->id]);
        } else {
            session()->forget('first_teacher');
        }

        return view('livewire.teachers-carousel');
    }
}
