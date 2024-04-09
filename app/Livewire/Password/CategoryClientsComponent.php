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
    public $clientToEdit;
    public $editClient = [];
    public $name; // Pour la modification
    public $email; // Pour la modification
    public $address; // Pour la modification
    public $phone; // Pour la modification

    public function mount($categoryId)
    {
        $this->categoryId = $categoryId;

    }

    public function createClient()
    {
        $this->validate([
            'newClient.name' => 'required|string',
            'newClient.email' => 'required|email',
            'newClient.address' => 'required|string',
            'newClient.phone' => 'required|string',
        ]);

        DataClient::create([
            'name' => $this->newClient['name'],
            'email' => $this->newClient['email'],
            'data_category_id' => $this->categoryId,
            'phone' => $this->newClient['phone'] ?? '',
            'address' => $this->newClient['address'] ?? '',
        ]);

        $this->reset(['newClient', 'showCreateModal']);
        $this->showCreateModal = false;
        $this->dispatch('close-create-modal');


        $this->clients = DataClient::where('data_category_id', $this->categoryId)->get();
    }

    public function editClient($clientId)
    {
        $client = DataClient::find($clientId);
        $this->editClient = $client->toArray();
        $this->name = $client->name;
        $this->email = $client->email;
        $this->address = $client->address;
        $this->phone = $client->phone;
        $this->showEditModal = true;
    }

    public function edit($clientId)
    {
        $this->clientToEdit = DataClient::find($clientId);
        $this->dispatch('editClient', $this->clientToEdit->id);

    }

    public function updateClient()
    {
        $this->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'address' => 'required|string',
            'phone' => 'required|string',
        ]);

        $client = DataClient::find($this->editClient['id']);
        $client->update([
            'name' => $this->name,
            'email' => $this->email,
            'address' => $this->address,
            'phone' => $this->phone,
            'data_category_id' => $this->categoryId,
        ]);

        $this->showEditModal = false; // Pour fermer la modale
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
