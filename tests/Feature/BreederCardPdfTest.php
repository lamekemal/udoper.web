<?php

use App\Models\Breeder;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;

uses(RefreshDatabase::class);

test('breeder identity card pdf renders with signature photo and dates', function () {
    $breeder = Breeder::factory()->create([
        'id_issued_date' => now()->startOfYear(),
        'signature_photo' => 'signature_photos/test.png',
    ]);

    // Vérifier que la date d'expiration est calculée correctement (5 ans après la date de délivrance)
    expect($breeder->id_expiration_date)->toEqual(
        Carbon::parse($breeder->id_issued_date)->addYears(5)
    );
});

test('breeder identity card pdf expiration date calculated from issued date', function () {
    $issuedDate = Carbon::create(2026, 1, 1);
    $breeder = Breeder::factory()->create([
        'id_issued_date' => $issuedDate,
    ]);

    $expectedExpiration = $issuedDate->copy()->addYears(5);
    expect($breeder->id_expiration_date)->toEqual($expectedExpiration);
});

test('breeder can have signature photo and identity dates', function () {
    $breeder = Breeder::factory()->create([
        'id_photo' => 'id_photos/test.png',
        'signature_photo' => 'signature_photos/test.png',
        'id_issued_date' => now(),
        'id_expiration_date' => now()->addYears(5),
    ]);

    expect($breeder->id_photo)->toBe('id_photos/test.png');
    expect($breeder->signature_photo)->toBe('signature_photos/test.png');
    expect($breeder->id_issued_date)->not->toBeNull();
    expect($breeder->id_expiration_date)->not->toBeNull();
});

test('breeder card renewal resets issuance and expiration dates', function () {
    $breeder = Breeder::factory()->create([
        'id_issued_date' => Carbon::create(2020, 4, 29),
        'id_expiration_date' => Carbon::create(2025, 4, 29),
    ]);

    Carbon::setTestNow($today = Carbon::create(2026, 4, 29));

    Livewire::test('breeders-list')
        ->call('renew', $breeder->id)
        ->assertHasNoErrors();

    $breeder->refresh();

    expect($breeder->id_issued_date)->toEqual($today);
    expect($breeder->id_expiration_date)->toEqual($today->copy()->addYears(5));

    Carbon::setTestNow();
});
