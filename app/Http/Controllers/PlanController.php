<?php

namespace App\Http\Controllers;

use App\Models\Feature;
use App\Models\Plan;
use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PlanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $plans = Plan::all();
        return view('plans.index', compact('plans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::all();
        $features = Feature::all();
        return view('plans.create', compact('products', 'features'));
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
            'name' => 'required',
            'classes' => 'required|numeric',
            'product_id' => 'nullable|numeric|exists:App\Models\Product,id',
        ]);

        if (!empty($request->features)) {
            $request->validate(['features' => 'exists:App\Models\Feature,id']);
        }

        if (!empty($request->features_not_included)) {
            $request->validate(['features_not_included' => 'exists:App\Models\Feature,id']);
        }

        $slug = Str::slug($request->name, '-');
        $counter = 1;
        $newSlug = $slug;
        while (Plan::where('slug', $newSlug)->exists()) {
            $newSlug = $slug . '-' . $counter;
            $counter++;
        }

        $plan = Plan::create([
            'name' => $request->name,
            'monthly_classes' => $request->classes,
            'slug' => $newSlug,
            'product_id' => $request->product_id,
        ]);

        if (!empty($request->features)) {
            $features = explode(',', $request->features);
            $plan->features()->attach($features, ['status' => 1]);
        }

        if (!empty($request->features_not_included)) {
            $features_not_included = explode(',', $request->features_not_included);
            $plan->features()->attach($features_not_included, ['status' => 0]);
        }

        return redirect()->route('plans.index')->with('success', 'Plan created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function show(Plan $plan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function edit(Plan $plan)
    {
        $products = Product::all();
        $features = Feature::all();
        return view('plans.edit', compact('plan', 'products', 'features'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Plan $plan)
    {
        $request->validate([
            'name' => 'required',
            'classes' => 'required|numeric',
            'product_id' => 'nullable|numeric|exists:App\Models\Product,id',
        ]);

        if (!empty($request->features)) {
            $request->validate(['features' => 'exists:App\Models\Feature,id']);
        }

        if (!empty($request->features_not_included)) {
            $request->validate(['features_not_included' => 'exists:App\Models\Feature,id']);
        }

        $plan->update([
            'name' => $request->name,
            'monthly_classes' => $request->classes,
            'product_id' => $request->product_id,
        ]);


        $features_included = $request->features ? explode(',', $request->features) : [];
        $features_not_included = $request->features_not_included ? explode(',', $request->features_not_included) : [];

        // Recupera todas las features actualmente asociadas con el plan
        $currently_attached_features = $plan->features->pluck('id')->toArray();

        // Encuentra las features que están en la tabla intermedia pero no en features_included ni en features_not_included
        $features_to_detach = array_diff($currently_attached_features, array_merge($features_included, $features_not_included));

        // Añade o actualiza las features en features_included
        foreach ($features_included as $feature_id) {
            DB::table('feature_plan')->updateOrInsert(
                ['plan_id' => $plan->id, 'feature_id' => $feature_id],
                ['status' => 1]
            );
        }

        // Añade o actualiza las features en features_not_included
        foreach ($features_not_included as $feature_id) {
            DB::table('feature_plan')->updateOrInsert(
                ['plan_id' => $plan->id, 'feature_id' => $feature_id],
                ['status' => 0]
            );
        }

        // Desasocia las features en features_to_detach
        foreach ($features_to_detach as $feature_id) {
            $plan->features()->detach($feature_id);
        }

        return redirect()->route('plans.index')->with('success', 'Plan updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Plan $plan)
    {
        //
    }
}
