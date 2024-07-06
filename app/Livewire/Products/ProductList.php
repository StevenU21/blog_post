<?php

namespace App\Livewire\Products;

use App\Models\Product;
use Livewire\Attributes\On;
use Livewire\Component;

class ProductList extends Component
{
    public $products;

    #[On('delete')]
    public function mount()
    {
        $this->products = Product::latest()->get();
    }

    public function delete($id)
    {
        Product::destroy($id);
        $this->dispatch('delete', 'Producto eliminado correctamente');
    }

    public function render()
    {
        return view('livewire.products.product-list');
    }
}
