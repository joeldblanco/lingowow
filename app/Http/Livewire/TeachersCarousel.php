<?php

namespace App\Http\Livewire;

use App\Http\Controllers\ApportionmentController;
use App\Http\Controllers\MeetingController;
use App\Http\Controllers\ShopController;
use App\Models\Course;
use App\Models\Product;
use App\Models\Schedule;
use App\Models\User;
use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
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

            if (!is_iterable($available_teachers)) {
                $available_teachers = [$available_teachers];
            }

            $this->available_teachers = User::role('teacher')->whereIn('id', $available_teachers)->get()->pluck('schedules')->flatten()->whereNotNull('selected_schedule')->pluck('user');

            // $this->available_teachers = User::role('teacher')->whereIn('id', $available_teachers)->get()->pluck('schedules')->flatten()->where(function ($schedule) {
            //     return !empty($schedule['selected_schedule']);
            // })->pluck('user');
        }

        // $this->available_teachers = $this->available_teachers->shuffle();
        if (count($this->available_teachers) > 0) {
            session(['first_teacher' => $this->available_teachers[0]->id]);
        } else {
            session()->forget('first_teacher');
        }
    }

    // public function saveTeacher($teacher_id)
    // {
    //     Cart::destroy();
    //     $course_id = session('selected_course');

    //     $product = Course::find($course_id)->products->first();

    //     $apportionment = ApportionmentController::calculateApportionment(session('plan'));
    //     $product_qty = $apportionment[0];
    //     // Cart::add($product->id, $product->name, $product_qty, ($product->sale_price == null ? $product->regular_price : $product->sale_price))->associate('App\Models\Product');
    //     ShopController::addToCart($product->id, $product_qty);
    //     session([
    //         'selected_teacher' => $teacher_id,
    //         'course_id' => $course_id,
    //         'classes_dates' => $apportionment[1]
    //     ]);
    //     redirect()->route('cart');
    // }

    public function loadSchedule($teacher_id = 0)
    {
        // dd($teacher_id);
        // if($teacher_id != 0){
        $this->loadingState = true;
        $this->selectedTeacher = $teacher_id;
        session(['teacher_id' => $teacher_id]);
        session(['user_schedule' => json_encode([])]); //Para hacer la precarga del scheduling vacia cada vez que se recarga
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
        if (!is_iterable($this->teachers_ids)) {
            $this->teachers_ids = [$this->teachers_ids];
        }

        $this->available_teachers = new Collection([]);
        $teachersSchedules = User::role('teacher')->whereIn('id', $this->teachers_ids)->get()->pluck('schedules')->flatten();

        foreach ($teachersSchedules as $schedule) {
            if (!empty($schedule->selected_schedule)) {
                if (auth()->id() != 6 && $schedule->user->id == 7) {
                    continue;
                } else {
                    $this->available_teachers->push($schedule->user);
                }
            }
        }

        foreach ($this->available_teachers as $key => $teacher) {
            $request = new Request([
                'teacherId' => $teacher->id,
            ]);

            $inZoom = (new MeetingController)->getZoomUser($request);

            if (!$inZoom) {
                $this->available_teachers->forget($key);
            }
        }

        $this->available_teachers = $this->available_teachers->shuffle();

        if (count($this->available_teachers) > 0) {
            session(['first_teacher' => $this->available_teachers[0]->id]);
        } else {
            session()->forget('first_teacher');
        }

        return view('livewire.teachers-carousel');
    }
}
