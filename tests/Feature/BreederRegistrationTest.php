<?php

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('the breeder registration page is accessible', function () {
    $response = $this->get('/eleveur/ajouter');

    $response->assertStatus(200);
    $response->assertSee('Ajouter un éleveur');
});

test('an external user can submit a breeder registration form', function () {
    $response = $this->post('/eleveur/ajouter', [
        'first_name' => 'Jean',
        'last_name' => 'Dupont',
        'contact' => '+22912345678',
        'breeder_number' => 'BR-1234',
        'email' => 'jean.dupont@example.com',
        'city' => 'Djougou',
    ]);

    $response->assertRedirect('/eleveur/ajouter');
    $this->assertDatabaseHas('breeders', [
        'first_name' => 'Jean',
        'last_name' => 'Dupont',
        'breeder_number' => 'BR-1234',
        'email' => 'jean.dupont@example.com',
    ]);
});

test('breeder is saved with authenticated user ID in savedby column', function () {
    $user = User::factory()->create();

    $response = $this->actingAs($user)->post('/eleveur/ajouter', [
        'first_name' => 'Marie',
        'last_name' => 'Martin',
        'contact' => '+22987654321',
        'breeder_number' => 'BR-5678',
        'email' => 'marie.martin@example.com',
        'city' => 'Parakou',
    ]);

    $response->assertRedirect('/eleveur/ajouter');
    $this->assertDatabaseHas('breeders', [
        'first_name' => 'Marie',
        'last_name' => 'Martin',
        'breeder_number' => 'BR-5678',
        'savedby' => $user->id,
    ]);
});
