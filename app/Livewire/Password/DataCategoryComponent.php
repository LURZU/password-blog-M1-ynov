<?php

namespace App\Livewire\Password;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\DataCategory;

class DataCategoryComponent extends Component
{
    use WithPagination;

    public $search = '';
    public $categoryToEdit;

    protected $queryString = ['search'];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function edit($categoryId)
    {
        $this->categoryToEdit = DataCategory::find($categoryId);
        $this->emit('editCategory', $this->categoryToEdit->id);
    }

    public function render()
    {
        $categories = DataCategory::where('name', 'like', '%' . $this->search . '%')->paginate(10);
        return view('livewire.password.data-category-component', compact('categories'));
    }
}
