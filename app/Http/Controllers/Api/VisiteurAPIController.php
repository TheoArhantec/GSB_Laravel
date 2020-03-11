<?php
namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\User;

class VisiteurAPIController extends Controller
{
    function index()
    {
         $data = [
        'id'=> Auth::user()->id,
        'name'=> Auth::user()->name,
        'PRENOM'=> Auth::user()->PRENOM,
        'DATE_EMBAUCHE'=> Auth::user()->DATE_EMBAUCHE,
    
    ];
    return $data;
    }
    
        /**
         * Request with a visiteur name 
         */
         function show(String  $nom)
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
            //  Boucle qui permet les données de chaque praticiens concernant me visiteur
            $doublon = array();
            foreach($data as $key => $object){
                if(!(in_array($object->praticien->PRA_NOM,$doublon))){
                $tableau[$key]['Nom_Praticien'] =  $object->praticien->PRA_NOM;
                $tableau[$key]['Prenom_Praticien'] =  $object->praticien->PRA_PRENOM;
                $tableau[$key]['Nom_visiteur'] =  $object->User->name;
                $tableau[$key]['Prenom_visiteur'] = $object->User->PRENOM;
                array_push($doublon,$object->praticien->PRA_NOM );
                }
            }
            //  On retourne le Tableau une fois la boucle terminée
            return $tableau;
        
        }
}