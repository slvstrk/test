<?php

namespace Database\Seeders;

use App\Enums\AddressTypeEnum;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $addresses = [];

        for ($i = 0; $i < 500; $i++) {
            [$country, $city, $lat, $lon] = $this->fakeCountryCity();

            $addresses[] = [
                'type' => AddressTypeEnum::from(rand(1,2)),
                'country' => $country,
                'city' => $city,
                'street' => fake()->streetName,
                'house' => fake()->numberBetween(1, 200),
                'unit' => null,
                'lat' => $lat,
                'lon' => $lon,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('addresses')->insert($addresses);
    }

    private function fakeCountryCity(): array
    {
        $countriesCities = [
            [
                'country' => 'Россия',
                'cities' => [
                    [
                        'name' => 'Москва',
                        'lat' => fake()->randomFloat(6, 55.550, 55.900),
                        'lon' => fake()->randomFloat(6, 37.300, 37.900),
                    ],
                    [
                        'name' => 'Санкт-Петербург',
                        'lat' => fake()->randomFloat(6, 59.650, 60.100),
                        'lon' => fake()->randomFloat(6, 29.700, 30.700),
                    ],
                    [
                        'name' => 'Казань',
                        'lat' => fake()->randomFloat(6, 55.650, 55.900),
                        'lon' => fake()->randomFloat(6, 48.900, 49.350),
                    ],
                ],
            ],
            [
                'country' => 'Беларусь',
                'cities' => [
                    [
                        'name' => 'Минск',
                        'lat' => fake()->randomFloat(6, 53.790, 53.970),
                        'lon' => fake()->randomFloat(6, 27.400, 27.750),
                    ],
                    [
                        'name' => 'Брест',
                        'lat' => fake()->randomFloat(6, 52.050, 52.150),
                        'lon' => fake()->randomFloat(6, 23.650, 23.800),
                    ],
                    [
                        'name' => 'Гомель',
                        'lat' => fake()->randomFloat(6, 52.350, 52.500),
                        'lon' => fake()->randomFloat(6, 30.900, 31.100),
                    ],
                ],
            ]
        ];

        $countryIndex = rand(0, count($countriesCities) - 1);

        $cities = $countriesCities[$countryIndex]['cities'];

        $city = $cities[rand(0, count($cities) - 1)];

        return [
            $countriesCities[$countryIndex]['country'],
            $city['name'],
            $city['lat'],
            $city['lon'],
        ];
    }

}
