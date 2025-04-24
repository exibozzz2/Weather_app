<?php

namespace App\Helpers;

class IconsHelper
{



    public static function getIconByCondition($weather)
    {

        $icon = match($weather) {


    // Sun
            "Sunny", "Sun", "Clear", "Overcast" => "sun.png",

    // 🌫️ FOG
            "Mist", "Fog", "Freezing fog" => "fog.png",

    // 🌧️ RAIN
            "Rain",
            "Patchy rain nearby",
            "Patchy light rain in area with thunder",
            "Patchy rain possible",
            "Patchy light drizzle",
            "Light drizzle",
            "Freezing drizzle",
            "Heavy freezing drizzle",
            "Patchy light rain",
            "Light rain",
            "Moderate rain at times",
            "Moderate rain",
            "Heavy rain at times",
            "Heavy rain",
            "Light freezing rain",
            "Moderate or heavy freezing rain" => "rain.png",

    // 🌦️ RAINY
            "Rainy",
            "Light rain",
            "Light rain shower",
            "Moderate or heavy rain shower",
            "Torrential rain shower" => "rainy.png",

    // ❄️ SNOW
            "Patchy snow possible",
            "Patchy sleet possible",
            "Light sleet",
            "Moderate or heavy sleet",
            "Patchy light snow",
            "Light snow",
            "Patchy moderate snow",
            "Moderate snow",
            "Patchy heavy snow",
            "Heavy snow",
            "Ice pellets",
            "Light sleet showers",
            "Moderate or heavy sleet showers",
            "Light snow showers",
            "Moderate or heavy snow showers",
            "Light showers of ice pellets",
            "Moderate or heavy showers of ice pellets" => "snow.png",

    // 💨 WIND
            "Wind",
            "Blowing snow",
            "Blizzard" => "wind.png",

    // 🌩️ STORM
            "Storm",
            "Thundery outbreaks possible",
            "Patchy light rain with thunder",
            "Moderate or heavy rain with thunder",
            "Patchy light snow with thunder",
            "Thundery outbreaks in nearby",
            "Moderate or heavy snow with thunder" => "storm.png",

    // ☁️ CLOUD
            "Cloud" => "cloud.png",

    // 🌥️ CLOUDY
            "Cloudy",
            "Partly cloudy" => "cloudy.png",

    // ❓ DEFAULT
            default => "sun.png",
};
return $icon;

    }
}

//        return isset($icons[$weather]) ? url('/images/' . $icons[$weather]) : null;
//        $url = self::WEATHER_ICONS[$type] //$url = self::WEATHER_ICONS[$type]

//
//if(in_array($weather, self::ICONS)) {
//
//    return self::ICONS[$weather];
//}
//else if($weather === null) {
//    return "sun.png";
//}
//return "sun.png";
//}
