<?php

namespace Database\Seeders;

use App\Models\CitiesModel;
use App\Models\ForecastModel;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MultipleDaysSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {



        foreach (CitiesModel::all() as $city) {

            $lastTemperature = 0;

            for($i = 0; $i < 5; $i++) {

                $possibility = rand(0, 1);
                $condition = \App\Helpers\WeatherHelper::generateRandomCondition();
                if($condition == "Rainy" || $condition == "Snow" || $condition == "Rain") {
                    $possibility = rand(0, 100);
                }

                $temperature = 0;
                if($lastTemperature !== null) {
                    $minTemperature = $lastTemperature-5;
                    $maxTemperature = $lastTemperature+5;
                    $temperature = rand($minTemperature, $maxTemperature);
                }

                else {
                    switch($condition) {
                        case "Sunny":
                            $temperature = rand(-20, 38);
                            break;
                        case "Cloudy":
                            $temperature = rand(-20, 15);
                            break;
                        case "Rainy":
                            $temperature = rand(-10, 38);
                            break;
                        case "Snow":#
                            $temperature = rand(-20, 1);
                            break;
                    }
                }

                ForecastModel::create ([
                    'city_id' => $city->id,
                    'temperature' => $temperature,
                    'forecast_date' => Carbon::now()->addDays($i),
                    'condition' => $condition,
                    'possibility' => $possibility,
                ]);


                $lastTemperature = $temperature;
            }
        }
    }
}
