<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class SingleUserCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:single-user-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command for calling single user.';

    /**
     * Execute the console command.
     */
    public function handle()
    {


        $url = 'https://reqres.in/api/users/2';
        $response = Http::get($url);

        $jsonResponse = $response->body();
        $jsonResponse = json_decode($jsonResponse, true);

        dd($jsonResponse['data']['email']);


    }
}
