<div x-data="{ showCreateModal: false, showEditModal: false }">
        <!-- Bouton pour créer un nouveau client -->
        <button @click="showCreateModal = true" class="mb-4 p-2 bg-green-500 text-white rounded">
            Créer un nouveau client
        </button>

        <!-- Modal pour la création d'un nouveau client -->
        <div x-show="showCreateModal" @click.away="showCreateModal = false" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full" x-cloak>
            <div class="relative top-20 mx-auto p-5 border w-1/3 shadow-lg rounded-md bg-white">
                <div class="mb-4 p-4 border rounded">
                    <input type="text" wire:model="newClient.name" placeholder="Nom du client" class="p-2 border rounded w-full mb-2">
                    <input type="text" wire:model="newClient.email" placeholder="Email du client" class="p-2 border rounded w-full mb-2">
                    <button wire:click="createClient" class="p-2 bg-green-500 text-white rounded">
                        Créer
                    </button>
                </div>
            </div>
        </div>

        <!-- Liste des clients -->
        <div class="grid grid-cols-3 gap-4 mt-4">
            @foreach($clients as $client)
                <div class="card border rounded shadow p-4" wire:key="{{ $client->id }}">
                    <h5 class="card-title text-lg font-bold">{{ $client->name }}</h5>
                    <p class="card-text">{{ $client->email }}</p>
                    <button class="btn bg-blue-500 text-white rounded p-2" @click="showEditModal = true; $wire.editClient({{ $client->id }})">
                        Modifier
                    </button>
                    <button wire:click="deleteClient({{ $client->id }})" class="p-1 bg-red-500 text-white rounded">
                        Supprimer
                    </button>
                </div>
            @endforeach
        </div>

        <!-- Modal de modification d'un client -->
        <div x-show="showEditModal" @click.away="showEditModal = false" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full" x-cloak>
            <div class="relative top-20 mx-auto p-5 border w-1/3 shadow-lg rounded-md bg-white">
                <div class="mb-4 p-4 border rounded">
                    <input type="text" wire:model="editClient.name" placeholder="Nom du client" class="p-2 border rounded w-full mb-2">
                    <input type="text" wire:model="editClient.email" placeholder="Email du client" class="p-2 border rounded w-full mb-2">
                    <button wire:click="updateClient" class="p-2 bg-blue-500 text-white rounded">
                        Mettre à jour
                    </button>
                </div>
            </div>
        </div>
    </div>
