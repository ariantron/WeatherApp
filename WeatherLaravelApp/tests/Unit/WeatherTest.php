<?php

use App\Models\City;
use App\Models\WeatherResult;
use App\Jobs\ProcessWeatherJob;
use Carbon\Carbon;
use Illuminate\Support\Facades\Queue;
use Symfony\Component\HttpFoundation\Response as HttpResponse;
use Tests\TestCase;

uses(TestCase::class);

describe('Weather', function () {
    it('returns existing weather results for a city', function () {
        $city = City::factory()->create();

        $dates = [
            Carbon::today(),
            Carbon::tomorrow(),
            Carbon::tomorrow()->addDay(),
        ];

        foreach ($dates as $date) {
            WeatherResult::factory()->create([
                'city_id' => $city->id,
                'date' => $date->format('Y-m-d')
            ]);
        }

        $response = $this->get("/city/{$city->id}");

        $response->assertStatus(HttpResponse::HTTP_OK);
        $response->assertJson([
            'data' => WeatherResult::whereCityId($city->id)
                ->where('date', '>=', Carbon::today()->format('Y-m-d'))
                ->get()
                ->toArray()
        ]);
    });

//    it('dispatches job for city with insufficient results', function () {
//        Queue::fake();
//        $city = City::factory()->create();
//        WeatherResult::factory()->count(1)->create([
//            'city_id' => $city->id,
//            'date' => Carbon::today()->format('Y-m-d')
//        ]);
//
//        $response = $this->get(route('weather.city', $city));
//
//        $response->assertStatus(HttpResponse::HTTP_OK);
//        $response->assertJson(['success' => true]);
//        Queue::assertPushed(ProcessWeatherJob::class, function ($job) use ($city) {
//            return $job->city->id === $city->id;
//        });
//    });
//
//    it('returns existing weather results for location coordinates', function () {
//        $latitude = '40.7128';
//        $longitude = '-74.0060';
//        WeatherResult::factory()->count(3)->create([
//            'latitude' => $latitude,
//            'longitude' => $longitude,
//            'date' => Carbon::today()->format('Y-m-d')
//        ]);
//
//        $response = $this->get(route('weather.location', [
//            'latitude' => $latitude,
//            'longitude' => $longitude
//        ]));
//
//        $response->assertStatus(HttpResponse::HTTP_OK);
//        $response->assertJson([
//            'success' => true,
//            'data' => WeatherResult::whereLatitude($latitude)
//                ->whereLongitude($longitude)
//                ->where('date', '>=', Carbon::today()->format('Y-m-d'))
//                ->get()
//                ->toArray()
//        ]);
//    });
//
//    it('dispatches job for location with insufficient results', function () {
//        Queue::fake();
//        $latitude = '40.7128';
//        $longitude = '-74.0060';
//        WeatherResult::factory()->count(1)->create([
//            'latitude' => $latitude,
//            'longitude' => $longitude,
//            'date' => Carbon::today()->format('Y-m-d')
//        ]);
//
//        $response = $this->get(route('weather.location', [
//            'latitude' => $latitude,
//            'longitude' => $longitude
//        ]));
//
//        $response->assertStatus(HttpResponse::HTTP_OK);
//        $response->assertJson(['success' => true]);
//        Queue::assertPushed(ProcessWeatherJob::class, function ($job) use ($latitude, $longitude) {
//            return $job->latitude === $latitude && $job->longitude === $longitude;
//        });
//    });
//
//    it('validates location coordinates', function () {
//        $invalidCases = [
//            ['latitude' => '91', 'longitude' => '0'],
//            ['latitude' => '-91', 'longitude' => '0'],
//            ['latitude' => '0', 'longitude' => '181'],
//            ['latitude' => '0', 'longitude' => '-181'],
//            ['latitude' => 'invalid', 'longitude' => '0'],
//            ['latitude' => '0', 'longitude' => 'invalid']
//        ];
//
//        foreach ($invalidCases as $case) {
//            $response = $this->get(route('weather.location', $case));
//
//            $response->assertStatus(HttpResponse::HTTP_BAD_REQUEST);
//            $response->assertJson([
//                'success' => false,
//                'errors' => true
//            ]);
//        }
//    });
});
