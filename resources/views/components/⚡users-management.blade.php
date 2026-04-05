<?php

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

new class extends Component
{
    use WithPagination;

    public $search = '';

    public function updatedSearch()
    {
        $this->resetPage();
    }
};
?>

@php
    $users = App\Models\User::where('name', 'like', '%' . $search . '%')
        ->orWhere('email', 'like', '%' . $search . '%')
        ->paginate(10);
@endphp

<div>
    <h1 class="text-2xl font-bold mb-4">Gestion des Utilisateurs</h1>

    <flux:input placeholder="Rechercher..." wire:model.live="search" />


<flux:table>
    <flux:columns>
        <flux:column>Nom</flux:column>
        <flux:column>Email</flux:column>
        <flux:column>Rôle</flux:column>
        <flux:column>Actions</flux:column>
    </flux:columns>

    <flux:rows>
        @foreach($users as $user)
            <flux:row :key="$user->id">
                <flux:cell>{{ $user->name }}</flux:cell>
                <flux:cell>{{ $user->email }}</flux:cell>
                <flux:cell>Utilisateur</flux:cell>
                
                <flux:cell>
                    <div class="flex gap-2">
                        <flux:button variant="ghost" size="sm">Éditer</flux:button>
                        <flux:button variant="danger" size="sm">Supprimer</flux:button>
                    </div>
                </flux:cell>
            </flux:row>
        @endforeach
    </flux:rows>
</flux:table>
    {{ $users->links() }}
</div>