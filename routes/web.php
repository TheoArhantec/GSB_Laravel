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




Route::middleware('auth')->group(function(){

    //Page statique 
    Route::get('/visiteur', "visiteurController@listeVisiteurAvecLabo")->name("gsb.visiteur");
    Route::get('/medicament',"medicamentController@listeMedicaments")->name("gsb.medicament");
    Route::get('/praticien',"praticienController@listePraticien")-> name("gsb.practicien");

    //permet la modification du profil par un utilisateur
    Route::get('/profil',"visiteurController@getProfil")->name("gsb.modif");
    //permet l'edition de nouveau rapport de visite
    Route::get('/compte_rendus', "rapport_visiteController@listeCompteRendus");
    Route::get('/compte_rendus/new',"rapport_visiteController@newCompteRendus")->name('gsb.newCompteRendus');

    /**
    * Route qui recherche les practiciens par type/ville/nom
    */
    Route::post('/praticien',"praticienController@praticienParType")->name('gsb.practype');
    
    /**
    *Permet de faire un PDF avec un compte-rendu donné
    */
    Route::get('/pdf',"rapport_visiteController@PDF")->name('gsb.pdf');
    Route::post('/compte_rendus', "rapport_visiteController@createNewCompteRendus")-> name("gsb.newCR");

    /**
    * Route qui met à jour le profil de l'utilisateur
    */
    Route::post('/home',"visiteurController@updateProfil")->name("gsb.update");


});

/**
 * Interface de l'API
 */
Route::get('/visiteurs/documentation/api','Api\VisiteurAPIController@SelectVisiteur')->name('gsb.visiteur.api');
Route::post('/visiteurs/documentation/api/result','Api\VisiteurAPIController@getApiResult')->name('gsb.api.visiteurResult');

Route::get('/commandes/documentation/api','CommandeController@selectCommande')->name('gsb.commande.api');
Route::post('/commandes/documentation/api/result','CommandeController@getApiResult')->name('gsb.api.commandeResult');




Route::get('/deconnexion', function() {
    return view('login/deconnection');
})->name('gsb.deco');

/**
 * Route qui gere le login/register/logout/...
 */
Auth::routes(['register' => false,
    'verify' => true,
    'reset' => false]);


