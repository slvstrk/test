<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Laravel\Sanctum\PersonalAccessToken;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(ActivitySeeder::class);
        $this->call(AddressSeeder::class);
        $this->call(BuildingSeeder::class);
        $this->call(OrganizationSeeder::class);
        $this->call(PhoneSeeder::class);

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'token' => hash('sha256', 'abc123def456ghi789xyz')
        ]);
    }
}
