<?php

namespace App\Http\Controllers;

use App\Models\CitiesModel;
use App\Models\ForecastModel;
use App\Services\WeatherService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ForecastController extends Controller
{
    public function index(CitiesModel $city)
    {

        $forecasts = ForecastModel::all();
        return view('forecasts', compact('forecasts'));
    }

    public function singleCity(CitiesModel $city) {

        $response = Http::get(env("WEATHER_API_URL")."v1/forecast.json", [
            'key' => env("WEATHER_API_KEY"),
            'q' => $city->city,
            'aqi' => 'no',
            'lang' => 'en',
        ]);

        $jsonResponse = $response->json();

        $cityName = $city->city;

        $currentForecast = $jsonResponse['forecast']['forecastday'][0]['day'];
        $sunrise = $jsonResponse['forecast']['forecastday'][0]['astro']['sunrise'];
        $sunset = $jsonResponse['forecast']['forecastday'][0]['astro']['sunset'];
        $minTemperature = $currentForecast['mintemp_c'];
        $maxTemperature = $currentForecast['maxtemp_c'];

        $singleCityForecasts = ForecastModel::where(['city_id' => $city->id])->get();
        return view('singleCityForecasts', compact('singleCityForecasts', 'sunrise', 'sunset', 'minTemperature', 'maxTemperature', 'cityName'));
    }
}
