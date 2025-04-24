<?php

namespace App\Http\Controllers;

use App\Models\CitiesModel;
use App\Models\ForecastModel;
use App\Models\TodayForecastModel;
use Illuminate\Http\Request;

class TodayForecastController extends Controller
{
    public function index()
    {
        $todayForecasts = CitiesModel::all();
        return view('todayForecast', compact('todayForecasts'));
    }

}
