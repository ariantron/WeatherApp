<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 *
 *
 * @property string $id
 * @property int|null $city_id
 * @property string $latitude
 * @property string $longitude
 * @property string $weather
 * @property string $high_temperature
 * @property string $low_temperature
 * @property string $sunrise
 * @property string $sunset
 * @property string $date
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read City|null $city
 * @method static Builder<static>|WeatherResult newModelQuery()
 * @method static Builder<static>|WeatherResult newQuery()
 * @method static Builder<static>|WeatherResult query()
 * @method static Builder<static>|WeatherResult whereCityId($value)
 * @method static Builder<static>|WeatherResult whereCreatedAt($value)
 * @method static Builder<static>|WeatherResult whereDate($value)
 * @method static Builder<static>|WeatherResult whereHighTemperature($value)
 * @method static Builder<static>|WeatherResult whereId($value)
 * @method static Builder<static>|WeatherResult whereLatitude($value)
 * @method static Builder<static>|WeatherResult whereLongitude($value)
 * @method static Builder<static>|WeatherResult whereLowTemperature($value)
 * @method static Builder<static>|WeatherResult whereSunrise($value)
 * @method static Builder<static>|WeatherResult whereSunset($value)
 * @method static Builder<static>|WeatherResult whereUpdatedAt($value)
 * @method static Builder<static>|WeatherResult whereWeather($value)
 * @mixin Eloquent
 */
class WeatherResult extends Model
{
    use HasUlids, HasFactory;

    protected $fillable = [
        'city_id',
        'latitude',
        'longitude',
        'weather',
        'high_temperature',
        'low_temperature',
        'sunrise',
        'sunset',
        'date'
    ];

    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }
}
