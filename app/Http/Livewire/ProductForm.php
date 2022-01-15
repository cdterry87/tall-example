<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class ProductForm extends Component
{
    public $name, $description, $price;

    public $rules = [
        'name' => 'required|min:3',
        'description' => 'required|min:10',
        'price' => 'required|numeric',
    ];

    public function saveProduct()
    {
        $this->validate();

        Product::create([
            'name' => $this->name,
            'description' => $this->description,
            'price' => $this->price,
        ]);

        session()->flash('success_message', 'Product saved successfully!');
        $this->reset();
        return redirect()->route('home');
    }

    public function render()
    {
        return view('livewire.product-form');
    }
}
