<?php

namespace App\Services;

use App\Enums\WeatherType;
use App\Interfaces\IWeatherService;
use App\Models\City;
use App\Models\WeatherResult;
use Carbon\Carbon;

class WeatherService implements IWeatherService
{
    public function result(
        ?City  $city,
        float  $latitude,
        float  $longitude,
        Carbon $date
    ): void
    {
        $dates = [
            $date,
            $date->copy()->addDay(),
            $date->copy()->addDays(2),
        ];

        if(!$city) {
            $city = City::whereLatitude($latitude)
                ->whereLongitude($longitude)
                ->first();
        }

        foreach ($dates as $date) {
            $date = $date->format('Y-m-d');
            WeatherResult::upsert(
                [
                    'city_id' => $city?->id,
                    'latitude' => $latitude,
                    'longitude' => $longitude,
                    'date' => $date,
                    'weather' => WeatherType::randomValue(),
                    'high_temperature' => rand(15, 30),
                    'low_temperature' => rand(0, 14),
                    'sunrise' => $date . ' ' .
                        self::randomTimeBetween(
                            Carbon::createFromTime(4),
                            Carbon::createFromTime(6)
                        ),
                    'sunset' => $date . ' ' .
                        self::randomTimeBetween(
                            Carbon::createFromTime(18),
                            Carbon::createFromTime(20)
                        )
                ],
                [
                    'city_id',
                    'latitude',
                    'longitude',
                    'date'
                ],
                [
                    'weather',
                    'high_temperature',
                    'low_temperature',
                    'sunrise',
                    'sunset'
                ]
            );
        }
    }

    private static function randomTimeBetween(Carbon $start, Carbon $end): string
    {
        $randomTimestamp = rand($start->timestamp, $end->timestamp);
        return Carbon::createFromTimestamp($randomTimestamp)->format('H:i:s');
    }
}
