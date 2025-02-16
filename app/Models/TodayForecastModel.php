<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TodayForecastModel extends Model
{

    protected $table = "today_forecast";
    protected $fillable = [
      'city_id', 'temperature',
    ];

    public function city() {
        return $this->hasOne(CitiesModel::class, 'id', 'city_id');
    }

}
