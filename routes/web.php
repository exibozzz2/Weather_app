<?php

use App\Http\Controllers\CitiesController;
use App\Http\Controllers\CreateForecastController;
use App\Http\Controllers\ForecastController;
use App\Http\Controllers\MenageCitiesController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SearchCitiesController;
use App\Http\Controllers\TodayForecastController;
use App\Http\Controllers\UserFavouritesController;
use App\Http\Middleware\CitiesMiddleware;
use Illuminate\Support\Facades\Route;


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


// Client access
Route::get('/', [CitiesController::class, 'getAllCities'])->name('getAllCities');
Route::get('/forecasts', [ForecastController::class, 'index'])->name('forecasts');
Route::get('/currentForecast', [TodayForecastController::class, 'index'])->name('todayForecast');
Route::get('/forecasts/{city:city}', [ForecastController::class, 'singleCity'])->name('singleCityForecast');
// Search routes
Route::view('/search', 'searchCity')->name('searchCities');
Route::get('/search-cities', [SearchCitiesController::class, 'searchCities'])->name('searchCitiesGet');
Route::view('/search-results', 'searchResults')->name('searchResults');
Route::view('/error', 'error')->name('error');

// Auth access
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/favourites/{city}', [UserFavouritesController::class, 'favourites'])->name('favourites');
});

// Admin access

Route::middleware(['auth', CitiesMiddleware::class ])->prefix("admin")->group(function(){
    Route::view('/add-city', '/admin/addCity')->name('addCity');
    Route::post('/add-city-post', [CitiesController::class, 'addNewCity'])->name('addNewCity');
    Route::get('/edit-city/{city}', [CitiesController::class, 'viewSingleCity'])->name('editCity');
    Route::post('/edit-city-post/{city}', [CitiesController::class, 'update'])->name('editCityToBase');
    Route::get('/delete-city/{city}', [CitiesController::class, 'delete'])->name('deleteCity');
    // Menage Temperature
    Route::view('/menage-cities', '/admin/menageTemperature')->name("menageCities");
    Route::post('/menage-cities/update', [MenageCitiesController::class, 'updateTemperature'])->name('updateTemperature');
    // Add new Forecast
    Route::view('/add-forecast', '/admin/addNewForecast')->name('addForecast');
    Route::post('/add-forecast/create', [CreateForecastController::class, 'createForecast'])->name('createForecast');
});

require __DIR__.'/auth.php';
