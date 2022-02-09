<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use App\Models\Question;
use Illuminate\Http\Request;

class ExamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $exams = Exam::all();
        
        return view('admin.exams.index', compact('exams'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $last_exam = Exam::latest()->first();

        if($last_exam == null){
            $last_exam = 1;
        }else{
            $last_exam = $last_exam->id + 1;
        }

        return view('admin.exams.create',compact('last_exam'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $exam = new Exam;
        $exam->save();
        return redirect()->route('exam.show',$exam->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($exam_id)
    {
        $exam = Exam::find($exam_id);
        $questions = $exam->questions;
        return view('admin.exams.show',compact('questions','exam_id'));
    }

    /**
     * Display the exam for users.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function display($exam_id)
    {
        $exam = Exam::find($exam_id);
        $questions = $exam->questions;
        
        return view('exams.display',compact('exam'));
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
