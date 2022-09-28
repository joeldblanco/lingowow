<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PostController extends Controller
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
        $user_id = auth()->id();
        $request->validate([
            'post_image' => 'file|mimes:jpg,png,webp|max:10000',
            'post_content' => 'required_if:post_image,No|max:255',
        ]);

        $post_content = $request->post_content;
        $post_image = $request->file('post_image');
        $hashed_user_id = Hash::make($user_id);
        $path_to_file = $post_image == null ? null : $request->file('post_image')->storeAs('public/photos/users/'.$hashed_user_id, time().'.'.$post_image->getClientOriginalExtension());

        $post = new Post;
        $post->author_id = $user_id;
        $post->content = json_encode([
            'text' => $post_content,
            'photo_path' => $path_to_file,
        ]);
        $post->save();

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
