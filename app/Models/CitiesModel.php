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

    public function city() {
        return $this->hasMany(ForecastModel::class, 'city_id', 'id');
    }
}
