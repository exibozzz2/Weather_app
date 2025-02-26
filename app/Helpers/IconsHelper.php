<?php

namespace App\Helpers;

class IconsHelper
{



    public static function getIconByCondition($weather)
    {
        $icons = [
            "Sunny" => "sun.png",
            "Sun" => "sun.png",
            "Clear" => "sun.png",
            "Fog" => "fog.png",
            "Cloudy" => "cloudy.png",
            "Cloud" => "cloud.png",
            "Rain" => "rain.png",
            "Rainy" => "rainy.png",
            "Snow" => "snow.png",
            "Wind" => "wind.png",
            "Storm" => "storm.png"
        ];

        return isset($icons[$weather]) ? url('/images/' . $icons[$weather]) : null;
    }
}

//$url = self::WEATHER_ICONS[$type] //$url = self::WEATHER_ICONS[$type]
