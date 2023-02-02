<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class CoursesCarousel extends Component
{

    public $loadingState = false;
    public $course_products, $other_products, $old_courses_products;

    public function selectProduct($product_id)
    {
        $this->emit('showSelectedProduct', $product_id);
    }

    public function render()
    {
        $this->course_products = Product::whereHas('categories', function ($query) {
            $query->where('name', 'course');
        })->get();

        if (in_array(auth()->id(), [6])) {
            $this->old_courses_products = Product::whereHas('categories', function ($query) {
                $query->where('slug', 'like', '%old%')->where('name', 'course');
            })->get();

            foreach ($this->old_courses_products as $old_product) {
                $this->course_products = $this->course_products->diff($old_product->courses->pluck('products')->flatten()->where('id', '!=', $old_product->id));
            }
        }

        $this->other_products = Product::whereDoesntHave('categories', function ($query) {
            $query->where('name', 'course');
        })->get();

        return view('livewire.courses-carousel');
    }
}
