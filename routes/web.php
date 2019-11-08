<?php

use App\Http\Controllers\visiteurController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', "visiteurController@listeVisiteur");
//Route::get('/', function () {return view('welcome');});
