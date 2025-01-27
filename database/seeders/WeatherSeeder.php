<?php

namespace Database\Seeders;

use App\Models\CitiesModel;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WeatherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $city = $this->command->getOutput()->ask("Which city you want to enter?");
        if($city === null) {
            $this->command->getOutput()->error("Empty input city...");
            return;
        }

        $weather = $this->command->getOutput()->ask("How is the weather in $city?");
        if($weather === null) {
            $this->command->getOutput()->error("Empty input weather...");
            return;
        }

        $currentTemperature = $this->command->getOutput()->ask("What is the current temperature in $city?");
        $minimumTemperature = $this->command->getOutput()->ask("What is the minimum temperature in $city?");
        $maximumTemperature = $this->command->getOutput()->ask("What is the maximum temperature in $city?");


            CitiesModel::create([

                'city' => $city,
                'weather' => $weather,
                'current' => $currentTemperature,
                'minimum' => $minimumTemperature,
                'maximum' => $maximumTemperature,

            ]);

            $this->command->info("Successfully added new city!");

    }
}
