<?php

use App\Models\Breeder;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Spatie\Browsershot\Browsershot;
use Barryvdh\Snappy\Facades\SnappyPdf;

new class extends Component
{
    use WithPagination, WithFileUploads;

    public $search = '';
    public $showCreateModal = false;
    public $showEditModal = false;
    public $editingBreeder = null;
    public $first_name, $last_name, $email, $date_of_birth, $place_of_birth, $contact, $neighborhood, $borough, $city, $geographic_location, $breeder_number, $date_of_membership, $date_of_registration, $organization, $id_photo, $signature_photo, $id_issued_date, $id_expiration_date;

    public function mount()
    {
        // Initialiser si nécessaire
    }

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function create()
    {
        $this->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:breeders,email',
            'date_of_birth' => 'required|date',
            'place_of_birth' => 'required|string|max:255',
            'contact' => 'nullable|string|max:20',
            'neighborhood' => 'nullable|string|max:255',
            'borough' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:255',
            'geographic_location' => 'nullable|string|max:255',
            'breeder_number' => 'required|string|unique:breeders,breeder_number',
            'date_of_membership' => 'nullable|date',
            'date_of_registration' => 'nullable|date',
            'organization' => 'nullable|string|max:255',
            'id_photo' => 'nullable|image|max:2048',
            'signature_photo' => 'nullable|image|max:2048',
            'id_issued_date' => 'nullable|date',
            'id_expiration_date' => 'nullable|date',
        ]);

        $photoPath = null;
        if ($this->id_photo) {
            $photoPath = $this->id_photo->store('id_photos', 'public');
        }

        $signaturePhotoPath = null;
        if ($this->signature_photo) {
            $signaturePhotoPath = $this->signature_photo->store('signature_photos', 'public');
        }

        if (! $this->id_issued_date) {
            $this->id_issued_date = Carbon::today()->toDateString();
        }

        if (! $this->id_expiration_date) {
            $this->id_expiration_date = Carbon::parse($this->id_issued_date)->addYears(5)->toDateString();
        }

        Breeder::create([
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'email' => $this->email,
            'date_of_birth' => $this->date_of_birth,
            'place_of_birth' => $this->place_of_birth,
            'contact' => $this->contact,
            'neighborhood' => $this->neighborhood,
            'borough' => $this->borough,
            'city' => $this->city,
            'geographic_location' => $this->geographic_location,
            'breeder_number' => $this->breeder_number,
            'date_of_membership' => $this->date_of_membership,
            'date_of_registration' => $this->date_of_registration,
            'organization' => $this->organization,
            'id_photo' => $photoPath,
            'signature_photo' => $signaturePhotoPath,
            'id_issued_date' => $this->id_issued_date,
            'id_expiration_date' => $this->id_expiration_date,
        ]);

        $this->resetForm();
        $this->showCreateModal = false;
        session()->flash('message', 'Éleveur ajouté avec succès.');
    }

    public function edit($id)
    {
        $breeder = Breeder::findOrFail($id);
        $this->editingBreeder = $breeder;
        $this->first_name = $breeder->first_name;
        $this->last_name = $breeder->last_name;
        $this->email = $breeder->email;
        $this->date_of_birth = $breeder->date_of_birth;
        $this->place_of_birth = $breeder->place_of_birth;
        $this->contact = $breeder->contact;
        $this->neighborhood = $breeder->neighborhood;
        $this->borough = $breeder->borough;
        $this->city = $breeder->city;
        $this->geographic_location = $breeder->geographic_location;
        $this->breeder_number = $breeder->breeder_number;
        $this->date_of_membership = $breeder->date_of_membership;
        $this->date_of_registration = $breeder->date_of_registration;
        $this->organization = $breeder->organization;
        $this->id_issued_date = $breeder->id_issued_date;
        $this->id_expiration_date = $breeder->id_expiration_date;
        $this->id_photo = null;
        $this->signature_photo = null;
        $this->showEditModal = true;
    }

    public function update()
    {
        $this->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:breeders,email,' . $this->editingBreeder->id,
            'date_of_birth' => 'required|date',
            'place_of_birth' => 'required|string|max:255',
            'contact' => 'nullable|string|max:20',
            'neighborhood' => 'nullable|string|max:255',
            'borough' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:255',
            'geographic_location' => 'nullable|string|max:255',
            'date_of_membership' => 'nullable|date',
            'date_of_registration' => 'nullable|date',
            'organization' => 'nullable|string|max:255',
            'id_photo' => 'nullable|image|max:2048',
            'signature_photo' => 'nullable|image|max:2048',
            'id_issued_date' => 'nullable|date',
            'id_expiration_date' => 'nullable|date',
        ]);

        $photoPath = $this->editingBreeder->id_photo;
        if ($this->id_photo) {
            $photoPath = $this->id_photo->store('id_photos', 'public');
        }

        $signaturePhotoPath = $this->editingBreeder->signature_photo;
        if ($this->signature_photo) {
            $signaturePhotoPath = $this->signature_photo->store('signature_photos', 'public');
        }

        if ($this->id_issued_date && ! $this->id_expiration_date) {
            $this->id_expiration_date = Carbon::parse($this->id_issued_date)->addYears(5)->toDateString();
        }

        $this->editingBreeder->update([
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'email' => $this->email,
            'date_of_birth' => $this->date_of_birth,
            'place_of_birth' => $this->place_of_birth,
            'contact' => $this->contact,
            'neighborhood' => $this->neighborhood,
            'borough' => $this->borough,
            'city' => $this->city,
            'geographic_location' => $this->geographic_location,
            'breeder_number' => $this->breeder_number,
            'date_of_membership' => $this->date_of_membership,
            'date_of_registration' => $this->date_of_registration,
            'organization' => $this->organization,
            'id_photo' => $photoPath,
            'signature_photo' => $signaturePhotoPath,
            'id_issued_date' => $this->id_issued_date,
            'id_expiration_date' => $this->id_expiration_date,
        ]);

        $this->resetForm();
        $this->showEditModal = false;
        session()->flash('message', 'Éleveur mis à jour avec succès.');
    }

    public function delete($id)
    {
        Breeder::findOrFail($id)->delete();
        session()->flash('message', 'Éleveur supprimé avec succès.');
    }

    public function renew($id)
    {
        $breeder = Breeder::findOrFail($id);
        $issuedDate = Carbon::today();

        $breeder->update([
            'id_issued_date' => $issuedDate,
            'id_expiration_date' => $issuedDate->copy()->addYears(5),
        ]);

        session()->flash('message', 'Dates de carte renouvelées avec succès.');
    }

    public function downloadPdf($id)
    {
        $breeder = Breeder::findOrFail($id);
        $html = view('breeder-card', compact('breeder'))->render();

        $pdf = Browsershot::html($html)
            ->setChromePath('/usr/bin/chromium')
            ->noSandbox()
            ->paperSize(380, 680, 'px')
            ->margins(0, 0, 0, 0)
            ->preferCSSPageSize()
            ->hideHeaderAndFooter()
            ->pdf();

        return response()->streamDownload(function () use ($pdf) {
            echo $pdf;
        }, 'carte-membre-' . $breeder->membership_number . '.pdf');
    }

    public function openCreateModal(): void
    {
        $this->resetForm();
        $this->breeder_number = Breeder::generateBreederNumber();
        $this->showCreateModal = true;
    }

    public function resetForm(): void
    {
        $this->reset([
            'first_name', 'last_name', 'email', 'date_of_birth', 'place_of_birth',
            'contact', 'neighborhood', 'borough', 'city', 'geographic_location',
            'date_of_membership', 'date_of_registration', 'organization',
            'id_photo', 'signature_photo', 'id_issued_date', 'id_expiration_date',
            'editingBreeder',
        ]);

        $this->breeder_number = Breeder::generateBreederNumber();
    }
};
?>

@php
    $breeders = App\Models\Breeder::where('first_name', 'like', '%' . $search . '%')
        ->orWhere('last_name', 'like', '%' . $search . '%')
        ->orWhere('email', 'like', '%' . $search . '%')
        ->paginate(10);
@endphp

<div>
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-bold">Liste des Éleveurs</h1>
        <flux:button variant="primary" wire:click="openCreateModal">Ajouter Éleveur</flux:button>
    </div>

    <flux:input placeholder="Rechercher..." wire:model.live="search" class="mb-4" />

    <flux:table>
        <flux:table.columns>
            <flux:table.column>Nom Complet</flux:table.column>
            <flux:table.column>Email</flux:table.column>
            <flux:table.column>Contact</flux:table.column>
            <flux:table.column>Numéro Éleveur</flux:table.column>
            <flux:table.column>Délivrance</flux:table.column>
            <flux:table.column>Expiration</flux:table.column>
            <flux:table.column>Actions</flux:table.column>
        </flux:table.columns>

        <flux:table.rows>
            @foreach($breeders as $breeder)
            <flux:table.row>
                <flux:table.cell>{{ $breeder->full_name }}</flux:table.cell>
                <flux:table.cell>{{ $breeder->email }}</flux:table.cell>
                <flux:table.cell>{{ $breeder->contact }}</flux:table.cell>
                <flux:table.cell>{{ $breeder->breeder_number }}</flux:table.cell>
                <flux:table.cell>{{ $breeder->id_issued_date?->format('d/m/Y') ?? '—' }}</flux:table.cell>
                <flux:table.cell>{{ $breeder->id_expiration_date?->format('d/m/Y') ?? '—' }}</flux:table.cell>
                <flux:table.cell>
                    <div class="flex gap-2 flex-wrap">
                        <flux:button variant="ghost" size="sm" wire:click="edit({{ $breeder->id }})">Éditer</flux:button>
                        <flux:button variant="ghost" size="sm" wire:click="renew({{ $breeder->id }})">Renouveler</flux:button>
                        <flux:button variant="ghost" size="sm" wire:click="downloadPdf({{ $breeder->id }})">PDF</flux:button>
                        <a href="{{ route('breeders.preview-html', $breeder) }}" target="_blank" rel="noopener" class="inline-flex items-center justify-center rounded border border-slate-300 bg-white px-3 py-1 text-sm text-slate-700 hover:bg-slate-50">Voir</a>
                        <flux:button variant="danger" size="sm" wire:click="delete({{ $breeder->id }})">Supprimer</flux:button>
                    </div>
                </flux:table.cell>
            </flux:table.row>
            @endforeach
        </flux:table.rows>
    </flux:table>

    <div class="mt-4">
        {{ $breeders->links() }}
    </div>

    <flux:modal wire:model="showCreateModal">
        <flux:heading>Ajouter Éleveur</flux:heading>
        <div class="grid grid-cols-2 gap-4">
            <flux:field>
                <flux:label>Prénom</flux:label>
                <flux:input wire:model="first_name" />
            </flux:field>
            <flux:field>
                <flux:label>Nom</flux:label>
                <flux:input wire:model="last_name" />
            </flux:field>
            <flux:field>
                <flux:label>Email</flux:label>
                <flux:input type="email" wire:model="email" />
            </flux:field>
            <flux:field>
                <flux:label>Date de Naissance</flux:label>
                <flux:input type="date" wire:model="date_of_birth" />
            </flux:field>
            <flux:field>
                <flux:label>Lieu de Naissance</flux:label>
                <flux:input wire:model="place_of_birth" />
            </flux:field>
            <flux:field>
                <flux:label>Contact</flux:label>
                <flux:input wire:model="contact" />
            </flux:field>
            <flux:field>
                <flux:label>Quartier</flux:label>
                <flux:input wire:model="neighborhood" />
            </flux:field>
            <flux:field>
                <flux:label>Arrondissement</flux:label>
                <flux:input wire:model="borough" />
            </flux:field>
            <flux:field>
                <flux:label>Ville</flux:label>
                <flux:input wire:model="city" />
            </flux:field>
            <flux:field>
                <flux:label>Localisation Géographique</flux:label>
                <flux:input wire:model="geographic_location" />
            </flux:field>
            <flux:field>
                <flux:label>Numéro Éleveur</flux:label>
                <flux:input wire:model="breeder_number" readonly />
            </flux:field>
            <flux:field>
                <flux:label>Date d'Adhésion</flux:label>
                <flux:input type="date" wire:model="date_of_membership" />
            </flux:field>
            <flux:field>
                <flux:label>Date d'Inscription</flux:label>
                <flux:input type="date" wire:model="date_of_registration" />
            </flux:field>
            <flux:field>
                <flux:label>Organisation</flux:label>
                <flux:input wire:model="organization" />
            </flux:field>
            <flux:field>
                <flux:label>Photo ID</flux:label>
                <flux:input type="file" wire:model="id_photo" />
            </flux:field>
            <flux:field>
                <flux:label>Photo Signature</flux:label>
                <flux:input type="file" wire:model="signature_photo" />
            </flux:field>
            <flux:field>
                <flux:label>Date de Délivrance</flux:label>
                <flux:input type="date" wire:model="id_issued_date" />
            </flux:field>
            <flux:field>
                <flux:label>Date d'Expiration</flux:label>
                <flux:input type="date" wire:model="id_expiration_date" />
            </flux:field>
        </div>
        <flux:footer>
            <flux:spacer />
            <flux:button variant="ghost" wire:click="$set('showCreateModal', false)">Annuler</flux:button>
            <flux:button wire:click="create">Créer</flux:button>
        </flux:footer>
    </flux:modal>

    <flux:modal wire:model="showEditModal">
        <flux:heading>Éditer Éleveur</flux:heading>
        <div class="grid grid-cols-2 gap-4">
            <flux:field>
                <flux:label>Prénom</flux:label>
                <flux:input wire:model="first_name" />
            </flux:field>
            <flux:field>
                <flux:label>Nom</flux:label>
                <flux:input wire:model="last_name" />
            </flux:field>
            <flux:field>
                <flux:label>Email</flux:label>
                <flux:input type="email" wire:model="email" />
            </flux:field>
            <flux:field>
                <flux:label>Date de Naissance</flux:label>
                <flux:input type="date" wire:model="date_of_birth" />
            </flux:field>
            <flux:field>
                <flux:label>Lieu de Naissance</flux:label>
                <flux:input wire:model="place_of_birth" />
            </flux:field>
            <flux:field>
                <flux:label>Contact</flux:label>
                <flux:input wire:model="contact" />
            </flux:field>
            <flux:field>
                <flux:label>Quartier</flux:label>
                <flux:input wire:model="neighborhood" />
            </flux:field>
            <flux:field>
                <flux:label>Arrondissement</flux:label>
                <flux:input wire:model="borough" />
            </flux:field>
            <flux:field>
                <flux:label>Ville</flux:label>
                <flux:input wire:model="city" />
            </flux:field>
            <flux:field>
                <flux:label>Localisation Géographique</flux:label>
                <flux:input wire:model="geographic_location" />
            </flux:field>
            <flux:field>
                <flux:label>Numéro Éleveur</flux:label>
                <flux:input wire:model="breeder_number" readonly />
            </flux:field>
            <flux:field>
                <flux:label>Date d'Adhésion</flux:label>
                <flux:input type="date" wire:model="date_of_membership" />
            </flux:field>
            <flux:field>
                <flux:label>Date d'Inscription</flux:label>
                <flux:input type="date" wire:model="date_of_registration" />
            </flux:field>
            <flux:field>
                <flux:label>Organisation</flux:label>
                <flux:input wire:model="organization" />
            </flux:field>
            <flux:field>
                <flux:label>Photo ID</flux:label>
                <flux:input type="file" wire:model="id_photo" />
            </flux:field>
            <flux:field>
                <flux:label>Photo Signature</flux:label>
                <flux:input type="file" wire:model="signature_photo" />
            </flux:field>
            <flux:field>
                <flux:label>Date de Délivrance</flux:label>
                <flux:input type="date" wire:model="id_issued_date" />
            </flux:field>
            <flux:field>
                <flux:label>Date d'Expiration</flux:label>
                <flux:input type="date" wire:model="id_expiration_date" />
            </flux:field>
        </div>
        <flux:footer>
            <flux:spacer />
            <flux:button variant="ghost" wire:click="$set('showEditModal', false)">Annuler</flux:button>
            <flux:button wire:click="update">Mettre à Jour</flux:button>
        </flux:footer>
    </flux:modal>

    @if (session()->has('message'))
        <div class="alert alert-success mt-4">{{ session('message') }}</div>
    @endif
</div>
