<?php

namespace App\Http\Livewire;

use App\Models\Course;
use App\Models\Module;
use Livewire\Component;
use App\Models\Unit;
use Illuminate\Support\Facades\DB;

class EnrolmentEdition extends Component
{
    public $enrolment, $courses, $course, $module, $modules, $units, $unit, $default_course, $default_module, $default_unit;

    protected $rules = [
        'course' => 'required|integer',
        'module' => 'required|integer',
        'unit' => 'required|integer',
    ];

    public function mount($enrolment)
    {
        $this->enrolment = $enrolment;
        $this->courses = Course::all();
        $this->course = $enrolment->course;
        $this->modules = $enrolment->course->modules;
        $this->default_unit = DB::table('unit_user')->where('user_id',$enrolment->student_id)->first()->unit_id;//$this->module->units;
        if($this->default_unit == null){
            $this->default_unit = $this->modules->first()->units->first();
        }else{
            $this->default_unit = Unit::find($this->default_unit);
        }

        $this->default_module = $this->default_unit->module;
        $this->units = $this->default_module->units;

        $this->default_course = $this->course;
        $this->module = $this->default_module->id;
        $this->unit = $this->default_unit->id;
    }

    public function updatedCourse($value)
    {
        $this->modules = Course::find($value)->modules;
        $this->modules->first() == null ? $this->units = [] : $this->units = $this->modules->first()->units;
    }

    public function updatedModule($value)
    {
        $this->units = Module::find($value)->units;
    }

    public function render()
    {
        return view('livewire.enrolment-edition');
    }
}
