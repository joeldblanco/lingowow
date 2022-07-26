<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use App\Models\User;
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

        if ($role == "admin") {
            $unit = Unit::find($id);
        } else {
            $unit = Unit::find($id)->where('status', 1)->first();
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
        //
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
        $admins = $teachers = $students = $guests = [];

        foreach ($users as $user) {
            $role = $user->getRoleNames()->first();
            
            switch ($role) {
                case "admin":
                    $admins[] = $user;
                    break;

                case "teacher":
                    $teachers[] = $user;
                    break;

                case "student":
                    $students[] = $user;
                    break;

                default:
                    $guests[] = $user;
                    break;
            }


        }

        return view('course.module.unit.details', compact('admins', 'teachers', 'students', 'guests', 'users'));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Unit $unit)
    {
        //
    }
}
