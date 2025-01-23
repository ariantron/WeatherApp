<?php

namespace App\Interfaces;

use App\Models\City;
use Carbon\Carbon;

interface IWeatherService
{
    public function result(
        ?City   $city,
        float   $latitude,
        float   $longitude,
        Carbon  $date
    ): void;
}
