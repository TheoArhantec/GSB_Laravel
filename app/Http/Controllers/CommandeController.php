<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\rapport_visite;
use App\medicament;
use App\boite_medicament;
use App\User;
use App\praticien;
use App\offrir;
use App\Http\Controllers\Api\CommandeAPIController;
use App\Http\Controllers\ApiKeyController;



class CommandeController extends Controller
{
    //Affiche la docuementation de l'api commande
    function selectCommande(){
        $data = ['praticiens' => praticien::all(),];
        return view('Api/commandeApi',$data  );
    }
    //Simule l'utilisation de l'api commande 
    //pour la documentation
    function getApiResult(Request $request){
      $nom_praticien = $request->input('CommandeAPI');
      $result  = CommandeAPIController::show($nom_praticien,ApiKeyController::getAdminKey());
      //Verification du resultat
      if ($this->isError($result) == true){
        $result =  "Error";
      }
      //données
      $data = ['result' => $result,
              'praticiens' => praticien::all(),
              'nom_praticien' => $nom_praticien,];
      
                return view('Api/commandeApi',$data);
    }
      
    
    //Permet de savoir si la varible est un array ou un json 
    function isError($var){
      //determine le type de la variable
      //si array on retoune faux 
      //sinon on continue de verifier
      $type = gettype($var);
      if ($type != "array"){
        $test = $var->getData();
        //Apres avoir recuperer les données du JSON avec getData()
        //On test si le nom de la donnée est error
          foreach ($test as $t){
            //Si la premiere case est "Error" on retourne TRUE
            if ($t[0] != "error")
              return true;
            }
          }
      return false;
    }
    
}
