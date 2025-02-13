<?php



namespace App\Helpers;

class WeatherHelper {

    public static function generateRandomCondition (){


        $weather = ['Sun', 'Fog', 'Rainy', 'Rain', 'Sunny', 'Storm', 'Cloudy', 'Wind'];
        return $weather[array_rand($weather)];
    }
}
