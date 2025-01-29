<?php

namespace Database\Seeders;

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

                CitiesModel::create([
                    'city' => $faker->city,
                    'weather' => $faker->word,
                    'current' => rand(9, 26),
                    'minimum' => rand(3, 12),
                    'maximum' => rand(12, 30),
                    ]);

                $this->command->getOutput()->progressAdvance(1);
            }

        $this->command->getOutput()->progressFinish();

        }

}
