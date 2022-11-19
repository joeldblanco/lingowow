<?php

namespace App\Http\Controllers;

use App\Models\Module;
use App\Models\Unit;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class UnitController extends Controller
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
        $modules = Module::all();
        return view('course.module.unit.create', compact('modules'));
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

        if ($role == "admin") {
            $unit = Unit::findOrFail($id);
        } else {
            $unit = Unit::findOrFail($id)->where('status', 1)->first();
        }

        return view('course.module.unit.show', compact('unit'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function edit(Unit $unit)
    {
        $modules = Module::all();
        return view('course.module.unit.edit', compact('modules', 'unit'));
    }

    /**
     * Show the details of the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function details($unit_id)
    {
        $unit = Unit::find($unit_id);
        $users = $unit->users;

        return view('course.module.unit.details', compact('users','unit_id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Unit $unit)
    {
        $image = $request->file('image');
        $path_to_file = $image == null ? 'images/image_preview.png' : $request->file('image')->storeAs('public/images/units/covers', $unit->id . '.' . $image->getClientOriginalExtension());
        $unit->update([
            "module_id" => $request->module_id,
            "name" => $request->name,
            "status" => $request->status,
            'image' => $path_to_file,
        ]);

        return redirect()->route('modules.details', $unit->module_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Unit $unit)
    {
        $module_id = $unit->module->id;
        $unit->delete();

        return redirect()->route('modules.details', $module_id);
    }

    /**
     * Sort units in module
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function sort(Request $request)
    {
        $newUnitsOrder = json_decode($request->data);
        foreach ($newUnitsOrder as $key => $value) {
            if ($value != null) {
                $unit = Unit::find($key);
                $unit->order = (int)$value;
                $unit->save();
            }
        }
        return redirect()->route('modules.details', $request->module_id);
    }
}
