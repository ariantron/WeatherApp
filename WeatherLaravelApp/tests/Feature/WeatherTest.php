<?php

use App\Jobs\ProcessWeatherJob;
use App\Models\City;
use App\Models\WeatherResult;
use Illuminate\Support\Facades\Queue;
use Symfony\Component\HttpFoundation\Response as HttpResponse;

describe('Weather and City Routes', function () {
//    it('fetches weather for a specific city', function () {
//        Queue::fake();
//        $city = City::factory()->create();
//
//        // Create multiple weather results
//        WeatherResult::factory()->count(3)->create([
//            'city_id' => $city->id,
//            'date' => now()->format('Y-m-d')
//        ]);
//
//        $response = $this->get("/city/{$city->id}");
//
//        $response->assertStatus(HttpResponse::HTTP_OK);
//        $response->assertJson([
//            'success' => true,
//            'data' => WeatherResult::whereCityId($city->id)
//                ->where('date', '>=', now()->format('Y-m-d'))
//                ->get()
//                ->toArray()
//        ]);
//        Queue::assertNothingPushed();
//    });
//
//    it('dispatches weather job for city with insufficient results', function () {
//        Queue::fake();
//        $city = City::factory()->create();
//
//        // Create only one weather result
//        WeatherResult::factory()->count(1)->create([
//            'city_id' => $city->id,
//            'date' => now()->format('Y-m-d')
//        ]);
//
//        $response = $this->get("/city/{$city->id}");
//
//        $response->assertStatus(HttpResponse::HTTP_OK);
//        $response->assertJson(['success' => true]);
//        Queue::assertPushed(ProcessWeatherJob::class, function ($job) use ($city) {
//            return $job->city->id === $city->id;
//        });
//    });
//
//    it('fetches weather for specific location coordinates', function () {
//        Queue::fake();
//        $latitude = '40.7128';
//        $longitude = '-74.0060';
//
//        // Create multiple weather results
//        WeatherResult::factory()->count(3)->create([
//            'latitude' => $latitude,
//            'longitude' => $longitude,
//            'date' => now()->format('Y-m-d')
//        ]);
//
//        $response = $this->get("/location/{$latitude},{$longitude}");
//
//        $response->assertStatus(HttpResponse::HTTP_OK);
//        $response->assertJson([
//            'success' => true,
//            'data' => WeatherResult::whereLatitude($latitude)
//                ->whereLongitude($longitude)
//                ->where('date', '>=', now()->format('Y-m-d'))
//                ->get()
//                ->toArray()
//        ]);
//        Queue::assertNothingPushed();
//    });
//
//    it('dispatches weather job for location with insufficient results', function () {
//        Queue::fake();
//        $latitude = '40.7128';
//        $longitude = '-74.0060';
//
//        // Create only one weather result
//        WeatherResult::factory()->count(1)->create([
//            'latitude' => $latitude,
//            'longitude' => $longitude,
//            'date' => now()->format('Y-m-d')
//        ]);
//
//        $response = $this->get("/location/{$latitude},{$longitude}");
//
//        $response->assertStatus(HttpResponse::HTTP_OK);
//        $response->assertJson(['success' => true]);
//        Queue::assertPushed(ProcessWeatherJob::class, function ($job) use ($latitude, $longitude) {
//            return $job->latitude === $latitude && $job->longitude === $longitude;
//        });
//    });
//
//    it('rejects invalid location coordinates', function () {
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
//            $response = $this->get("/location/{$case['latitude']},{$case['longitude']}");
//
//            $response->assertStatus(HttpResponse::HTTP_BAD_REQUEST);
//            $response->assertJson([
//                'success' => false,
//                'errors' => true
//            ]);
//        }
//    });
//
//    it('lists all cities', function () {
//        $cities = City::factory()->count(3)->create();
//
//        $response = $this->get('/cities');
//
//        $response->assertStatus(HttpResponse::HTTP_OK);
//        $response->assertJson([
//            'success' => true,
//            'data' => $cities->toArray()
//        ]);
//    });
});
