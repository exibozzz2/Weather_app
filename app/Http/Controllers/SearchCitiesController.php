<?php

namespace App\Http\Controllers;

use App\Models\CitiesModel;
use Illuminate\Http\Request;

class SearchCitiesController extends Controller
{
    public function searchCities(Request $request) {

        $request->validate([
            'search' => 'required',
        ]);

        $cityName = $request->get('search');
        $cities = CitiesModel::with("todayForecast")->where('city', 'LIKE', "%$cityName%")->get();

        if(count($cities) == 0) {

             return redirect()->back()->with("error", "No Results Found.");              // Check if city doesn't exists
        }


        return view('searchResults', compact('cities'));
    }
}
