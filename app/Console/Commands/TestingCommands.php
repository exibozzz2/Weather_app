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
    protected $signature = 'app:testing-commands';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
//    https://api.weatherapi.com/v1/current.json?key=d63f27bc7e02432f834234615250804&q=Barcelona&aqi=no
    public function handle()
    {

        $response = Http::get("https://api.weatherapi.com/v1/current.json?key=d63f27bc7e02432f834234615250804&q=Barcelona&aqi=no", [
            'key' => 'd63f27bc7e02432f834234615250804',
            'q' => 'Barcelona',
            'aqi' => 'no',
        ]);

        $jsonResponse = $response->json();
        dd($jsonResponse['location']['lat']);

    }
}
