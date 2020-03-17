<?php
namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\praticien;
use App\User;
use App\visiteur;
use App\rapport_visite;

use Illuminate\Support\Facades\Auth;


class VisiteurAPIController extends Controller
{
    function index()
    {
        return response()->json(['error'=> 'Cette requete n\'existe pas !'],500);
    }
    
        /**
         * Request with a visiteur name 
         */
        static function show(String  $nom)
        {
            $tableau = array();
            //  Pour un visiteur donné on donne la liste des praticien le concernant 
            //  Faut regarder dans le rapport de visite
            //  Ex : return rapport_visite::with('praticien')->where('ID_USER',Auth::user()->id)->get();
    
            //  Le model de USERS rend le non de chaque Visiteur Unique
            //  Il suffit de faire une simple conditions sur le champs "name" pour
            //  retrouver l'id
            $id_Visiteur = USER::where('name', $nom)->first();
            //  Si le visiteur n'existe pas on renvoie un msg d'erreur
            if ($id_Visiteur == null){
                return response()->json(['error'=> 'Le visiteur n\'existe pas.'],416);
              }
          
            //  Requete qui permet de recuperer les informations sur chaque praticien 
            $data = rapport_visite::with(['praticien','user'])->where('ID_USER',$id_Visiteur->id)->get(); 
            //Tableau pour filtrer les doublons
            $doublon = array();
            //Compteur du tableau
            $i = 0;
            foreach($data as $object){
                if(!(in_array($object->praticien->PRA_NOM,$doublon))){
                $tableau[$i]['Nom_Praticien'] =  $object->praticien->PRA_NOM;
                $tableau[$i]['Prenom_Praticien'] =  $object->praticien->PRA_PRENOM;
                $tableau[$i]['Nom_visiteur'] =  $object->User->name;
                $tableau[$i]['Prenom_visiteur'] = $object->User->PRENOM;
                array_push($doublon,$object->praticien->PRA_NOM ); // On stock les praticien déjà rentrer dans la $var doublon
                $i++;
                }
            }
            //  On retourne le Tableau une fois la boucle terminée
            return $tableau;
        
        }
}