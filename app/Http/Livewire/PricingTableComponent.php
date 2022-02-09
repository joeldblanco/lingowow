<?php

namespace App\Http\Livewire;

use App\Models\Course;
use App\Models\Enrolment;
use App\Models\Product;
use Livewire\Component;
use Cart;
use Illuminate\Support\Facades\DB;

class PricingTableComponent extends Component
{

    protected $listeners = ['showSelectedProduct'];

    public $selectedProduct = 1;
    public $popup = false;
    public $popup_message = "";
    public $popup_color = "";

    public function showSelectedProduct($course_id){
        session(['selected_course' => $course_id]);
        $this->selectedProduct = $course_id;
        $this->emit('loadingState',false);
    }

    public function store($nOfClasses)
    {
        $enroled = Enrolment::where('student_id',auth()->id())
                            // ->where('course_id',session('selected_course'))
                            ->withTrashed()
                            ->first();

        if($enroled != null){
            $deleted = $enroled->trashed();
        }
        
        if($enroled && !$deleted)
        {
            // dd("User already enroled in this course.");
            $this->popup_message = "User already enroled in a course.";
            $this->popup_color = "red";
            $this->popup = true;
        }else{
            session(['plan' => $nOfClasses]);
            redirect()->route("schedule.create");
        }
        
    }

    public function render()
    {
        $product = Course::find($this->selectedProduct)->products->first();

        // dd($this->selectedProduct);

        $plans =  DB::table('plans')
            ->join('plansproducts',function($join) use (&$product){
                $join->on('plans.id','=','plansproducts.plan_id')
                    ->where('plansproducts.product_id','=',$product->id);
            })
        ->get();

        return view('livewire.pricing-table-component')->with(compact('product','plans'));
    }
}
