<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;

class Products extends Component
{
    public $products;
    public $name, $description, $price, $product_id;
    public $isFormShown = 0;

    public function render()
    {
        $this->products = Product::all();
        return view('livewire.products');
    }

    public function create()
    {
        $this->resetForm();
        $this->showForm();
    }

    public function showForm()
    {
        $this->isFormShown = true;
    }

    public function hideForm()
    {
        $this->isFormShown = false;
    }

    private function resetForm()
    {
        $this->name = '';
        $this->description = '';
        $this->price = '';
    }

    public function store()
    {
        $this->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
        ]);

        Product::updateOrCreate(['id' => $this->product_id], [
            'name' => $this->name,
            'description' => $this->description,
            'price' => $this->price,
        ]);

        session()->flash('message', $this->product_id ? 'Product updated successfully.' : 'Product created successfully.');

        $this->hideForm();
        $this->resetForm();
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $this->product_id = $id;
        $this->name = $product->name;
        $this->description = $product->description;
        $this->price = $product->price;

        $this->showForm();
    }

    public function delete($id)
    {
        Product::find($id)->delete();
        session()->flash('message', 'Product deleted successfully.');
    }
}
