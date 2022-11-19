<?php

namespace App\Http\Controllers;

use App\Models\Attempt;
use App\Models\User;
use Illuminate\Http\Request;

class GradingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $attempts = Attempt::where('score', '!=', null)->get()->groupBy('exam_id');
        foreach ($attempts as $key => $attempt) {
            $attempts[$key] = $attempts[$key]->where('score', $attempt->max('score'))->first();
        }

        return view('gradings.index', compact('attempts'));
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
        $user = User::find($id);
        $courses = $user->enrolments->pluck('course');
        $attempts = Attempt::where('user_id', $user->id)->where('score', '!=', null)->get()->groupBy('exam_id');
        foreach ($attempts as $key => $attempt) {
            $attempts[$key] = $attempts[$key]->where('score', $attempt->max('score'))->first();
        }
        $units = [];

        return view('gradings.show', compact('user', 'attempts', 'courses', 'units'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
