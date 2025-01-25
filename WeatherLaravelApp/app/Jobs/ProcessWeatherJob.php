<?php

namespace App\Jobs;

use App\Models\City;
use Carbon\Carbon;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use WeatherService;

class ProcessWeatherJob implements ShouldQueue
{
    use Queueable;

    private ?City $city;
    private float $latitude;
    private float $longitude;
    private Carbon $date;

    /**
     * Create a new job instance.
     */
    public function __construct(
        ?City  $city = null,
        ?float $latitude = null,
        ?float $longitude = null
    )
    {
        $this->city = $city;
        $this->latitude = $city ? $city->latitude : $latitude;
        $this->longitude = $city ? $city->longitude : $longitude;
        $this->date = Carbon::now();
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        WeatherService::result(
            $this->city,
            $this->latitude,
            $this->longitude,
            $this->date
        );
    }

    public function getCity(): ?City
    {
        return $this->city;
    }

    public function getLatitude(): float
    {
        return $this->latitude;
    }

    public function getLongitude(): float
    {
        return $this->longitude;
    }

    public function getDate(): Carbon
    {
        return $this->date;
    }
}
