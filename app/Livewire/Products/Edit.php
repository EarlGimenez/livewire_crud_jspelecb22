<?php

namespace App\Livewire\Products;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Storage;

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
    }
    public function save()
    {
        $this->validate([
            'code' => 'required|string|max:255|unique:products,code,' . $this->product->id,
            'name' => 'required|string|max:255',
            'quantity' => 'required|integer|min:0',
            'price' => 'required|numeric|min:0',
            'description' => 'nullable|string|max:1000',
            'image' => 'nullable|image|max:10240'
        ]);

        $imageUrl = $this->product->fileUrl;
        if ($this->image) {
            // Delete old image if it exists
            if ($this->product->fileUrl) {
                Storage::disk('public')->delete($this->product->fileUrl);
            }
            $imageUrl = $this->image->store('products', 'public');
        }

        $this->product->update([
            'code' => $this->code,
            'name' => $this->name,
            'quantity' => $this->quantity,
            'price' => $this->price,
            'description' => $this->description,
            'fileUrl' => $imageUrl,
        ]);

        session()->flash('success', 'Product updated successfully.');
        $this->redirect(route('livewire.index'), navigate: true);
    }
    public function render()
    {
        return view('livewire.products.edit');
    }
}
