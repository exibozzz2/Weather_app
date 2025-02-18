<?php

namespace App\Http\Controllers;

use App\Models\CitiesModel;
use App\Models\ForecastModel;
use Illuminate\Http\Request;

class ForecastController extends Controller
{
    public function index(CitiesModel $city)
    {

        $forecasts = ForecastModel::all();
        return view('forecasts', compact('forecasts'));
    }

    public function singleCity(CitiesModel $city) {

        $singleCityForecasts = ForecastModel::where(['city_id' => $city->id])->get();
        return view('singleCityForecasts', compact('singleCityForecasts'));
    }
}
