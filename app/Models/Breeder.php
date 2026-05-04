<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Breeder extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'date_of_birth',
        'place_of_birth',
        'contact',
        'neighborhood',
        'borough',
        'city',
        'geographic_location',
        'breeder_number',
        'date_of_membership',
        'date_of_registration',
        'organization',
        'id_photo',
        'signature_photo',
        'id_issued_date',
        'id_expiration_date',
    ];

    protected $casts = [
        'id_issued_date' => 'date',
        'id_expiration_date' => 'date',
        'date_of_birth' => 'date',
        'date_of_membership' => 'date',
        'date_of_registration' => 'date',
    ];

    public function getFullNameAttribute(): string
    {
        return $this->first_name.' '.$this->last_name;
    }

    public function getIdExpirationDateAttribute()
    {
        // Si la date d'expiration est définie, la retourner
        if ($this->attributes['id_expiration_date'] ?? null) {
            return $this->castAttribute('id_expiration_date', $this->attributes['id_expiration_date']);
        }

        // Sinon, calculer 5 ans après la date de délivrance
        if ($this->attributes['id_issued_date'] ?? null) {
            return $this->castAttribute('id_issued_date', $this->attributes['id_issued_date'])->addYears(5);
        }

        return null;
    }
}
