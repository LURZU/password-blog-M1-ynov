<?php

namespace App\Livewire\Password;

use Livewire\Component;
use App\Models\DataCategory;

class CategoryEditForm extends Component
{
    public $category;
    public $name;
    public $description;

    protected $listeners = ['editCategory' => 'handleEditCategory'];

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

        $this->dispatch('categoryUpdated');
        $this->dispatch('close-modal');
    }


    public function render()
    {
        return view('livewire.password.category-edit-form');
    }
}
