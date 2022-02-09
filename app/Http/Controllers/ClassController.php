<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\Enrolment;
use App\Models\User;
use Illuminate\Http\Request;

class ClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // $posts = auth()->user()->posts()->orderBy('updated_at', 'DESC');

        // $posts = auth()->user()->posts->sortByDesc('updated_at');
        
        $teachers = [];
        $students = [];

        if(auth()->user()->roles[0]->name == "teacher")
        {
            $classes = User::find(auth()->id())->teacherClasses()->orderBy('start_date', 'ASC')->get();
            // dd($classes);
            foreach ($classes as $key => $value) {
                
                $students[$key] = $value->student();

                if($value->enrolment_id == 2){
                    // dd($students);
                }
            }
        }
        else if(auth()->user()->roles[0]->name == "student")
        {
            
            $classes = User::find(auth()->id())->studentClasses;
            dd($classes);
            foreach ($classes as $key => $value) {
                $teachers[$key] = $value->teacher();
            }
        }else if(auth()->user()->roles[0]->name == "admin")
        {
            $classes = Classes::all()->sortBy('start_date');

            foreach ($classes as $key => $value) {
                $students[$key] = $value->student();
                $teachers[$key] = $value->teacher();
            }
        }


        return view('classes.index', compact('classes','students','teachers'));
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
     * @param  \App\Models\Classes  $classes
     * @return \Illuminate\Http\Response
     */
    public function show(Classes $classes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Classes  $classes
     * @return \Illuminate\Http\Response
     */
    public function edit(Classes $classes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Classes  $classes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Classes $classes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Classes  $classes
     * @return \Illuminate\Http\Response
     */
    public function destroy(Classes $classes)
    {
        //
    }
}
