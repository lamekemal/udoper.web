<?php

use App\Models\Breeder;
use App\Models\BreederDue;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Carbon;

uses(RefreshDatabase::class);

it('computes valid subscription and membership card status', function () {
    $breeder = Breeder::factory()->create();

    BreederDue::create([
        'breeder_id' => $breeder->id,
        'type' => BreederDue::TYPE_SUBSCRIPTION,
        'amount' => 2000,
        'payment_date' => Carbon::now()->subMonths(3)->toDateString(),
        'valid_until' => Carbon::now()->addMonths(9)->toDateString(),
    ]);

    BreederDue::create([
        'breeder_id' => $breeder->id,
        'type' => BreederDue::TYPE_MEMBERSHIP_CARD,
        'amount' => 2000,
        'payment_date' => Carbon::now()->subYears(1)->toDateString(),
        'valid_until' => Carbon::now()->addYears(4)->toDateString(),
    ]);

    expect($breeder->fresh()->has_valid_subscription)->toBeTrue();
    expect($breeder->fresh()->has_valid_membership_card)->toBeTrue();
});

it('shows the subscription and membership fees pages to authenticated users', function () {
    $user = User::factory()->create();

    $this->actingAs($user)
        ->get(route('subscriptions'))
        ->assertOk()
        ->assertSee('Gestion des Cotisations');

    $this->actingAs($user)
        ->get(route('membership-fees'))
        ->assertOk()
        ->assertSee('Gestion des Cartes de membre');
});
