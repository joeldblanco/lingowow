<?php

namespace App\Http\Controllers;

use App\Models\Module;
use App\Models\User;
use App\Models\GroupUnit;
use Illuminate\Http\Request;

class ModuleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find(auth()->id());
        $role = $user->roles->first()->name;
        $module = Module::find($id);
        $units_module  = $module->groups;
        //dd($units_module);

        // $units_module = [];
        // $module->groups->each(function($group, $key) use (&$units_module){
        //     $group->units->each(function($unit, $key2) use (&$units_module){
        //         array_push($units_module,$unit);
        //     });
        // });

        // dd($module->groups->count());


        // foreach ($groups as $key => $value) {
        //     // dd(json_decode($value->units()->where('status','1')->get()));
        //     $unit[] = $value->units()->where('status','1')->get();

        // }

        // dd($unit);
        // $units = $module->units->where('status', 1)->sort();

        if ($role == "admin") {
            // $user_units = $module->units;
            $user_units = $units_module;
        } else {
            $user_units = $units_module;
            // $user_units = $user->units->where('status', 1);
            // $user_units = $user_units->diff($user_units->diff($module->units->where('status', 1)));

            // $user_units = $user->units->intersect($units)->sort();
        }

        // $units = $units->diff($user_units);
        // dd($units_module->first()->isPassed);
        // foreach ($units_module->first()->isPassed($user->id) as $key => $value) {
        // dd($units_module->first()->isPassed($user->id)->first()->pivot->nota);
        // }
        // $units = array_diff($units_module,$user_units);
        $units = [];
        // dd($units[0]->exams);
        // dd($units_module, $user_units, $units);
        // dd($user->id);
        return view('course.module.show', compact('user', 'role', 'units', 'user_units'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Module  $module
     * @return \Illuminate\Http\Response
     */
    public function edit(Module $module)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Module  $module
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Module $module)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Module  $module
     * @return \Illuminate\Http\Response
     */
    public function destroy(Module $module)
    {
        //
    }

    static function is_passed($nota, $id)
    {

        if ($nota != null) {

            if (GroupUnit::find($id)->priority == 'FIRST') {
                return true;
            } else {
                $nota = $nota->pivot->nota;
                if ($nota >= 10) {
                    return true;
                } else {
                    return false;
                }
            }
        } else {
            if (GroupUnit::find($id)->priority == 'FIRST') {
                return true;
            } else {
                return false;
            }
        }
    }
}
