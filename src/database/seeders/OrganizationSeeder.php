<?php

namespace Database\Seeders;

use App\Models\Activity;
use App\Models\Building;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrganizationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $organizations = $this->prepareOrganizationsRows();
        foreach (array_chunk($organizations, 1000) as $chunk) {
            DB::table('organizations')->insert($chunk);
        }

        $activityOrganization = $this->prepareActivityOrganizationRows();
        foreach (array_chunk($activityOrganization, 1000) as $chunk) {
            DB::table('activity_organization')->upsert($chunk, ['activity_id', 'organization_id']);
        }
    }

    private function fakeOrganizationUnit()
    {
        if (rand(1, 100) >= 70) return null;

        $unitTypes = [
            'мастерская',
            'офис',
            'бокс',
            'павильон',
        ];

        return $unitTypes[array_rand($unitTypes)] . ' ' . fake()->numberBetween(1, 200);
    }

    private function prepareOrganizationsRows() : array
    {
        $buildingsId = Building::query()
            ->select('id')
            ->get()
            ->pluck('id');

        $organizations = [];

        for ($i = 0; $i < 1000; $i++) {
            $buildingId = $buildingsId->random();
            $organizations[] = [
                'name' => fake()->company,
                'inn' => fake()->numberBetween(7700000000, 7799999999),
                'building_id' => $buildingId,
                'unit' => $this->fakeOrganizationUnit(),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        return $organizations;
    }

    private function prepareActivityOrganizationRows() : array
    {
        $activityOrganizationRows = [];
        $activities = Activity::query()
            ->select('id','parent_id')
            ->whereNotNull('parent_id')
            ->with('parentRecursive')
            ->get();

        for ($i = 1; $i <= 1000; $i++) {
            for ($j = 0; $j < rand(1,3); $j++) {
                $activity = $activities->random();

                $activitiesOrganization = $this->getActivitiesOrganizationArray($activity, $i);

                $activityOrganizationRows = array_merge($activityOrganizationRows, $activitiesOrganization);
            }
        }

        return $activityOrganizationRows;
    }

    private function getActivitiesOrganizationArray($activity, $organizationId) : array
    {
        $activity = $activity->toArray();

        $output = [
            [
                'activity_id' => $activity['id'],
                'organization_id' => $organizationId
            ]
        ];

        $parent = $activity['parent_recursive'] ?? null;
        while ($parent) {
            $output[] =  [
                'activity_id' => $parent['id'],
                'organization_id' => $organizationId
            ];
            $parent = $parent['parent_recursive'] ?? null;
        }

        return $output;
    }
}
