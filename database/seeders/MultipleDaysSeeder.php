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
                ForecastModel::create ([
                    'city_id' => $city->id,
                    'temperature' => rand(1, 20),
                    'forecast_date' => Carbon::now()->addDays(rand(1, 30)),

                ]);
            }
        }
    }
}
