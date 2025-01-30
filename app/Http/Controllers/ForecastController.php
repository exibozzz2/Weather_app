<?php

namespace App\Http\Controllers;

use App\Models\CitiesModel;
use App\Models\ForecastModel;
use Illuminate\Http\Request;

class ForecastController extends Controller
{
    public function index()
    {

        $forecasts = ForecastModel::all();
        return view('forecasts', compact('forecasts'));
    }
}
