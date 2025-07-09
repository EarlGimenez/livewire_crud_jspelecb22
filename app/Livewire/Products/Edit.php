<?php

namespace App\Livewire\Products;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;
use Storage;

class Edit extends Component
{
    use WithFileUploads;

    #[Validate('image|max:10240')]
    public $image;
    public $code = '';
    public $name = '';
    public $quantity = '';
    public $price = '';
    public $description = '';
    public $product;
    public function mount(Product $product){
        $this->product = $product;
        $this->quantity = $product->quantity;
        $this->code = $product->code;
        $this->name = $product->name;
        $this->price = $product->price;
        $this->description = $product->description;
        $this->image = $product->fileUrl ? null : $product->fileUrl;
    }
    public function save()
    {
        $this->validate([
            'code' => 'required|string|max:255|unique:products,code,' . $this->product->id,
            'name' => 'required|string|max:255',
            'quantity' => 'required|integer|min:0',
            'price' => 'required|numeric|min:0',
            'description' => 'nullable|string|max:1000',
        ]);

        $imageUrl = $this->image ? $this->image->storePublicly('products', 'public') : $this->product->fileUrl;

        $this->product->update([
            'code' => $this->code,
            'name' => $this->name,
            'quantity' => $this->quantity,
            'price' => $this->price,
            'description' => $this->description,
            'fileUrl'=> Storage::url($imageUrl),
        ]);

        return redirect()->route('livewire.index')->with('success', 'Product updated successfully.');
    }
    public function render()
    {
        return view('livewire.products.edit');
    }
}
