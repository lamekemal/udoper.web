<?php

namespace Database\Factories;

use App\Models\Breeder;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Breeder>
 */
class BreederFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'first_name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'email' => $this->faker->unique()->safeEmail(),
            'date_of_birth' => $this->faker->date(),
            'place_of_birth' => $this->faker->city(),
            'contact' => $this->faker->phoneNumber(),
            'neighborhood' => $this->faker->streetName(),
            'borough' => $this->faker->city(),
            'city' => $this->faker->city(),
            'geographic_location' => $this->faker->country(),
            'breeder_number' => 'BR-'.$this->faker->unique()->numberBetween(1000, 9999),
            'date_of_membership' => $this->faker->date(),
            'date_of_registration' => now(),
            'organization' => $this->faker->company(),
            'id_photo' => null, // Placeholder
            'signature_photo' => null, // Placeholder
            'id_issued_date' => $this->faker->date(),
            'id_expiration_date' => $this->faker->date(),
            'gender' => $this->faker->gender(),
            'marital_status' => $this->faker->maritalStatus(),
            'department' => $this->faker->state(),
        ];
    }
}
