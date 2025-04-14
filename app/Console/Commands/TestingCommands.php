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


        $response = Http::get("https://api.weatherapi.com/v1/current.json", [
            'key' => env("WEATHER_API_KEY"),
            'q' => $this->argument('city'),
            'aqi' => 'no',
            'lang' => 'ru',
        ]);


        $jsonResponse = $response->json();

        if(isset($jsonResponse['error'])) {
            $this->output->error("This city doesn't exists.");
            return;
        }

        dd($jsonResponse['current']['condition']['text']);

    }
}
