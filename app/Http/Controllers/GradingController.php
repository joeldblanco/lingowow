<?php

namespace App\Http\Controllers;

use App\Models\Attempt;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

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

        $attempts = new LengthAwarePaginator($attempts->groupBy('user_id'), $attempts->groupBy('user_id')->count(), 10);

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
        // $attempts = $user->attempts()->where('score', '!=', null)->get()->groupBy('exam_id');
        // foreach ($attempts as $key => $attempt) {
        //     $attempts[$key] = $attempts[$key]->where('score', $attempt->max('score'))->first();
        // }

        $units = [];
        $attempts = [];
        foreach ($courses as $course) {
            foreach ($course->units() as $unit) {
                if ($unit->exams->where('status', 1)->count()) $units[] = $unit;
                if ($unit->attempts->where('user_id', $user->id)->count() > 0) {
                    $attempts[$unit->id] = $unit->attempts->where('user_id', $user->id)->where('score', $unit->attempts->max('score'))->sortBy('created_at')->first();
                }
            }
        }

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
