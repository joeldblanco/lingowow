<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SchedulingCalendarController extends Controller
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
        $request->data = explode(',', $request->data);
        $cells = array_chunk($request->data,2);        

        $user = User::find(auth()->id());

        $user->schedule = $cells;
        $user->save();

        return redirect(route('schedule'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function update(Request $request)
    {
        $result = session('plan');

        if($result == "simple"){
            $plan = 2;
        }elseif($result == "regular"){
            $plan = 3;
        }elseif($result == "intensivo"){
            $plan = 4;
        }
        
        return view('calendar-selection', compact('plan'));
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function checkForTeachers(Request $request)
    {
        $request->data = explode(',', $request->data);
        $cells = array_chunk($request->data,2);

        session(['user_schedule' => json_encode($cells)]);

        $teachers = DB::table('users')
                    ->join('model_has_roles',function($join){
                        $join->on('users.id','=','model_has_roles.model_id')
                             ->where('model_has_roles.role_id','=','3');
                    })
                    ->get();

        $available_teachers = [];

        foreach($teachers as $teacher){
            $teacher_schedule = json_decode($teacher->available_schedule);
            $matched_blocks = 0;
            foreach($cells as $cell){
                if(in_array($cell,$teacher_schedule)){
                    $matched_blocks++;
                }
            }

            if($matched_blocks == count($cells)){
                array_push($available_teachers,$teacher);
            }
        }

        return view('teachers-selection',['available_teachers' => $available_teachers]);
        
    }
}
