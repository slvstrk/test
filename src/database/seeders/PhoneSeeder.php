<?php

namespace Database\Seeders;

use App\Models\Organization;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PhoneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $organizationsId = Organization::query()
            ->select('id')
            ->get()
            ->pluck('id')
            ->shuffle();

        $phones = [];

        foreach ($organizationsId as $organizationId) {
            for ($i = 0; $i < rand(1,3); $i++) {
                $phones[] = $this->generateFakePhoneItem($organizationId);
            }
        }

        foreach (array_chunk($phones, 1000) as $chunk) {
            DB::table('phones')->insert($chunk);
        }
    }

    private function generateFakePhoneItem($organizationId): array
    {
        return [
            'number' => fake()->numberBetween(79671111111, 79679999999),
            'ext' => rand(1, 100) <= 30 ? fake()->numberBetween(100, 300) : null,
            'phoneable_id' => $organizationId,
            'phoneable_type' => Organization::class,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
