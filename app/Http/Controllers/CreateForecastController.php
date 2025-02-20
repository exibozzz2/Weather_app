<?php

namespace App\Http\Controllers;

use App\Models\ForecastModel;
use Illuminate\Http\Request;

class CreateForecastController extends Controller
{
    public function createForecast(Request $request) {

        $request->validate([
            'city_id' => 'required|exists:cities,id',
            'temperature' => 'required|numeric',
            'forecast_date' => 'required',
            'condition' => 'required',
        ]);

        ForecastModel::create($request->all());
        return redirect()->back();
    }
}
