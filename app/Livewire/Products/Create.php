<?php

namespace App\Livewire\Products;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Storage;

class Create extends Component
{
    use WithFileUploads;

    public $image;
    public $code = '';
    public $name = '';
    public $quantity = '';
    public $price = '';
    public $description = '';
    public function save()
    {
        $this->validate([
            'code' => 'required|string|max:255|unique:products,code',
            'name' => 'required|string|max:255',
            'quantity' => 'required|integer|min:0',
            'price' => 'required|numeric|min:0',
            'description' => 'nullable|string|max:1000',
            'image' => 'nullable|image|max:10240'
        ]);

        $imageUrl = null;
        if ($this->image) {
            $imageUrl = $this->image->store('products', 'public');
        }

        Product::create([
            'code' => $this->code,
            'name' => $this->name,
            'quantity' => $this->quantity,
            'price' => $this->price,
            'description' => $this->description,
            'fileUrl' => $imageUrl,
        ]);

        session()->flash('success', 'Product created successfully.');
        $this->redirect(route('livewire.index'), navigate: true);
    }
    public function render()
    {
        return view('livewire.products.create');
    }
}
