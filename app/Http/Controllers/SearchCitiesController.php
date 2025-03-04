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
        $cities = CitiesModel::where('city', 'LIKE', "%$cityName%")->get();

        if(count($cities) == 0) {

             return redirect()->back()->with("error", "Not found");                                    // Check if city doesn't exists
        }

        return view('searchResults', compact('cities'));
    }
}
