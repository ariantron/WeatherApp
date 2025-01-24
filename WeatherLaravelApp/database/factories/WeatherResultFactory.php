<?php

namespace Database\Factories;

use App\Enums\WeatherType;
use App\Models\City;
use App\Models\WeatherResult;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<WeatherResult>
 */
class WeatherResultFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $city = City::factory()->create();
        return [
            'city_id' => $city->id,
            'latitude' => fake()->latitude(),
            'longitude' => fake()->longitude(),
            'weather' => WeatherType::randomValue(),
            'high_temperature' => fake()->numberBetween(50, 100),
            'low_temperature' => fake()->numberBetween(20, 50),
            'sunrise' => fake()->dateTime(),
            'sunset' => fake()->dateTime(),
            'date' => Carbon::today()->format('Y-m-d'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
