<div x-data="{ showCreateModal: false, showEditModal: false }">
    <!-- Bouton pour créer un nouveau client -->
    <button @click="showCreateModal = true" class="mb-4 p-2 bg-green-500 text-white rounded">
        Créer un nouveau client
    </button>

    <!-- Modal pour la création d'un nouveau client -->
    <div x-show="showCreateModal"  class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full" x-cloak>
        <div class="relative top-20 mx-auto p-5 border w-1/3 shadow-lg rounded-md bg-white">
            <div @click.away="showCreateModal = false" class="mb-4 p-4 border rounded">
                <input type="text" wire:model="newClient.name" placeholder="Nom" class="p-2 border rounded w-full mb-2">
                <input type="text" wire:model="newClient.email" placeholder="Email" class="p-2 border rounded w-full mb-2">
                <input type="text" wire:model="newClient.phone" placeholder="Téléphone" class="p-2 border rounded w-full mb-2">
                <input type="text" wire:model="newClient.address" placeholder="Adresse" class="p-2 border rounded w-full mb-2">
                <button wire:click="createClient" class="p-2 bg-green-500 text-white rounded">
                    Créer
                </button>
            </div>
        </div>
    </div>

    <!-- Liste des clients -->
    <div class="grid grid-cols-3 gap-4 mt-4">
        @foreach($clients as $client)
            <div class="card border bg-white rounded shadow p-4" wire:key="{{ $client->id }}">
                <h5 class="card-title text-lg font-bold">{{ $client->name }}</h5>
                <p class="card-text">{{ $client->email }}</p>
                <button class="btn bg-blue-500 text-white rounded p-2" @click="showEditModal = true; $wire.edit({{ $client->id }})">
                    Modifier
                </button>
                <button wire:click="deleteClient({{ $client->id }})" class="p-1 bg-red-500 text-white rounded">
                    Supprimer
                </button>
            </div>
        @endforeach
    </div>

    <!-- Modal de modification d'un client -->
    <div x-show="showEditModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full" x-cloak>
        <div class="relative top-20 mx-auto p-5 border w-1/3 shadow-lg rounded-md bg-white">
            <div  @click.away="showEditModal = false" class="mb-4 p-4 border rounded">
                @if($clientToEdit)
                    @livewire('password.client-edit-form', ['client' => $clientToEdit], key($clientToEdit->id))
                @endif
            </div>
        </div>
    </div>
</div>
