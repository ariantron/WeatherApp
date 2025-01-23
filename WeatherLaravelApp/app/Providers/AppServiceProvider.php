<?php

namespace App\Providers;

use App\Facades\WeatherFacade;
use App\Interfaces\IWeatherService;
use App\Services\WeatherService;
use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(IWeatherService::class, WeatherService::class);
        AliasLoader::getInstance()->alias(class_basename(WeatherService::class), WeatherFacade::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
