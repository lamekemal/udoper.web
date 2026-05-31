<?php

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;

uses(RefreshDatabase::class);

test('user role can be changed via users management component', function () {
    $user = User::factory()->create(['role' => 'user']);

    Livewire::test('users-management')
        ->call('changeRole', $user->id, 'admin')
        ->assertHasNoErrors();

    expect($user->refresh()->role)->toBe('admin');
});
