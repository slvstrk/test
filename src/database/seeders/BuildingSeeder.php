<?php

namespace Database\Seeders;

use App\Models\Address;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BuildingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $addressesId = Address::query()
            ->select('id')
            ->get()
            ->pluck('id')
            ->shuffle();

        $buildings = [];

        foreach ($addressesId as $addressId) {
            $buildings[] = [
                'address_id' => $addressId,
                'square' => fake()->numberBetween(15, 36) * 1000,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('buildings')->insert($buildings);
    }
}
