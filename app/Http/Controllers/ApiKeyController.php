<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\apiKey;
class ApiKeyController extends Controller
{
    function getView(){

        return view("API/CreateNewKey");
    }


    function CreateKey(){
        $returnKey = ""; 
        //Toute les clés font 10 de longueur
        /**Creation de la clé */
        $key = new apiKey();
        $key->API_KEY = $this->generateRandomString(10);
        $returnKey = $key->API_KEY; //Valeur a return
        $key->save();
        return view("API/CreateNewKey")->with(['returnKey' => $returnKey]);
    }



/**
 * Genere une chaine de caracte de façon aléatoire 
 */
   public function generateRandomString($length) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}
