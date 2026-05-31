<?php

namespace App\Http\Controllers;

use App\Models\Breeder;
use Illuminate\Http\Request;

class BreederRegistrationController extends Controller
{
    public function create()
    {
        return view('breeder-registration');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'contact' => ['required', 'string', 'max:255'],
            'breeder_number' => ['required', 'string', 'max:255', 'unique:breeders,breeder_number'],
            'email' => ['nullable', 'email', 'max:255', 'unique:breeders,email'],
            'date_of_birth' => ['nullable', 'date'],
            'place_of_birth' => ['nullable', 'string', 'max:255'],
            'neighborhood' => ['nullable', 'string', 'max:255'],
            'borough' => ['nullable', 'string', 'max:255'],
            'city' => ['nullable', 'string', 'max:255'],
            'geographic_location' => ['nullable', 'string', 'max:255'],
            'organization' => ['nullable', 'string', 'max:255'],
            'date_of_membership' => ['nullable', 'date'],
            'date_of_registration' => ['nullable', 'date'],
            'id_photo' => 'nullable|image|max:2048',
            'signature_photo' => 'nullable|image|max:2048',
        ]);
        
        $photoPath = null;
        if ($request->hasFile('id_photo')) {
            $photoPath = $request->file('id_photo')->store('id_photos', 'public');
        }

        $signaturePhotoPath = null;
        if ($request->hasFile('signature_photo')) {
            $signaturePhotoPath = $request->file('signature_photo')->store('signature_photos', 'public');
        }

        if ($photoPath) {
            $data['id_photo'] = $photoPath;
        }
        if ($signaturePhotoPath) {
            $data['signature_photo'] = $signaturePhotoPath;
        }

        if (auth()->check()) {
            $data['savedby'] = auth()->id();
        }

        Breeder::create($data);

        return redirect()->route('breeders.create')->with('success', 'Éleveur ajouté avec succès.');
    }
}
