<?php

namespace App\Http\Controllers;

use App\Models\CitiesModel;
use App\Models\ForecastModel;
use Illuminate\Http\Request;

class MenageCitiesController extends Controller
{
    public function updateTemperature(Request $request) {

        $request->validate([
            'temperature' => 'required',
            'city_id' => 'required|exists:cities,id',
        ]);

        $city = CitiesModel::where(['id' => $request['city_id']])->first();

        $city->current = $request['temperature'];
        $city->save();

        return redirect()->back();







    }
}
