<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CitiesModel extends Model
{
    protected $table = 'cities';
    protected $fillable = [
        'city',
        'weather',
        'current',
        'minimum',
        'maximum',
    ];

    const CONDITIONS = ["Sun", "Sunny", "Clear", "Fog", "Rainy", "Rain", "Storm", "Cloud", "Cloudy", "Wind"];

    public function forecasts() {
        return $this->hasMany(ForecastModel::class, 'city_id', 'id')->orderBy("forecast_date");
    }
}
