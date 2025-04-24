<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class WeatherService {


    public function getWeather($city) {

        $response = Http::get(env("WEATHER_API_URL")."v1/forecast.json", [
            'key' => env("WEATHER_API_KEY"),
            'q' => $city,
            'aqi' => 'no',
            'lang' => 'en',
        ]);

        return $response->json();

    }
}











?>
