<?php

namespace Database\Seeders;

use App\Models\CitiesModel;
use App\Models\ForecastModel;
use App\Models\TodayForecastModel;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TodayForecastSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (CitiesModel::all() as $city) {
                TodayForecastModel::create([
                   'city_id' => $city->id,
                   'temperature' => $city->current,
                ]);
            }
    }
}
