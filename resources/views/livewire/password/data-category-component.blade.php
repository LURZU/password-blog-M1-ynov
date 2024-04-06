<div>
    <!-- Search Bar -->
    <div class="mb-4">
        <input type="text" wire:model="search" placeholder="Recherche..." class="p-2 border rounded">
    </div>

    <!-- Edit/Create Form -->
    <div class="mb-4 p-4 border rounded">
        <div>
            <input type="text" wire:model="name" placeholder="Nom de la catégorie" class="p-2 border rounded w-full mb-2">
            <textarea wire:model="description" placeholder="Description" class="p-2 border rounded w-full mb-2"></textarea>
        </div>
        <div>
            @if($categoryToEdit)
                <button wire:click="update" class="p-2 bg-blue-500 text-white rounded">Mettre à jour</button>
            @else
                <button wire:click="create" class="p-2 bg-green-500 text-white rounded">Créer</button>
            @endif
        </div>
    </div>

    <div x-data="{ showModal: false }">
        <input type="text" wire:model="search" placeholder="Recherche..." class="p-2 border rounded">
        <div class="grid grid-cols-3 gap-4 mt-4">
            @foreach($categories as $category)
                <div class="card border rounded shadow p-4">
                    <h5 class="card-title text-lg font-bold">{{ $category->name }}</h5>
                    <p class="card-text">{{ $category->description }}</p>
                    <button class="btn bg-blue-500 text-white rounded p-2" @click="showModal = true; $wire.edit({{ $category->id }})">Modifier</button>
                    <button wire:click="delete({{ $category->id }})" class="p-1 bg-red-500 text-white rounded">Supprimer</button>
                </div>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="mt-4">
            {{ $categories->links('pagination::bootstrap-4') }}
        </div>

        <!-- Modal de modification -->
        <div x-show="showModal" @edit-category.window="showModal = $event.detail" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full" id="modal">
            <div class="relative top-20 mx-auto p-5 border w-1/3 shadow-lg rounded-md bg-white">
                <div @click.away="showModal = false" class="overflow-hidden">
                    @if($categoryToEdit)
                        @livewire('password.category-edit-form', ['category' => $categoryToEdit], key($categoryToEdit->id))
                    @endif
                </div>
            </div>
        </div>
    </div>


    <!-- Pagination -->
    <div class="mt-4">
        {{ $categories->links('pagination::bootstrap-4') }}
    </div>
</div>
