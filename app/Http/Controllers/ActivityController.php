<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Unit;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    public $activity;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $activities = Activity::all();
        
        return view('activities.index', compact('activities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // dd("hola");
        return view('livewire.activity-create');
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
     * @param  \App\Models\Activity  $activity
     * @return \Illuminate\Http\Response
     */

    // Activity $activity REVIEW *************************************************
    public function show($activity)
    {
        // dd($id);
        // return view('livewire.activity-create');
        return view('activities.show', compact('activity'));
    }

    public function show_activity($id)
    {
        // dd($id);
        // return view('livewire.activity-create');
        $activity = Activity::find('1');
        $activity_contents = $activity->contents; 
        $detalles = [];

        foreach ($activity_contents as $key => $value) {
            $detalles[] = $value->detalles->first();
        }

        
        return view('course.module.unit.activity.show', compact('id', 'activity', 'detalles'), compact('activity_contents'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function edit(Activity $activity)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Activity $activity)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function destroy(Activity $activity)
    {
        //
    }
}
