<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\rapport_visiteController;


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

/**
 * Affiche la page Home
 */
Route::get('/',"HomeController@homeView")->name("gsb.home");
Route::get('/home', 'HomeController@homeView')->name('home');


/**
 * Interface de l'API
 */
Route::get('/visiteurs/documentation/api','visiteurController@SelectVisiteur')->name('gsb.visiteur.api');
Route::post('/visiteurs/documentation/api/result','visiteurController@getApiResult')->name('gsb.api.visiteurResult');

Route::get('/commandes/documentation/api','CommandeController@selectCommande')->name('gsb.commande.api');
Route::post('/commandes/documentation/api/result','CommandeController@getApiResult')->name('gsb.api.commandeResult');




/**
 * Groupe de route qui permet
 * l'affichage toutes les pages "statique"
 */
Route::get('/visiteur', "visiteurController@listeVisiteurAvecLabo")->name("gsb.visiteur")->middleware('auth');
Route::get('/medicament',"medicamentController@listeMedicaments")->name("gsb.medicament");
Route::get('/praticien',"praticienController@listePraticien")-> name("gsb.practicien")->middleware('auth');
Route::get('/profil',"visiteurController@getProfil")->name("gsb.modif")->middleware('auth');
Route::get('/compte_rendus', "rapport_visiteController@listeCompteRendus")->name("gsb.compte_rendus");
Route::get('/compte_rendus/new',"rapport_visiteController@newCompteRendus")->name("gsb.newCompteRendus");

/**
 * Route qui recherche les practiciens par type/ville/nom
 */
Route::post('/praticien',"praticienController@praticienParType")->name('gsb.practype')->middleware('auth');

/**
 * Permet de faire un PDF avec un compte-rendu donné
 */
Route::get('/pdf',"rapport_visiteController@PDF")->name('gsb.pdf')->middleware('auth');
Route::post('/compte_rendus', "rapport_visiteController@createNewCompteRendus")-> name("gsb.newCR")->middleware('auth');

/**
 * Route qui met à jour le profil de l'utilisateur
 */
Route::post('/home',"visiteurController@updateProfil")->name("gsb.update")->middleware('auth');


Route::get('/deconnexion', function() {
    return view('login/deconnection');
})->name('gsb.deco');

/**
 * Route qui gere le login/register/logout/...
 */
Auth::routes(['register' => false,
    'verify' => true,
    'reset' => false]);


