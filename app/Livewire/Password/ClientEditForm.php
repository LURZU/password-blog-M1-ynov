<?php

namespace App\Livewire\Password;

use App\Models\DataClient;
use Livewire\Component;

class ClientEditForm extends Component
{
    public $client;
    public $name;
    public $phone;
    public $email;
    public $address;

    protected $listeners = ['editClient' => 'handleEditClient'];

    public function mount(DataClient $client)
    {
        $this->client = $client;
        $this->name = $client->name;
        $this->phone = $client->phone;
        $this->email = $client->email;
        $this->address = $client->address;
    }


    public function update()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string',
            'address' => 'required|string',
        ]);

        $this->client->update([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'address' => $this->address,
        ]);

        $this->dispatch('clientUpdated');
        $this->dispatch('close-modal');
    }


    public function render()
    {
        return view('livewire.password.client-edit-form');
    }
}
