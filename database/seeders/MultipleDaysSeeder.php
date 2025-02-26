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
            for($i = 0; $i < 5; $i++) {

                $possibility = 0;
                $condition = \App\Helpers\WeatherHelper::generateRandomCondition();
                if($condition == "Rainy" || $condition == "Snow" || $condition == "Rain") {
                    $possibility = rand(0, 100);
                }

                ForecastModel::create ([
                    'city_id' => $city->id,
                    'temperature' => rand(-50, 38),
                    'forecast_date' => Carbon::now()->addDays(rand(1, 30)),
                    'condition' => $condition,
                    'possibility' => $possibility,
                ]);
            }
        }
    }
}
