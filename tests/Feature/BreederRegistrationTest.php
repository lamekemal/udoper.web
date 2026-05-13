<?php

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
