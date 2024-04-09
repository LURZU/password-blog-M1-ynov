<div>
    <input type="text" wire:model="name" placeholder="Nom" class="p-2 border rounded w-full mb-2">
    <input type="text" wire:model="email" placeholder="Email" class="p-2 border rounded w-full mb-2">
    <input type="text" wire:model="address" placeholder="Note" class="p-2 border rounded w-full mb-2">
    <input type="text" wire:model="phone" placeholder="password" class="p-2 border rounded w-full mb-2">
    <button wire:click="update" class="p-2 bg-blue-500 text-white rounded">
        Mettre à jour
    </button>
</div>
