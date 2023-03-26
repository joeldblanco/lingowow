<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ProductsCarousel extends Component
{

    public $loadingState = false;
    public $course_products, $other_products, $old_courses_products;

    public function selectProduct($product_id)
    {
        $this->emit('showSelectedProduct', $product_id);
    }

    public function render()
    {
        if (auth()->user()->hasRole('admin')) {
            $this->course_products = Product::whereHas('categories', function ($query) {
                $query->where('name', 'course')->orWhere('name', 'test');
            })->get();
        } else {
            $old_customers = json_decode(DB::table('metadata')->where('key', 'old_customers')->first()->value);
            if (in_array(auth()->id(), $old_customers)) {
                $this->course_products = Product::whereHas('categories', function ($query) {
                    $query->where('name', 'course')->orWhere('name', 'test');
                })->get();

                $this->old_courses_products = Product::whereHas('categories', function ($query) {
                    $query->where('slug', 'like', '%old%')->where('name', 'course')->orWhere('name', 'test');
                })->get();

                foreach ($this->old_courses_products as $old_product) {
                    $this->course_products = $this->course_products->diff($old_product->courses->pluck('products')->flatten()->where('id', '!=', $old_product->id));
                }
            } else {
                $this->course_products = Product::whereHas('categories', function ($query) {
                    $query->where('name', 'course')->orWhere('name', 'test');
                })->get();
                
                $this->course_products = $this->course_products->reject(function ($model) {
                    return str_contains($model->slug, 'old');
                });
                // dd($this->course_products, "Hola");
            }
        }

        $this->other_products = Product::whereDoesntHave('categories', function ($query) {
            $query->where('name', 'course');
        })->get();

        $this->course_products = $this->course_products->sortBy('id');
        $this->other_products = $this->other_products->sortBy('id');

        return view('livewire.products-carousel');
    }
}
