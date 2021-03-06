<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class Products extends Component
{
    use WithPagination;

    protected $listeners = ['search'];

    public $name, $description, $price, $product_id;
    public $isFormShown = false;
    public $search;
    public $showing = 6;
    public $isDeleteModalShown = false;

    public function render()
    {
        return view(
            'livewire.products',
            [
                'products' => Product::query()
                    ->when($this->search, function ($query) {
                        return $query->where('name', 'like', "%{$this->search}%");
                    })
                    ->paginate($this->showing)
            ]
        );
    }

    public function search($term)
    {
        $this->search = $term;
        $this->resetPage();
    }

    public function showForm()
    {
        $this->isFormShown = true;
    }

    public function hideForm()
    {
        $this->resetForm();
        $this->resetValidation();
        $this->isFormShown = false;
    }

    private function resetForm()
    {
        $this->product_id = null;
        $this->name = '';
        $this->description = '';
        $this->price = '';
    }

    public function saveProduct()
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

    public function deleteConfirmation($id)
    {
        $this->product_id = $id;
        $this->isDeleteModalShown = true;
    }

    public function deleteCancellation()
    {
        $this->product_id = null;
        $this->isDeleteModalShown = false;
    }

    public function delete()
    {
        Product::find($this->product_id)->delete();
        session()->flash('message', 'Product deleted successfully.');

        $this->deleteCancellation();
    }
}
