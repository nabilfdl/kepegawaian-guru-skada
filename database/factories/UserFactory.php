<?php

namespace Database\Factories;

use App\Models\Subject;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nip' => $this->faker->unique()->numerify('##########'), // Random 10-digit NIP
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'phone' => $this->faker->phoneNumber,
            'sex' => $this->faker->randomElement(['male', 'female']),
            'address' => $this->faker->address,
            'birth_date' => $this->faker->date('Y-m-d', '2000-01-01'),
            'birth_place' => $this->faker->city,
            'religion' => $this->faker->randomElement(['Islam', 'Protestant', 'Katolik']),
            'subject_id' => random_int(1,5), // Optional or assign a valid subject_id
            'position' => $this->faker->randomElement(['PNS', 'P3K', 'Honorer']),
            'marital_status' => $this->faker->randomElement(['belum kawin', 'sudah kawin']),
            'status' => $this->faker->randomElement(['aktif', 'nonaktif']),
            'role' => $this->faker->randomElement(['admin', 'operator', 'user']),
            'email_verified_at' => now(),
            'password' => Hash::make('password'), // Default password
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
