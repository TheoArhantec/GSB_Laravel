<?php
namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\praticien;
use App\User;
use App\visiteur;
use App\rapport_visite;
use App\ApiKey;


class VisiteurAPIController extends Controller
{
    function index()
    {
        return response()->json(['error'=> 'Cette requete n\'existe pas !'],500);
    }
        /**
         * Request with a visiteur name 
         */
        static function show(String  $nom, string $ApiKey)
        {


            $liste_valid_key = apiKey::all();
            $GetApi = false;
            //test si la clé est valide
            foreach($liste_valid_key as $key){
                if ($key->API_KEY == $ApiKey){
                    $GetApi = true;
                }
            }
            if($GetApi == false){
                return response()->json(['error'=> 'Clé invalide'],420);
              }
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

            if ($data == "[]"){
                return response()->json(['error'=> 'Aucun rapport trouvé'],415);
              }
            $doublon = array();
            //Compteur du tableau
            $i = 0;
            foreach($data as $object){
                if(!(in_array($object->praticien->PRA_NOM,$doublon))){
                $tableau[$i]['Nom_Praticien'] =  $object->praticien->PRA_NOM;
                $tableau[$i]['Prenom_Praticien'] =  $object->praticien->PRA_PRENOM;
                $tableau[$i]['Praticien_adresse'] =  $object->praticien->PRA_ADRESSE;
                $tableau[$i]['Praticien_cp'] =  $object->praticien->PRA_CP;
                $tableau[$i]['Praticien_ville'] =  $object->praticien->PRA_VILLE;
                $tableau[$i]['Nom_visiteur'] =  $object->User->name;
                $tableau[$i]['Prenom_visiteur'] = $object->User->PRENOM;
                
                array_push($doublon,$object->praticien->PRA_NOM ); // On stock les praticien déjà rentrer dans la $var doublon
                $i++;
                }
            }
            //  On retourne le Tableau une fois la boucle terminée
            return $tableau;
        
        }

/* Function qui permet d'afficher la documentation de l'api */
        public function SelectVisiteur(){
            $data = ['visiteurs' => user::all(),];
            return view('Api/visiteurAPI',$data  );
        }
    
    
    
        public function getApiResult(Request $request){
            $nomVisiteur = $request->input('visiteurAPI');
            $result = VisiteurAPIController::show($nomVisiteur);
            $data = ['visiteurs' => user::all(),
                     'result' => $result,
                     'name'  => $nomVisiteur,];
    
           return view('Api/visiteurAPI', $data);
        }
}