<?php

namespace App\Http\Controllers;

use App\Models\CitiesModel;
use App\Models\UserFavouritesModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserFavouritesController extends Controller
{
    public function favourites(Request $request, CitiesModel $city) {


            $user = Auth::user();



            if($user === null)
            {
                return redirect()->back()->with(['error' => "You need to be logged in."]);
            }






    }
}
