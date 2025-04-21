<?php

namespace App\Http\Controllers;

use App\Models\CitiesModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;

class SearchCitiesController extends Controller
{
    public function searchCities(Request $request) {

        $request->validate([
            'search' => 'required',
        ]);

        $cityName = $request->get('search');

        Artisan::call("app:testing-commands", ['city' => $cityName]);

        $cities = CitiesModel::with("todayForecast")->where('city', 'LIKE', "%$cityName%")->get();      // With added to simplify query search only for today (Carbon now in Cities Model)

        if(count($cities) == 0) {

             return redirect()->back()->with("error", "No Results Found.");              // Check if city doesn't exists
        }

        $userFavourites = [];
        if(Auth::check())
        {
            $userFavourites = Auth::user()->favourites;
            $userFavourites = $userFavourites->pluck("city_id")->toArray();
        }


        return view('searchResults', compact('cities', 'userFavourites'));
    }
}
