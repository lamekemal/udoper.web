<!-- resources/views/components/gaps.blade.php -->
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


<div>
    <h1 class="text-2xl font-bold mb-4">Gestion des Droits d'adhesion et Part sociale</h1>

    <flux:input placeholder="Rechercher..." wire:model.live="search" />

    <p class="text-sm text-gray-500">Page vierge pour la route /gaps.</p>

</div>
