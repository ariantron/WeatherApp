<?php

namespace App\Facades;

use App\Interfaces\IWeatherService;
use Illuminate\Support\Facades\Facade;

class WeatherFacade extends Facade {
    protected static function getFacadeAccessor(): string
    {
        return IWeatherService::class;
    }
}
