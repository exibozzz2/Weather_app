<?php

namespace App\Console\Commands;

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

        $city = $this->argument('city');

        $response = Http::get("https://api.weatherapi.com/v1/current.json", [
            'key' => 'd63f27bc7e02432f834234615250804',
            'q' => $city,
            'aqi' => 'no',
        ]);


        $jsonResponse = $response->json();




        if(isset($jsonResponse['error'])) {
            $this->output->error("This city doesn't exists.");
            return;
        }

        dd($jsonResponse['current']['condition']['text']);

    }
}
