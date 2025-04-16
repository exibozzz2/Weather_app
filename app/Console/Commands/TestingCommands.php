<?php

namespace App\Console\Commands;

use App\Models\CitiesModel;
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

        $databaseCity = CitiesModel::where(['city' => $this->argument('city')])->first();
        dd($databaseCity->city, $databaseCity->id);

        $response = Http::get(env("WEATHER_API_URL")."v1/forecast.json", [
            'key' => env("WEATHER_API_KEY"),
            'q' => $this->argument('city'),
            'aqi' => 'no',
            'lang' => 'ru',
            'days' => 1,
        ]);


        $jsonResponse = $response->json();



        if(isset($jsonResponse['error'])) {
            $this->output->error("This city doesn't exists.");
            return;
        }

        dd($jsonResponse['current']['condition']['text']);

    }
}
