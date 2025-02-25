<?php

namespace App\Helpers;



class ColorHelper {

    public static function getColorByTemperature($temperature) {



        if($temperature < 0) {
            $color = "blue";
        }
        else if($temperature >= 1 && $temperature <= 15) {
            $color = "green";
        }
        else {
            $color = "red";
        }

        return $color;
    }


}
