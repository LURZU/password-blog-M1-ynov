<div x-data="{ showCreateModal: false, showEditModal: false }">
    <button @click="showCreateModal = true" class="mb-4 p-2 bg-blue-800 text-white rounded flex items-center">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
        </svg>
        Créer une nouvelle catégorie
    </button>

    <!-- Modal pour la création -->
    <div x-show="showCreateModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full z-50" x-cloak>
        <div class="relative top-20 mx-auto p-5 border w-1/3 shadow-lg rounded-md bg-white">
            <div @click.away="showCreateModal = false" class="overflow-hidden">
                <div class="mb-4 p-4 border rounded">
                    <input type="text" wire:model="newName" placeholder="Nom de la catégorie" class="p-2 border rounded w-full mb-2">
                    <textarea wire:model="newDescription" placeholder="Description" class="p-2 border rounded w-full mb-2"></textarea>
                    <button wire:click="create" class="p-2 bg-blue-800 text-white rounded">
                        Créer
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Search Bar -->
    <div class="mb-4">
        <input type="text" wire:model.live="search" placeholder="Recherche..." class="p-2 border rounded">
        <p class="italic text-xs">Search term: {{ $search }}</p>
    </div>

    <!-- Liste des catégories -->
    <div class="grid grid-cols-3 gap-4 mt-4">
        @foreach($categories as $category)

            <div class="card relative border rounded shadow p-4 bg-white z-0" wire:key="{{$category->id}}">

                <h5 class="card-title text-lg font-bold">{{ $category->name }}</h5>
                <p class="card-text">{{ $category->description }}</p>
                <div class="flex">
                    <a class="btn bg-blue-500 text-white rounded p-2 mt-5 mr-4 flex items-center z-50 relative bottom-0 right-0" href="{{ route('dashboard.clients', ['categoryId' => $category->id]) }}">
                        Accéder
                    </a>
                    <button class="btn bg-blue-500 text-white rounded p-2 mt-5 flex items-center z-50 relative bottom-0 right-0" @click="showEditModal = true; $wire.edit({{ $category->id }})">
                        Modifier
                    </button>
                </div>
                <button wire:click="delete({{ $category->id }})" class="absolute top-1 right-1 p-1 bg-red-500 text-white rounded flex items-center justify-center ">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>

            </div>
        @endforeach
    </div>

    <!-- Pagination -->
    <div class="mt-4">
        {{ $categories->links('pagination::bootstrap-4') }}
    </div>

    <!-- Modal de modification -->
    <div x-show="showEditModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full" x-cloak>
        <div class="relative top-20 mx-auto p-5 border w-1/3 shadow-lg rounded-md bg-white">
            <div @click.away="showEditModal = false" class="overflow-hidden">
                @if($categoryToEdit)
                    @livewire('password.category-edit-form', ['category' => $categoryToEdit], key($categoryToEdit->id))
                @endif
            </div>
        </div>
    </div>
</div>
