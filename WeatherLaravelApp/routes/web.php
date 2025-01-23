<?php

use App\Http\Controllers\CityController;
use App\Http\Controllers\WeatherController;
use Illuminate\Support\Facades\Route;

Route::get('/city/{city}', [WeatherController::class, 'city']);
Route::get('/location/{latitude},{longitude}', [WeatherController::class, 'location']);
Route::get('/cities', [CityController::class, 'index']);
