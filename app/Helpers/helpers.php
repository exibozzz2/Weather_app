<?php


if (!function_exists('random_weather')) {
    function random_weather()
    {
        $weather_conditions = ['Sun', 'Fog', 'Rainy', 'Rain', 'Sunny', 'Storm', 'Cloudy', 'Wind'];
        return $weather_conditions[array_rand($weather_conditions)];
    }
}


?>
