<?php

use App\Models\Breeder;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;

uses(RefreshDatabase::class);

test('breeders list component saves breeder with current user ID in savedby', function () {
    $user = User::factory()->create();

    Livewire::actingAs($user)
        ->test('breeders-list')
        ->set('first_name', 'Jean')
        ->set('last_name', 'Dupont')
        ->set('email', 'jean.dupont@example.com')
        ->set('date_of_birth', '1990-01-15')
        ->set('place_of_birth', 'Djougou')
        ->set('contact', '+22912345678')
        ->set('breeder_number', Breeder::generateBreederNumber())
        ->call('create')
        ->assertHasNoErrors();

    $this->assertDatabaseHas('breeders', [
        'first_name' => 'Jean',
        'last_name' => 'Dupont',
        'email' => 'jean.dupont@example.com',
        'savedby' => $user->id,
    ]);
});

test('breeders list component updates breeder with current user ID in savedby', function () {
    $user = User::factory()->create();
    $breeder = Breeder::factory()->create([
        'savedby' => null,
        'date_of_birth' => '1990-01-15',
        'place_of_birth' => 'Djougou',
    ]);

    Livewire::actingAs($user)
        ->test('breeders-list')
        ->call('edit', $breeder->id)
        ->set('first_name', 'Updated')
        ->call('update')
        ->assertHasNoErrors();

    expect($breeder->refresh()->savedby)->toBe($user->id);
});
