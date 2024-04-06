<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\DataCategory;

class CategoryEditForm extends Component
{
    public $category;
    public $name;
    public $description;

    public function mount(DataCategory $category)
    {
        $this->category = $category;
        $this->name = $category->name;
        $this->description = $category->description;
    }

    public function update()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $this->category->update([
            'name' => $this->name,
            'description' => $this->description,
        ]);

        $this->emit('categoryUpdated');
        $this->dispatchBrowserEvent('close-modal');
    }


    public function render()
    {
        return view('livewire.category-edit-form');
    }
}
