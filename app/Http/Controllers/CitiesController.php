<?php

namespace App\Http\Controllers;

use App\Models\CitiesModel;
use Illuminate\Http\Request;

class CitiesController extends Controller
{
    public function getAllCities() {
        $cities = CitiesModel::all();
        return view('weatherCast', compact('cities'));
    }

    public function addNewCity(Request $request) {

        $request->validate([
            'city' => 'min:3|required',
            'weather' => 'required',
            'current' => 'required',
            'minimum' => 'required',
            'maximum' => 'required',
        ]);

        CitiesModel::create([
                'city' => $request->city,
                'weather' => $request->weather,
                'current' => $request->current,
                'minimum' => $request->minimum,
                'maximum' => $request->maximum,
            ]);

        return redirect("/");
    }


    public function viewSingleCity( CitiesModel $city) {
        return view('/admin/editCity', compact('city'));
    }

    public function update(Request $request, CitiesModel $city ) {

        $city->city = $request->get('city');
        $city->weather = $request->get('weather');
        $city->current = $request->get('current');
        $city->minimum = $request->get('minimum');
        $city->maximum = $request->get('maximum');
        $city->save();

        return redirect("/");

    }

    public function delete(CitiesModel $city) {

        $city->delete();
        return redirect()->back();
    }
}
