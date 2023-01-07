<?php

namespace App\Http\Livewire;

use App\Http\Controllers\ApportionmentController;
use App\Models\Course;
use App\Models\Product;
use App\Models\Schedule;
use App\Models\User;
use Livewire\Component;
use Cart;
use Illuminate\Support\Facades\DB;

class TeachersCarousel extends Component
{

    public $selectedTeacher = 7;
    public $loadingState = false;
    protected $listeners = ['loadingState'];

    // public function mount(){
    //     $available_teachers = User::join('model_has_roles',function($join){
    //                             $join->on('users.id','=','model_has_roles.model_id')
    //                                 ->where('model_has_roles.role_id','=','3');
    //                         })->get();

    //     foreach ($available_teachers as $key => $value) {
    //     $available_teachers[$key] = Schedule::where('user_id',$value->id)->where('selected_schedule', '<>', null)->select('user_id')->first();
    //     if($available_teachers[$key] == null){
    //     unset($available_teachers[$key]);
    //     }else{
    //     $available_teachers[$key] = $available_teachers[$key]->user_id;
    //     }
    //     }

    //     $available_teachers = User::find($available_teachers);
    //     $available_teachers = $available_teachers->shuffle();
    //     session(['first_teacher' => $available_teachers[0]->id]);
    //     session(['teacher_id' => $available_teachers[0]->id]);
    //     dd($available_teachers[0]->id);
    // }

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
        // $available_teachers = User::join('model_has_roles', function ($join) {
        //     $join->on('users.id', '=', 'model_has_roles.model_id')
        //         ->where('model_has_roles.role_id', '=', '3');
        // })->get();

        $available_teachers = User::role('teacher')->get()->pluck('schedules')->flatten()->whereNotNull('selected_schedule')->pluck('user');
        // $teachers_schedules = $available_teachers
        // dd($available_teachers, $teachers_schedules);

        // foreach ($available_teachers as $key => $value) {
        //     $available_teachers[$key] = Schedule::where('user_id', $value->id)->where('selected_schedule', '<>', null)->select('user_id')->first();
        //     if ($available_teachers[$key] == null) {
        //         unset($available_teachers[$key]);
        //     } else {
        //         $available_teachers[$key] = $available_teachers[$key]->user_id;
        //     }
        // }

        // $available_teachers = User::find($available_teachers);
        $available_teachers = $available_teachers->shuffle();
        if (count($available_teachers) > 0) {
            session(['first_teacher' => $available_teachers[0]->id]);
            // session(['teacher_id' => $available_teachers[0]->id]);
        }else{
            session()->forget('first_teacher');
        }

        // dd($available_teachers);

        return view('livewire.teachers-carousel', compact('available_teachers'));
    }
}
