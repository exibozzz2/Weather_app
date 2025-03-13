<?php

namespace App\Http\Controllers;

use App\Models\CitiesModel;
use App\Models\UserFavouritesModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserFavouritesController extends Controller
{
    public function favourites(Request $request, $city) {

            $user = Auth::user();

            if($user === null)
            {
                return redirect()->back()->with(['error' => "You need to be logged in."]);
            }

            UserFavouritesModel::create([
                'user_id' => $user->id,
                'city_id' => $city,
            ]);

            return redirect()->back();

    }

    public function unfavourite(Request $request, $city) {

        $user = Auth::user();
        if($user === null)
        {
            return redirect()->back()->with(['error' => "You need to be logged in."]);
        }

        $userFavourite = UserFavouritesModel::where([
            'city_id' => $city,
            'user_id' => $user->id,
            ])->first();

        $userFavourite->delete();

        return redirect()->back();

    }
}
