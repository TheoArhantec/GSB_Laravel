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

class CommandeAPIController extends Controller
{
  function index(){
    $data = ['praticiens' => praticien::all(),];
    return view('Api/commandeApi',$data  );
  }

/**
 * Retoune les medicament à commander par praticien
 */
  function show (String $nom){
    //  Requete qui permet de recuperer l'id du praticien a partir de son nom
    $id_Praticien = praticien::where('PRA_NOM', $nom)->first(); 
    if ($id_Praticien == null){
          return response()->json(['error'=> 'Le praticien n\'existe pas.'],415);
    }
    //  Requete pour obtenir la liste des rapports oû le praticien est présent
    $liste_rapport = rapport_visite::select('id')->where('ID_PRATICIEN', '=',$id_Praticien->id)->get();
    //  Boucle Rapide qui recupere l'id de chaque rapport
    $liste_rapport_id = array();
    foreach($liste_rapport as $key => $uneListe){
        array_push($liste_rapport_id ,$uneListe->id);
      }
    if (count($liste_rapport_id) <= 0){
      return response()->json(['error'=> 'Aucun rapport effectué.'],435);
    }
    // Requete qui rapporte l'id de tout les medicaments et leur quantité sans trier les doublons
    $liste_medicament_id = offrir::select('ID_MEDICAMENT','MEDICAMENT_QTE')
    ->whereIn('ID_RAPPORT', $liste_rapport_id)
    ->with(['medicament'=> function($query) { $query->select('id','MED_DEPOTLEGAL','MED_NOMCOMMERCIAL','ID_TYPE_BOITE');}])
    ->get();

   
    //  On appel la fonction TrieArray() pour trier les medicaments
     $liste_medicament_trier = $this->TrieArray($liste_medicament_id); //enleve les doublons & assemble les qte
     $liste_medicament_trier = $this->getNbBoiteParMedicament($liste_medicament_trier);
     
    return $liste_medicament_trier ;
  }
  

  public function TrieArray($liste_medicament){
    $liste_trier = array(); //Liste des medicament trier
    $doublon = array();     //Sauvagarde l'id de tout les Medicaments present dans la liste liste_trier
    foreach($liste_medicament as $key => $uneListe){
     //Si un medicament est déjà dans l'ArrayList on l'isole
      if(in_array($uneListe->medicament->id,$doublon)){
       //On recherche le medicament déjà present dans la liste trier
          for($i=0 ; $i < count($liste_trier);$i++){
              if($uneListe->medicament->id == $liste_trier[$i]['ID_MEDICAMENT'] ){
              //et on ajoute la QTE du doublon à la valeur déjà presente
                $liste_trier[$i]['MEDICAMENT_QTE'] += $uneListe->MEDICAMENT_QTE;
              }
          }    
      }else{
      //On push les nouveaux médicaments dans l'arrayList
      array_push($liste_trier ,$uneListe);
      array_push($doublon , $uneListe->medicament->id);
    }
  }
    return $liste_trier;
  }
  function getNbBoiteParMedicament($liste){
    $finalArray = array();
    foreach($liste as $key => $row){
      $type_boite  = boite_medicament::select('BOITE_QTE')->where('id',$row->medicament->ID_TYPE_BOITE)->first();
      // On remplit le tableau final qui contient les bonnes informations au bon endroit//
       $finalArray[$key]['MED_DEPOTLEGAL'] = $row->medicament->MED_DEPOTLEGAL;
       $finalArray[$key]['MED_NOMCOMMERCIAL'] = $row->medicament->MED_NOMCOMMERCIAL;
       $finalArray[$key]['BOITE_QTE'] = $type_boite['BOITE_QTE'];
       $finalArray[$key]['NB_BOITE_A_COMMANDER'] = $this->CalculBoite($type_boite['BOITE_QTE'],$row->MEDICAMENT_QTE);
       $finalArray[$key]['MEDICAMENT_QTE'] = $row->MEDICAMENT_QTE;
    }
    return $finalArray;
  }
  //Calcul le nombre de boite qu'il faut commander en fonction
  // de la taille de la boite et du nombre de medicaments
  function CalculBoite($nbParBoite,$nbMedoc){
    $compteur = 0;
    for($i = 0 ; $i < $nbMedoc;$i +=$nbParBoite){
      $compteur++;
    }
    return $compteur;
  }
  
  function selectCommande(){
    $data = ['praticiens' => praticien::all(),];
    return view('Api/commandeApi',$data  );
}

function getApiResult(Request $request){
  $nom_praticien = $request->input('CommandeAPI');
  $result  = $this->show($nom_praticien);
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
