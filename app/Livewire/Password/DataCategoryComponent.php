<?php

namespace App\Livewire\Password;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\DataCategory;

class DataCategoryComponent extends Component
{

    public $search = '';
    public $categoryToEdit;
    public $newName;
    public $newDescription;

    protected $queryString = ['search'];

    public function create()
    {
        $this->validate([
            'newName' => 'required|string|max:255',
            'newDescription' => 'nullable|string',
        ]);

        auth()->user()->categories()->create([
            'name' => $this->newName,
            'description' => $this->newDescription,
        ]);

        $this->newName = '';
        $this->newDescription = '';
        $this->dispatch('close-create-modal'); // Fermer le modal après création
    }


    public function edit($categoryId)
    {
        $this->categoryToEdit = DataCategory::find($categoryId);
        $this->dispatch('editCategory', $this->categoryToEdit->id);
    }

    public function render()
    {
        // Supposons que `search` est une méthode statique dans le modèle DataCategory
        // qui retourne un Builder, alors vous pouvez continuer à chaîner les appels de méthode
        $query = DataCategory::search($this->search);

        // Si vous voulez filtrer les catégories pour l'utilisateur connecté uniquement
        $query->where('user_id', auth()->id());

        // Finalement, paginez le résultat
        $categories = $query->paginate(10);

        return view('livewire.password.data-category-component', [
            'categories' => $categories,
        ]);
    }

}
