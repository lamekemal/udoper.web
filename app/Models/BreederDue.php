<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

class BreederDue extends Model
{
    use HasFactory;

    public const TYPE_SUBSCRIPTION = 'subscription';
    public const TYPE_MEMBERSHIP_CARD = 'membership_card';

    protected $fillable = [
        'breeder_id',
        'type',
        'amount',
        'payment_date',
        'valid_until',
        'reference',
        'notes',
    ];

    protected $casts = [
        'payment_date' => 'date',
        'valid_until' => 'date',
    ];

    public function breeder(): BelongsTo
    {
        return $this->belongsTo(Breeder::class);
    }

    public static function calculateValidUntil(string $type, Carbon $paymentDate): Carbon
    {
        return match ($type) {
            self::TYPE_MEMBERSHIP_CARD => $paymentDate->copy()->addYears(5),
            default => $paymentDate->copy()->addYear(),
        };
    }
}
