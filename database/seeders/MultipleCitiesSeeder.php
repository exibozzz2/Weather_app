<?php

namespace Database\Seeders;

use App\Helpers\WeatherHelper;
use App\Models\CitiesModel;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class MultipleCitiesSeeder extends Seeder
{

    public function run(): void
    {
        $howManyCities = $this->command->getOutput()->ask("How many cities you want to generate?");
        $this->command->getOutput()->progressStart($howManyCities);

        $faker = Factory::create("SR_RS");

            for($i = 0; $i < $howManyCities; $i++) {



                $city = $faker->city;

                $cityExists = CitiesModel::where(['city' => $city])->first();
                if($cityExists !== null) {
                    $this->command->getOutput()->error("City already exists");
                    continue;
                }

                    CitiesModel::create([
                        'city' => $city,
                        'weather' => WeatherHelper::generateRandomCondition(),
                        'current' => rand(9, 20),
                        'minimum' => rand(3, 12),
                        'maximum' => rand(20, 30),
                    ]);
                    $this->command->getOutput()->progressAdvance(1);
                }

        $this->command->getOutput()->progressFinish();

        }

}
