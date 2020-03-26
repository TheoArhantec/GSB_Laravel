<?php

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
//      /api/visiteur
Route::namespace('Api')->group(function() {
    //ANCIENNE ROUTE POUR LES APIS
    //Route::apiResource('visiteur','VisiteurAPIController');
    //Route::apiResource('commande', 'CommandeAPIController');
    //Route::apiResource('praticien','PraticienAPIController');
    Route::get('visiteur/{name}/{ApiKey}','VisiteurAPIController@show');
    Route::get('commande/{name}/{ApiKey}', 'CommandeAPIController@show');
    Route::get('praticien/{name}/{ApiKey}','PraticienAPIController@show');
});



Route::middleware('web')->get('/user', function (Request $request) {
    return $request->user();
});




