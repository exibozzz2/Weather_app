<?php



namespace App\Helpers;

class WeatherHelper {

    public static function generateRandomCondition (){

        $weather = ['Sun', 'Sunny', 'Clear', 'Fog', 'Rainy', 'Rain', 'Storm', 'Cloud', 'Cloudy', 'Wind', 'Snow',];
        return $weather[array_rand($weather)];
    }
}
