<?php

namespace App\Http\Controllers;

use App\Models\Content;
use Illuminate\Http\Request;

class ContentController extends Controller
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
    public function create(Request $request)
    {
        $type = $request->type;
        $unit_id = $request->unit_id;
        return view('contents.create', compact('type', 'unit_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $content = new Content;
        $content->order = Content::where('unit_id', $request->unit_id)->max('order') + 1;

        if ($request->type == 'url') {
            $content->content = json_encode([
                'type' => $request->type,
                'link_title' => $request->link_title,
                'link_url' => $request->link_url
            ]);
        }

        if ($request->type == 'embeddable') {
            $content->content = json_encode([
                'type' => $request->type,
                'embeddable' => $request->embeddable_data
            ]);
        }

        if ($request->type == 'media') {

            $file = $request->file('media_file');
            $path_to_file = $file == null ? null : $request->file('media_file')->storeAs('public/content/files', time() . '.' . $file->getClientOriginalExtension());

            $content->content = json_encode([
                'type' => $request->type,
                'media_url' => $path_to_file
            ]);
        }
        $content->unit_id = $request->unit_id;
        $content->save();
        return redirect()->route('units.show', ['unit' => $content->unit_id]);
    }

    /**
     * Sort contents in course
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function sort(Request $request)
    {
        $newContentsOrder = json_decode($request->data);
        foreach ($newContentsOrder as $key => $value) {
            if ($value != null) {
                $content = Content::find($key);
                $content->order = (int)$value;
                $content->save();
            }
        }
        return redirect()->route('units.show', $request->unit_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function show(Content $content)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function edit(Content $content)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Content $content)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function destroy(Content $content)
    {
        $unit_id = $content->unit_id;
        $content->delete();
        return redirect()->route('units.show', $unit_id);
    }
}
