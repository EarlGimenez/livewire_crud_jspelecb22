<?php

namespace App\Livewire\Products;

use App\Models\Product;
use Livewire\Component;

class Index extends Component
{   
    public $product;
    public $productId;
    public function delete(Product $product)
    {
        $this->productId = $product->id;
        
        Product::find($this->productId)->delete();
    
        session()->flash('success', 'Product deleted successfully.');
        $this->redirect(route('livewire.index'), navigate: true);
    }
    public function render()
    {
        $products = Product::paginate(5);
        return view('livewire.products.index', compact('products'));
    }
}
