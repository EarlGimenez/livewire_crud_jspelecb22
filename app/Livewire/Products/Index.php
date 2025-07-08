<?php

namespace App\Livewire\Products;

use App\Models\Product;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        $products = Product::paginate(5);
        return view('livewire.products.index', compact('products'));
    }
}
