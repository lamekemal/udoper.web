<?php

use App\Models\Breeder;
use Livewire\Component;

new class extends Component
{
    public $totalBreeders;
    public $activeBreeders; // Supposons qu'il y ait un champ pour l'activité

    public function mount()
    {
        $this->totalBreeders = Breeder::count();
        $this->activeBreeders = Breeder::where('created_at', '>=', now()->subMonth())->count(); // Exemple
    }
};
?>

<div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
    <div class="grid auto-rows-min gap-4 md:grid-cols-3">
        <div class="relative aspect-video overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700 p-4">
            <h3 class="text-lg font-semibold">Total Éleveurs</h3>
            <p class="text-3xl font-bold">{{ $totalBreeders }}</p>
        </div>
        <div class="relative aspect-video overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700 p-4">
            <h3 class="text-lg font-semibold">Éleveurs Actifs</h3>
            <p class="text-3xl font-bold">{{ $activeBreeders }}</p>
        </div>
        <div class="relative aspect-video overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700 p-4">
            <h3 class="text-lg font-semibold">Autres Stats</h3>
            <p class="text-3xl font-bold">0</p>
        </div>
    </div>
    <div class="relative h-full flex-1 overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700 p-4">
        <h3 class="text-lg font-semibold">Graphique ou autres infos</h3>
        <!-- Placeholder pour graphique -->
    </div>
</div>