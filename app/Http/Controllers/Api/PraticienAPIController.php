<?php


namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\praticien;

class PraticienAPIController extends Controller
{

    function index(){  
        return response()->json(['error'=> 'Cette requete n\'existe pas !'],500);
      }



    /*Renvoie les informations d'un praticien si le nom est correct*/
    static function show(String $name){
        $information_praticien =  praticien::where('PRA_NOM', $name)->with('type_praticien')->first(); 
        if ($information_praticien == null){
            return response()->json(['error'=> 'Le praticien n\'existe pas.'],434);
        }
        return $information_praticien;
    }
}
