<?php

namespace App\Http\Controllers;

use App\Models\Feature;
use Illuminate\Http\Request;

class FeatureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('features.index', [
            'features' => Feature::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('features.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:App\Models\Feature,name',
        ]);

        if (!empty($request->details)) {
            $request->validate([
                'details' => 'string',
            ]);
        }

        if (!empty($request->link)) {
            $request->validate([
                'link' => 'url',
            ]);
        }

        Feature::create([
            'name' => $request->name,
            'details' => $request->details == NULL ? NULL : json_encode([
                'content' => $request->details,
                'link' => $request->link == NULL ? 'null' : $request->link,
            ]),
        ]);

        return redirect()->route('features.index')
            ->with('success', 'Feature created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Feature  $feature
     * @return \Illuminate\Http\Response
     */
    public function show(Feature $feature)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Feature  $feature
     * @return \Illuminate\Http\Response
     */
    public function edit(Feature $feature)
    {
        return view('features.edit', [
            'feature' => $feature,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Feature  $feature
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Feature $feature)
    {
        $request->validate([
            'name' => 'required|unique:App\Models\Feature,name,' . $feature->id,
        ]);

        if (!empty($request->details)) {
            $request->validate([
                'details' => 'string',
            ]);
        }

        if (!empty($request->link)) {
            $request->validate([
                'link' => 'url',
            ]);
        }

        $feature->update([
            'name' => $request->name,
            'details' => $request->details == NULL ? NULL : json_encode([
                'content' => $request->details,
                'link' => $request->link == NULL ? 'null' : $request->link,
            ]),
        ]);

        return redirect()->route('features.index')
            ->with('success', 'Feature updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Feature  $feature
     * @return \Illuminate\Http\Response
     */
    public function destroy(Feature $feature)
    {
        $feature->plans()->detach();

        $feature->delete();

        return redirect()->route('features.index')
            ->with('success', 'Feature deleted successfully');
    }
}
