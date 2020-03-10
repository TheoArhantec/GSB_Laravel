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

class commandeController extends Controller
{
  function index(){


    return $nom;
  }

/**
 * Retoune les medicament à commander par praticien
 */
  function show (String $nom){
    //  Requete qui permet de l'id du praticien a partir de son nom
    $id_Praticien = praticien::where('PRA_NOM', $nom)->first(); 


    //  Requete pour obtenir la liste des rapports oû le praticien est présent
    $liste_rapport = rapport_visite::select('id')->where('ID_PRATICIEN', '=',$id_Praticien->id)->get();


    //  Boucle Rapide qui recupere l'id de chaque rapport
    $liste_rapport_id = array();
    foreach($liste_rapport as $key => $uneListe){
        array_push($liste_rapport_id ,$uneListe->id);
    }


    // Requete qui rapporte l'id de tout les medicaments et leur quantité sans trier les doublons
    $liste_medicament_id = offrir::select('ID_MEDICAMENT','MEDICAMENT_QTE')
    ->whereIn('ID_RAPPORT', $liste_rapport_id)
    ->with(['medicament'=> function($query) { $query->select('id','MED_DEPOTLEGAL','MED_NOMCOMMERCIAL');}])
    ->get();


    //On appel la fonction TrieArray() pour trier les medicaments
     $liste_medicament_trier = $this->TrieArray($liste_medicament_id); 
     $liste_medicament_trier = $this->getNbBoiteParMedoc($liste_medicament_trier);
     
    return $liste_medicament_trier ;
  }
  

  public function TrieArray($liste_medicament){
    
    $liste_trier = array(); //Liste des medicament trier
    $doublon = array();     //Sauvagarde l'id de tout les Medicaments present dans la liste liste_trier

    foreach($liste_medicament as $key => $uneListe){
     //Si un medicament est déjà dans l'ArrayList on l'isole
      if(in_array($uneListe->medicament->id,$doublon)){
        $search_key = $uneListe->medicament->id;
       //On recherche le medicament déjà present dans la liste trier
          for($i=0 ; $i < count($liste_trier);$i++){
              if($search_key == $liste_trier[$i]['ID_MEDICAMENT'] ){
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


  function getNbBoiteParMedoc($liste){
    // TODO : Implementer le systeme de boite //
    
    return $liste;
  }

  

  
}
