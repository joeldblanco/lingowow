<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use Cart;
use Illuminate\Support\Facades\DB;

class PricingTableComponent extends Component
{

    protected $listeners = ['showSelectedProduct'];

    private $selectedProduct = 1;

    public function showSelectedProduct($productId){
        $this->selectedProduct = $productId;
    }

    public function store($nOfClasses)
    {
        session(['plan' => $nOfClasses]);
        redirect()->route("schedule.update");
    }

    public function render()
    {
        $product = Product::where('id',$this->selectedProduct)->get();
        $plans =  DB::table('plans')
            ->join('plansproducts',function($join) use (&$product){
                $join->on('plans.id','=','plansproducts.plan_id')
                    ->where('plansproducts.product_id','=',$product[0]->id);
            })
            ->get();

        return view('livewire.pricing-table-component')->with(compact('product','plans'));
    }
}
