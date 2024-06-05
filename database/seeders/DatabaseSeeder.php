<?php

namespace Database\Seeders;

use App\Models\Country;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            CountrySeeder::class,
            UserSeeder::class,
            CompanySeeder::class,
            ServiceSeeder::class
        ]);

        User::factory()->create([
            'name' => 'Ibuchi Basil',
            'email' => 'ibuchibasil@gmail.com',
            'country_id' => Country::inRandomOrder()->first()->id,
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
            'photo' => '',
            'phone' => '+2349037426727',
            'address' => 'No. 16 Akinpelu Close, Oworonshoki, Lagos State, Nigeria.'
        ]);
    }
}
