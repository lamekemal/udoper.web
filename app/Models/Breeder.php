<?php

namespace App\Models;

use App\Models\BreederDue;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

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
        'savedby',
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

    public function dues(): HasMany
    {
        return $this->hasMany(BreederDue::class);
    }

    public function subscriptionDues(): HasMany
    {
        return $this->dues()->where('type', BreederDue::TYPE_SUBSCRIPTION);
    }

    public function membershipCardDues(): HasMany
    {
        return $this->dues()->where('type', BreederDue::TYPE_MEMBERSHIP_CARD);
    }

    public function getLatestSubscriptionDueAttribute(): ?BreederDue
    {
        return $this->subscriptionDues()->latest('payment_date')->first();
    }

    public function getLatestMembershipCardDueAttribute(): ?BreederDue
    {
        return $this->membershipCardDues()->latest('payment_date')->first();
    }

    public function getHasValidSubscriptionAttribute(): bool
    {
        return $this->latest_subscription_due?->valid_until?->isFuture() ?? false;
    }

    public function getHasValidMembershipCardAttribute(): bool
    {
        return $this->latest_membership_card_due?->valid_until?->isFuture() ?? false;
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
