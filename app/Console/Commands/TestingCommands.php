<?php

namespace App\Console\Commands;

use App\Models\CitiesModel;
use App\Models\ForecastModel;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class TestingCommands extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:testing-commands{city}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';




    public function handle()
    {
        $city = $this->argument('city');

        $databaseCity = CitiesModel::where(['city' => $city])->first();

        $response = Http::get(env("WEATHER_API_URL")."v1/forecast.json", [
            'key' => env("WEATHER_API_KEY"),
            'q' => $city,
            'aqi' => 'no',
            'lang' => 'en',
        ]);

        $jsonResponse = $response->json();

        // if api search doesn't exists (argument)
        if(isset($jsonResponse['error']))
        {
            $this->output->error($jsonResponse['error']['message']);
            return;
        }


        // if city doesn't exists in base
        if($databaseCity === null) {

            $databaseCity = CitiesModel::create([
                'city' => $city,
            ]);
            $this->output->info("Successfully created new city");
        }




        $cityName = $city;
        $cityId = $databaseCity->id;
        $temperature = $jsonResponse['current']['temp_c'];
        $minTemperature = $jsonResponse['forecast']['forecastday'][0]['day']['mintemp_c'];
        $maxTemperature = $jsonResponse['forecast']['forecastday'][0]['day']['maxtemp_c'];
        $forecastDate = $jsonResponse['forecast']['forecastday']['0']['date'];
        $condition = $jsonResponse['current']['condition']['text'];
        $possibility = $jsonResponse['forecast']['forecastday']['0']['day']['daily_chance_of_rain'];


        $forecast = [
            'city_id' => $cityId,
            'temperature' => $temperature,
            'forecast_date' => $forecastDate,
            'condition' => $condition,
            'possibility' => $possibility,
        ];

        if($databaseCity->todayForecast !== null) {

            $this->output->info("Forecast for today already updated.");
            return;
        }

        ForecastModel::create($forecast);
        $this->output->info("Successfully created new forecast");

    }
}
