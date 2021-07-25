<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Cart;

class TeachersCarousel extends Component
{

    public $available_teachers = [];

    public function mount($teachers)
    {
        $this->available_teachers = $teachers;
    }

    public function save($product_id, $product_name, $product_qty, $product_price)
    {
        Cart::add($product_id, $product_name, $product_qty, $product_price)->associate('App\Models\Product');
        // redirect()->route('cart');
        redirect()->route('checkout');
    }

    public function render()
    {
        return view('livewire.teachers-carousel');
    }
}
