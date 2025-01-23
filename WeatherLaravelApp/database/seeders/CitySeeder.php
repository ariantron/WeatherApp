<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class CitySeeder extends Seeder
{
    /**
     * @throws FileNotFoundException
     */
    public function run(): void
    {
        $json = File::get(resource_path('jsons/cities.json'));
        $cities = json_decode($json, true);
        foreach ($cities as $city) {
            City::create([
                'name' => $city['name'],
                'latitude' => $city['latitude'],
                'longitude' => $city['longitude']
            ]);
        }
    }
}
