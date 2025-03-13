<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserFavouritesModel extends Model
{
    protected $table = 'user_favourites';

    protected $fillable = [
        'user_id', 'city_id',
    ];

    public function relationToCities()
    {
        return $this->hasOne(CitiesModel::class, 'id', 'city_id');
    }

}
