<?php

use App\Http\Controllers\BreederRegistrationController;
use App\Models\Breeder;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('home');
Route::view('/contact', 'contact')->name('contact');
Route::get('/eleveur/ajouter', [BreederRegistrationController::class, 'create'])->name('breeders.create');
Route::post('/eleveur/ajouter', [BreederRegistrationController::class, 'store'])->name('breeders.store');
Route::view('/owners', 'owners')->name('owners');
Route::view('/subscriptions', 'subscriptions')->name('subscriptions');
Route::view('/gaps', 'gaps')->name('gaps');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');
    Route::view('breeders', 'breeders')->name('breeders');
    Route::get('breeders/{breeder}/preview-html', function (Breeder $breeder) {
        return view('breeder-card', compact('breeder'))->with('previewHtml', true);
    })->name('breeders.preview-html');
    Route::view('users', 'users')->name('users'); // Pour la gestion des utilisateurs
});

require __DIR__.'/settings.php';
