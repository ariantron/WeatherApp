<?php

namespace App\Http\Controllers;

use App\Jobs\ProcessWeatherJob;
use App\Models\City;
use App\Models\WeatherResult;
use Carbon\Carbon;
use Symfony\Component\HttpFoundation\Response as HttpResponse;
use Validator;

class WeatherController extends Controller
{
    public function city(City $city)
    {
        $results = WeatherResult::whereCityId($city->id)
            ->where('date', '>=', Carbon::today()->format('Y-m-d'))
            ->get();

        if ($results->count() > 2) {
            return $this->success(
                data: $results->toArray()
            );
        }

        ProcessWeatherJob::dispatch(
            city: $city
        );

        return $this->success();
    }

    public function location(string $latitude, string $longitude)
    {
        $validator = Validator::make(
            compact('latitude', 'longitude'),
            [
                'latitude' => 'required|numeric|between:-90,90',
                'longitude' => 'required|numeric|between:-180,180'
            ]
        );

        if ($validator->fails()) {
            return $this->failed(
                errors: $validator->errors()->toArray(),
                statusCode: HttpResponse::HTTP_BAD_REQUEST
            );
        }

        $results = WeatherResult::whereLatitude($latitude)
            ->whereLongitude($longitude)
            ->where('date', '>=', Carbon::today()->format('Y-m-d'))
            ->get();

        if ($results->count() > 2) {
            return $this->success(
                data: $results->toArray()
            );
        }

        ProcessWeatherJob::dispatch(
            latitude: $latitude,
            longitude: $longitude
        );

        return $this->success();
    }
}
