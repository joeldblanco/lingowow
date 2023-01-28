<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($role)
    {
        $users = User::withTrashed()->role($role)->orderBy('first_name')->paginate(20);
        return view('admin.users.index', compact('users', 'role'));
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

    public function impersonate($id)
    {
        $user = User::find($id);
        Auth::user()->impersonate($user);

        return redirect()->route('dashboard');
    }

    public function stopImpersonation()
    {
        Auth::user()->leaveImpersonation();

        return redirect()->route('admin.dashboard');
    }

    public function addUnit($user_id, $unit_id)
    {
        $user = User::find($user_id);
        // foreach($units_id as $unit_id){
        // $unit = $user->units()->updateExistingPivot($unit_id, ['unit_id' => $unit_id]);
        $unit = DB::table('unit_user')->where('user_id', $user_id)->update([
            'unit_id' => $unit_id
        ]);
        // dd($unit);
        if (!$unit) $user->units()->attach($unit_id);
        // }
    }

    public function getUser(Request $request)
    {
        $id = $request->id;
        $user = User::find($id);
        return response()->json($user);
    }
}
