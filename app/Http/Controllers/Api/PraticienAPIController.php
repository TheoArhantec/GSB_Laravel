<?php


namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\praticien;
use App\apiKey;
use App\Http\Controllers\ApiKeyController;

class PraticienAPIController extends Controller
{

    function index(){  
        return response()->json(['error'=> 'Cette requete n\'existe pas !'],500);
      }

    /*Renvoie les informations d'un praticien si le nom est correct*/
    static function show(String $name, String $ApiKey){
        $liste_valid_key = apiKey::all();
        $GetApi = false;
        //test si la clé est valide
        foreach($liste_valid_key as $key){
            if ($key->API_KEY == $ApiKey){
                $GetApi = true;
            }
        }
        //si Vrai alors on continue la fonction
        //sinon on retourne un message d"erreur JSON (420)
        if($GetApi == true){
            $information_praticien =  praticien::where('PRA_NOM', $name)->with('type_praticien')->get(); 
                if ($information_praticien == null){
                    //si le praticien n'existe pas
                    return response()->json(['error'=> 'Le praticien n\'existe pas.'],434);
                }
               //return les informations du praticien 
               $data = array();
            return $data = PraticienAPIController::setPraticienArray($information_praticien);
                }else{
                    //si la clé de l'api est invalide
                    return response()->json(['error'=> 'Clé invalide'],420);
                }
        }


  static public function setPraticienArray($rawQuery){
        $praticienData = array();

        //compteur
        $i = 0;
        foreach($rawQuery as $object){
            $praticienData[$i]['PRA_NOM'] =  $object->PRA_NOM;
            $praticienData[$i]['PRA_PRENOM'] =  $object->PRA_PRENOM;
            $praticienData[$i]['PRA_ADRESSE'] =  $object->PRA_ADRESSE;
            $praticienData[$i]['PRA_CP'] =  $object->PRA_CP;
            $praticienData[$i]['PRA_VILLE'] =  $object->PRA_VILLE;
            $praticienData[$i]['TYP_LIBELLE'] =  $object->type_praticien->TYP_LIBELLE;
            $praticienData[$i]['TYP_LIEU'] = $object->type_praticien->TYP_LIEU;
            $i++;
            }
        return $praticienData;
    }

        /* Function qui permet d'afficher la documentation de l'api */
        public function SelectPraticien(){
            $data = ['praticiens' => praticien::all(),];
            return view('Api/PraticienAPI',$data);
        }

        public function getApiResult(Request $request){
            $nomPraticien = $request->input('visiteurAPI');
            $result = PraticienAPIController::show($nomPraticien,ApiKeyController::getAdminKey());
            $data = ['praticiens' => praticien::all(),
                    'result' => $result,
                    'name'  => $nomPraticien,];

                    
        return view('Api/PraticienAPI', $data);
        }


}