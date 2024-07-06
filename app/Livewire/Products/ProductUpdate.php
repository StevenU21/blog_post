<?php

namespace App\Livewire\Products;

use App\Models\Product;
use App\Rules\ProductValidation;
use Livewire\Component;
use Illuminate\Support\Str;

class ProductUpdate extends Component
{
    public Product $product;

    public function mount(Product $product)
    {
        $this->product = $product;
    }

    protected function rules(): array
    {
        return ProductValidation::rules($this->product->id);
    }

    protected function messages(): array
    {
        return ProductValidation::messages();
    }

    public function update()
    {
        $validatedData = $this->validate();

        $this->product->update(array_merge($validatedData['product'], [
            'slug' => Str::slug($this->product->name),
        ]));

        $this->dispatch('success', 'Producto actualizado correctamente.');
        return $this->redirectRoute('products.index');
    }

    public function render()
    {
        return view('livewire.products.product-update');
    }
}
