<?php

namespace Database\Seeders;

use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class SingleUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $name = $this->command->getOutput()->ask("Enter new name:", "Ognjen");

        $email = $this->command->getOutput()->ask("Enter new email:");
        if($email === null) {
            $this->command->getOutput()->error("Email needs to be entered.");
            return;
        }

        $user = User::where(['email' => $email])->first();

        if ($user instanceof User) {
            $this->command->getOutput()->error("Email already exists.");
            return;
        }

        $password = $this->command->getOutput()->ask("Enter new password:", "1234");

        $this->command->getOutput()->progressStart(1);

        User::create ([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password),
        ]);

        $this->command->getOutput()->progressAdvance(1);
        $this->command->getOutput()->progressFinish();
        $this->command->getOutput()->info("User created successfully.");







    }
}
