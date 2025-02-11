<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(SubjectSeeder::class);

        // Example of manually seeded users
        User::create([
            'nip' => '123456789',
            'name' => 'John Doe',
            'email' => 'johndoe@example.com',
            'phone' => '08123456789',
            'sex' => 'Laki-Laki',
            'address' => '123 Main Street, City, Country',
            'birth_date' => '1980-05-15',
            'birth_place' => 'Cityville',
            'religion' => 'Islam',
            'subject_id' => 1, // Assuming subject_id 1 exists in the subjects table
            'position' => 'PNS',
            'marital_status' => 'Kawin',
            'status' => 'Aktif',
            'role' => 'Admin',
            'email_verified_at' => now(),
            'password' => Hash::make('password'), // Replace 'password' with a secure default
            'remember_token' => Str::random(10),
        ]);

        // Example of seeding multiple random users
        User::factory(10)->create();
    }
}
