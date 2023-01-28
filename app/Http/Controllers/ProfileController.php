<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
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
        return view('profile.show', compact('id'));
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
    public function update(Request $request, int $id)
    {
        try {
            $request->validate([
                'new_profile_pic' => 'file|mimes:jpg,png,webp|max:10000',
                'first_name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:App\Models\User,email,' . $id,
                'street' => 'required|string|max:100',
                'city' => 'required|string|max:50',
                'zip_code' => 'required|string|max:10',
                'country' => 'required|string|max:50',
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }


        $user = User::find($id);

        $old_profile_pic = explode('/', $user->profile_photo_path);
        $old_profile_pic = explode('.', end($old_profile_pic))[0];
        $new_profile_pic = $request->file('new_profile_pic');
        if ($old_profile_pic == "default_pp") $old_profile_pic = Hash::make($user->id);
        $profile_photo_path = $new_profile_pic == null ? null : $request->file('new_profile_pic')->storeAs('public/profile-photos', $old_profile_pic . '.' . $new_profile_pic->getClientOriginalExtension());
        if ($profile_photo_path != null) $user->profile_photo_path = $profile_photo_path;

        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->street = $request->street;
        $user->city = $request->city;
        $user->zip_code = $request->zip_code;
        $user->country = $request->country;

        $user->save();

        return redirect()->route('profile.show', $user->id);
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
