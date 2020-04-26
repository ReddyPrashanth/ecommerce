<?php

namespace App\Http\Livewire;

use App\Product;
use Livewire\Component;

class ProductSearch extends Component
{

    public $search = '';

    public function render()
    {
        $products = collect();

        if(strlen($this->search) > 2){
            $products = Product::where('name','like', $this->search.'%')
                                ->orWhere('slug', 'like', $this->search.'%')
                                ->orWhere('details', 'like', $this->search.'%')
                                ->take(7)->get();
        }               

        return view('livewire.product-search', [
            'products' => $products
        ]);
    }
}
