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
    ];

    public function getFullNameAttribute()
    {
        return $this->first_name.' '.$this->last_name;
    }
}
