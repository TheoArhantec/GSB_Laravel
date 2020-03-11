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


Route::resource('commande','CommandeAPIController');

Route::middleware('auth:web')->get('/user', function (Request $request) {
    return $request->user();
});


//      /api/visiteur
Route::namespace('Api')->group(function() {
    Route::apiResource('visiteur', 'VisiteurAPIController');
});


        
