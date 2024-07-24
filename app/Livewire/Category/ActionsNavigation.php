<?php

namespace App\Livewire\Category;

use Livewire\Component;

class ActionsNavigation extends Component
{
    public $category;

    public function mount($category)
    {
        $this->category = $category;
    }

    public function render()
    {
        return view('livewire.category.actions-navigation');
    }
}
