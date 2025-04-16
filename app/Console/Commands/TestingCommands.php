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

        $databaseCity = CitiesModel::where(['city' => $this->argument('city')])->first();

        $response = Http::get(env("WEATHER_API_URL")."v1/forecast.json", [
            'key' => env("WEATHER_API_KEY"),
            'q' => $this->argument('city'),
            'aqi' => 'no',
            'lang' => 'en',
        ]);

        $jsonResponse = $response->json();

        // if city doesn't exists
        if($databaseCity === null) {
            CitiesModel::create([
                'city' => $this->argument('city'),
                'weather' => $jsonResponse['current']['condition']['text'],
            ]);
            $this->output->comment("Successfully created new city");
        }

        if(isset($jsonResponse['error'])) {
            $this->output->error("This city doesn't exists.");
            return;
        }

          $cityId = $databaseCity->id;
          $temperature = $jsonResponse['current']['temp_c'];
          $forecastDate = $jsonResponse['forecast']['forecastday']['0']['date'];
          $condition = $jsonResponse['current']['condition']['text'];
          $possibility = $jsonResponse['forecast']['forecastday']['0']['day']['daily_will_it_rain'];

        $forecast = [
            'city_id' => $cityId,
            'temperature' => $temperature,
            'forecast_date' => $forecastDate,
            'condition' => $condition,
            'possibility' => $possibility,
        ];

        if($databaseCity->todayForecast !== null) {

            $this->output->comment("Forecast for today already updated.");
            return;
        }

        ForecastModel::create($forecast);
        $this->output->comment("Successfully created new forecast");





    }
}
