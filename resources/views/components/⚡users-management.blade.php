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
    <flux:table.columns>
        <flux:table.column>Nom</flux:table.column>
        <flux:table.column>Email</flux:table.column>
        <flux:table.column>Rôle</flux:table.column>
        <flux:table.column>Actions</flux:table.column>
    </flux:table.columns>

    <flux:table.rows>
        @foreach($users as $user)
            <flux:table.row :key="$user->id">
                <flux:table.cell>{{ $user->name }}</flux:table.cell>
                <flux:table.cell>{{ $user->email }}</flux:table.cell>
                <flux:table.cell>Utilisateur</flux:table.cell>
                
                <flux:table.cell>
                    <div class="flex gap-2">
                        <flux:button variant="ghost" size="sm">Éditer</flux:button>
                        <flux:button variant="danger" size="sm">Supprimer</flux:button>
                    </div>
                </flux:table.cell>
            </flux:table.row>
        @endforeach
    </flux:table.rows>
</flux:table>
    {{ $users->links() }}
</div>