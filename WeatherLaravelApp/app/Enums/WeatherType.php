<?php

namespace App\Enums;

use App\Traits\EnumToArray;

enum WeatherType: string
{
    use EnumToArray;

    case SUNNY = 'sunny';
    case CLOUDY = 'cloudy';
    case RAINY = 'rainy';
    case SNOWY = 'snowy';
    case WINDY = 'windy';
    case STORMY = 'stormy';
    case FOGGY = 'foggy';
    case HAZY = 'hazy';
    case HUMID = 'humid';
    case DRY = 'dry';
    case THUNDERSTORM = 'thunderstorm';
    case DRIZZLE = 'drizzle';
    case SLEET = 'sleet';
    case FREEZING_RAIN = 'freezing_rain';
    case BLIZZARD = 'blizzard';
    case TORNADO = 'tornado';
    case HURRICANE = 'hurricane';
    case CYCLONE = 'cyclone';
    case DUST_STORM = 'dust_storm';
    case HEATWAVE = 'heatwave';
    case COLD_SNAP = 'cold_snap';
    case PARTLY_CLOUDY = 'partly_cloudy';
    case SCATTERED_SHOWERS = 'scattered_showers';
    case LIGHT_BREEZE = 'light_breeze';
    case OVERCAST = 'overcast';
    case FROSTY = 'frosty';
    case MISTY = 'misty';
}
