<?php

namespace App\Livewire\Password;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\DataClient;

class CategoryClientsComponent extends Component
{
    use WithPagination;

    public $categoryId;
    public $showCreateModal = false;
    public $showEditModal = false;
    public $newClient = [];
    public $editClient = [];
    public $name; // Pour la modification
    public $email; // Pour la modification

    public function mount($categoryId)
    {
        $this->categoryId = $categoryId;
    }

    public function createClient()
    {
        DataClient::create([
            'name' => $this->newClient['name'],
            'email' => $this->newClient['email'],
            'data_category_id' => $this->categoryId,
            // Ajoutez d'autres champs si nécessaire
        ]);
        $this->reset(['newClient', 'showCreateModal']);
    }

    public function editClient($clientId)
    {
        $client = DataClient::find($clientId);
        $this->editClient = $client->toArray();
        $this->name = $client->name;
        $this->email = $client->email;
        $this->showEditModal = true;
    }

    public function updateClient()
    {
        $client = DataClient::find($this->editClient['id']);
        $client->update([
            'name' => $this->name,
            'email' => $this->email,
            // Mettez à jour d'autres champs si nécessaire
        ]);
        $this->showEditModal = false;
    }

    public function deleteClient($clientId)
    {
        DataClient::destroy($clientId);
    }

    public function render()
    {
        $clients = DataClient::where('data_category_id', $this->categoryId)->paginate(10);
        return view('livewire.password.category-clients-component', [
            'clients' => $clients,
        ]);
    }
}
