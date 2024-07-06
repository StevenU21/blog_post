<?php

namespace App\Livewire\Products;

use App\Livewire\Forms\ProductValidate;
use App\Models\Product;
use App\Rules\ProductValidation;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\Attributes\Validate;

class ProductCreate extends Component
{
    public $product = [
        'name' => '',
        'price' => '',
        'stock' => '',
        'description' => '',
    ];

    protected function rules(): array
    {
        return ProductValidation::rules();
    }

    protected function messages(): array
    {
        return ProductValidation::messages();
    }

    public function save()
    {
        $this->validate();

        Product::create(array_merge($this->product, [
            'slug' => Str::slug($this->product['name']),
        ]));
        $this->dispatch('success', 'Producto creado correctamente.');
        return $this->redirectRoute('products.index');
    }

    public function render()
    {
        return view('livewire.products.product-create');
    }
}
