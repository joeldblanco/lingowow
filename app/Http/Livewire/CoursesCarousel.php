<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CoursesCarousel extends Component
{

    public function selectProduct($productId){
        $this->emit('showSelectedProduct',$productId);
    }

    public function render()
    {
        return view('livewire.courses-carousel');
    }
}
