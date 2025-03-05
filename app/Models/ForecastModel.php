<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ForecastModel extends Model
{
    protected $table = "forecasts";

    protected $fillable = [
        'city_id', 'temperature', 'forecast_date', 'condition', 'possibility',
    ];

    protected $casts = [ 'forecast_date' => 'datetime' ];


    const DAY = ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday" ];
}
