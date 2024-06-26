<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Course;
use App\Models\Feature;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();

        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $courses = Course::all();
        $categories = Category::all();
        return view('products.create', compact('courses', 'categories'));
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
            'product_image' => 'image|mimes:jpeg,png,jpg|max:2048',
            'name' => 'required',
            'description' => 'required',
            'regular_price' => 'required|numeric',
            'sale_price' => 'numeric|nullable',
            'course_id' => 'numeric|exists:App\Models\Course,id',
            'status' => 'required|in:1,0'
        ]);

        if ((int) $request->sale_price <= 0) {
            $sale_price = null;
        } else {
            $sale_price = $request->sale_price;
        }

        if (!empty($request->categories)) {
            $request->validate(['categories' => 'exists:App\Models\Category,id']);
        }

        $slug = Str::slug($request->name, '-');
        $counter = 1;
        $newSlug = $slug;
        while (Product::where('slug', $newSlug)->exists()) {
            $newSlug = $slug . '-' . $counter;
            $counter++;
        }

        $image = $request->file('product_image');
        $path_to_file = $image == null ? DB::table('metadata')->where('key', 'sample_image_url')->first()->value : $image->storeAs('public/images/products/covers', str_replace(" ", "_", $newSlug) . '.' . $image->getClientOriginalExtension());
        $product_image = $path_to_file;

        $product = Product::create([
            'name' => $request->name,
            'slug' => $newSlug,
            'description' => $request->description,
            'regular_price' => $request->regular_price,
            'sale_price' => $sale_price,
            'image' => $product_image,
            'status' => $request->status,
        ]);

        if (!empty($request->categories)) {
            $categories = explode(',', $request->categories);
            $product->categories()->attach($categories);
        }

        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $courses = Course::all();
        $categories = Category::all();
        $features = Feature::all();
        return view('products.edit', compact('product', 'courses', 'categories', 'features'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'product_image' => 'image|mimes:jpeg,png,jpg|max:2048',
            'name' => 'required',
            'description' => 'required',
            'regular_price' => 'required|numeric',
            'sale_price' => 'numeric|nullable',
            'status' => 'required|in:1,0',
        ]);

        if (!empty($request->categories)) {
            $request->validate(['categories' => 'exists:App\Models\Category,id']);
        }

        if (!empty($request->courses)) {
            $request->validate(['courses' => 'exists:App\Models\Course,id']);
        }

        if ((int) $request->sale_price <= 0) {
            $sale_price = null;
        } else {
            $sale_price = $request->sale_price;
        }

        $image = $request->file('product_image');
        $path_to_file = $image == null ? $product->image : $image->storeAs('public/images/products/covers', str_replace(" ", "_", $product->slug) . '.' . $image->getClientOriginalExtension());
        $product_image = $path_to_file;

        $product->update([
            'name' => $request->name,
            'description' => $request->description,
            'regular_price' => $request->regular_price,
            'sale_price' => $sale_price,
            'image' => $product_image,
            'status' => $request->status,
        ]);

        if (!empty($request->categories)) {
            $categories = explode(',', $request->categories);
            $product->categories()->sync($categories);
        } else {
            $product->categories()->detach();
        }

        if (!empty($request->courses)) {
            $courses = explode(',', $request->courses);
            $product->courses()->sync($courses);
        } else {
            $product->courses()->detach();
        }

        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->categories()->detach();
        $product->courses()->detach();
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product deleted successfully');
    }
}
