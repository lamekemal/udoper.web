<?php

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

new class extends Component
{
    use WithPagination;

    public $search = '';
    public array $roleOptions = ['user', 'admin', 'master', 'financial', 'breeder'];

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function changeRole(int $userId, string $role): void
    {
        if (! in_array($role, $this->roleOptions, true)) {
            return;
        }

        $user = User::findOrFail($userId);
        $user->role = $role;
        $user->save();
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
                <flux:table.cell>
                    <select
                        wire:change="changeRole({{ $user->id }}, $event.target.value)"
                        class="w-full rounded border border-gray-300 bg-white px-2 py-1 text-sm"
                    >
                        @foreach($roleOptions as $roleOption)
                            <option value="{{ $roleOption }}" @selected($user->role === $roleOption)>{{ ucfirst($roleOption) }}</option>
                        @endforeach
                    </select>
                </flux:table.cell>

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