<?php

namespace Database\Seeders;

use App\Models\Activity;
use Illuminate\Database\Seeder;

class ActivitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $activities = [
            [
                'name' => 'Еда',
                'children' => [
                    ['name' => 'Мясная продукция'],
                    ['name' => 'Молочная продукция'],
                ]
            ],
            [
                'name' => 'Автомобили',
                'children' => [
                    ['name' => 'Грузовые'],
                    [
                        'name' => 'Легковые',
                        'children' => [
                            [
                                'name' => 'Запчасти',
                                'children' => [
                                    ['name' => 'Фары'],
                                    ['name' => 'Стекла'],
                                ]
                            ],
                            [
                                'name' => 'Аксессуары',
                                'children' => [
                                    ['name' => 'Коврики'],
                                ]
                            ],
                        ]
                    ],
                ]
            ],
        ];

        foreach ($activities as $activityData) {
            $this->createActivity($activityData);
        }
    }

    private function createActivity(array $data, ?int $parentId = null): void
    {
        $activity = Activity::create([
            'name' => $data['name'],
            'parent_id' => $parentId,
        ]);

        if (isset($data['children']) && is_array($data['children'])) {
            foreach ($data['children'] as $child) {
                $this->createActivity($child, $activity->id);
            }
        }
    }
}
