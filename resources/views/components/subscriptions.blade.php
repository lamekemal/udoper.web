<!-- resources/views/components/subscriptions.blade.php -->
<?php

use App\Models\Breeder as BreederModel;
use App\Models\BreederDue as BreederDueModel;
use Illuminate\Support\Carbon as CarbonSupport;
use Livewire\Component as LivewireComponent;
use Livewire\WithPagination as LivewireWithPagination;

new class extends LivewireComponent
{
    use LivewireWithPagination;

    public ?int $selectedBreederId = null;
    public string $selectedBreederName = '';
    public string $search = '';
    public string $payment_date = '';
    public int $amount = 2000;
    public bool $showPaymentModal = false;

    public function updatedSearch(): void
    {
        $this->resetPage();
    }

    public function recordPayment(int $breederId): void
    {
        $breeder = BreederModel::findOrFail($breederId);

        $this->selectedBreederId = $breeder->id;
        $this->selectedBreederName = $breeder->full_name;
        $this->payment_date = now()->format('Y-m-d');
        $this->amount = 2000;
        $this->showPaymentModal = true;
    }

    public function savePayment(): void
    {
        $this->validate([
            'selectedBreederId' => 'required|integer|exists:breeders,id',
            'payment_date' => 'required|date',
            'amount' => 'required|integer|min:0',
        ]);

        $breeder = BreederModel::findOrFail($this->selectedBreederId);

        $paymentDate = CarbonSupport::parse($this->payment_date);

        $breeder->dues()->create([
            'type' => BreederDueModel::TYPE_SUBSCRIPTION,
            'amount' => $this->amount,
            'payment_date' => $paymentDate->toDateString(),
            'valid_until' => BreederDueModel::calculateValidUntil(BreederDueModel::TYPE_SUBSCRIPTION, $paymentDate)->toDateString(),
        ]);

        $this->showPaymentModal = false;
        $this->selectedBreederId = null;
        $this->selectedBreederName = '';

        session()->flash('success', 'Paiement de cotisation enregistré avec succès.');
    }

    public function closePaymentModal(): void
    {
        $this->showPaymentModal = false;
    }
};
?>

<div>
    <div class="flex flex-col gap-4 lg:flex-row lg:items-center lg:justify-between mb-4">
        <div>
            <h1 class="text-2xl font-bold">{{ __('Gestion des Cotisations') }}</h1>
            <p class="text-sm text-slate-500">{{ __('Suivez les cotisations annuelles et marquez les paiements.') }}</p>
        </div>

        <flux:input placeholder="Rechercher..." wire:model.live="search" class="max-w-sm" />
    </div>

    @if (session()->has('success'))
        <div class="rounded-lg border border-emerald-200 bg-emerald-50 px-4 py-3 text-emerald-800 mb-4">
            {{ session('success') }}
        </div>
    @endif

    <flux:table>
        <flux:table.columns>
            <flux:table.column>{{ __('Éleveur') }}</flux:table.column>
            <flux:table.column>{{ __('Email') }}</flux:table.column>
            <flux:table.column>{{ __('N° Éleveur') }}</flux:table.column>
            <flux:table.column>{{ __('Statut cotisation') }}</flux:table.column>
            <flux:table.column>{{ __('Dernier paiement') }}</flux:table.column>
            <flux:table.column>{{ __('Valide jusqu’à') }}</flux:table.column>
            <flux:table.column>{{ __('Actions') }}</flux:table.column>
        </flux:table.columns>

        <flux:table.rows>
            @php
                $breeders = BreederModel::query()
                    ->where('first_name', 'like', '%' . $search . '%')
                    ->orWhere('last_name', 'like', '%' . $search . '%')
                    ->orWhere('email', 'like', '%' . $search . '%')
                    ->orWhere('breeder_number', 'like', '%' . $search . '%')
                    ->paginate(10);
            @endphp

            @foreach ($breeders as $breeder)
                <flux:table.row>
                    <flux:table.cell>{{ $breeder->full_name }}</flux:table.cell>
                    <flux:table.cell>{{ $breeder->email }}</flux:table.cell>
                    <flux:table.cell>{{ $breeder->breeder_number }}</flux:table.cell>
                    <flux:table.cell>
                        @if ($breeder->has_valid_subscription)
                            <span class="inline-flex rounded-full bg-emerald-50 px-2 py-1 text-xs font-semibold text-emerald-700">
                                {{ __('À jour') }}
                            </span>
                        @else
                            <span class="inline-flex rounded-full bg-rose-50 px-2 py-1 text-xs font-semibold text-rose-700">
                                {{ __('En retard') }}
                            </span>
                        @endif
                    </flux:table.cell>
                    <flux:table.cell>{{ $breeder->latest_subscription_due?->payment_date?->format('d/m/Y') ?? '—' }}</flux:table.cell>
                    <flux:table.cell>{{ $breeder->latest_subscription_due?->valid_until?->format('d/m/Y') ?? '—' }}</flux:table.cell>
                    <flux:table.cell>
                        <flux:button size="sm" variant="primary" wire:click="recordPayment({{ $breeder->id }})">
                            {{ __('Enregistrer paiement') }}
                        </flux:button>
                    </flux:table.cell>
                </flux:table.row>
            @endforeach
        </flux:table.rows>
    </flux:table>

    <div class="mt-4">
        {{ $breeders->links() }}
    </div>

    <flux:modal wire:model="showPaymentModal">
        <flux:heading>{{ __('Paiement de cotisation') }}</flux:heading>

        <div class="grid gap-4">
            <flux:field>
                <flux:label>{{ __('Éleveur') }}</flux:label>
                <flux:text>{{ $selectedBreederName }}</flux:text>
            </flux:field>

            <flux:field>
                <flux:label>{{ __('Montant (XOF)') }}</flux:label>
                <flux:input type="number" wire:model="amount" />
            </flux:field>

            <flux:field>
                <flux:label>{{ __('Date de paiement') }}</flux:label>
                <flux:input type="date" wire:model="payment_date" />
            </flux:field>
        </div>

        <div class="mt-4 flex justify-end gap-2">
            <flux:button variant="outline" wire:click="closePaymentModal">{{ __('Annuler') }}</flux:button>
            <flux:button variant="primary" wire:click="savePayment">{{ __('Enregistrer') }}</flux:button>
        </div>
    </flux:modal>
</div>
