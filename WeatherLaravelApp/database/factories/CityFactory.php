<?php

namespace Database\Factories;

use App\Models\City;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<City>
 */
class CityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->city,
            'latitude' => fake()->latitude,
            'longitude' => fake()->longitude,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
