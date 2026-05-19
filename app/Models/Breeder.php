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
        'gender',
        'marital_status',
        'department',
    ];

    protected $casts = [
        'id_issued_date' => 'date',
        'id_expiration_date' => 'date',
        'date_of_birth' => 'date',
        'date_of_membership' => 'date',
        'date_of_registration' => 'date',
    ];
    // -------------------------------------------------------------------------
    // Boot
    // -------------------------------------------------------------------------

    protected static function boot(): void
    {
        parent::boot();

        static::creating(function (Breeder $breeder): void {
            if (empty($breeder->breeder_number)) {
                $breeder->breeder_number = static::generateBreederNumber();
            }
        });
    }

    // -------------------------------------------------------------------------
    // Breeder number generator
    // -------------------------------------------------------------------------

    public static function generateBreederNumber(): string
    {
        do {
            // Zero-padded 6-digit random number: 000000 → 999999
            $digits = str_pad(random_int(0, 999999), 6, '0', STR_PAD_LEFT);
            $number = "{$digits}/UDOPER-AD";
        } while (static::where('breeder_number', $number)->exists());

        return $number;
    }

    // -------------------------------------------------------------------------
    // Accessors
    // -------------------------------------------------------------------------

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
