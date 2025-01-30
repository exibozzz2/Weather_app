<?php

namespace App\Http\Controllers;

use App\Models\ForecastModel;
use App\Models\TodayForecastModel;
use Illuminate\Http\Request;

class TodayForecastController extends Controller
{
    public function index()
    {

        $todayForecasts = TodayForecastModel::all();
        return view('todayForecast', compact('todayForecasts'));
    }
}
