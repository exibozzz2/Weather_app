<?php

namespace Database\Seeders;

use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class MultipleUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $amount = $this->command->getOutput()->ask("How many users you want to insert in database?", 20);

        $password = $this->command->getOutput()->ask("Enter new password for these users.", "1234");

        $faker = Factory::create("SR_RS");

        $this->command->getOutput()->progressStart($amount);

        for($i = 0; $i < $amount; $i++) {

        User::create([
            'name' => $faker->name,
            'email' => $faker->email,
            'password' => Hash::make($password),
        ]);

            $this->command->getOutput()->progressAdvance(1);
        }

        $this->command->getOutput()->progressFinish();
        $this->command->info('Users added successfully.');
    }


}
