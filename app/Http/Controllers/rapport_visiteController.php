<?php

namespace App\Http\Controllers;
use App\Http\Controller\HomeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PDF;
use App\medicament;
use App\praticien;
use App\rapport_visite;
use App\offrir;
class rapport_visiteController extends Controller
{
 
    public function PDF(Request $request){
        $numeroRapport = $request->input('nb');
        $data = ['rapports' => rapport_visite::with('praticien')->where('id',$numeroRapport)->get(),
                'prescription' => offrir::with('medicament')->where('ID_RAPPORT',$numeroRapport)->get(),];
        $pdf = PDF::loadView('myPDF',$data);
        return $pdf->download('Compte-Rendus.pdf');
    }


    public function listeCompteRendus(){
        return view('pages/compte_rendus')->with('rapports',$rapports = $this->getRapport_Visite());
}

/**
 * Affiche tout les contreRendus de la personne connecté
 * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
 */
    public function newCompteRendus(){
    $data =  [
        'medics' => medicament::with('famille')->get(),
        'praticiens' => praticien::all(),];

    return view("pages/nouveauCompte_rendus" ,$data);
}
    /**
     * 
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function createNewCompteRendus(Request $request){
       //Initialisation des variables 
        $Pra_Num = $request->input('numPra');
        $Rap_Date = $request->input('date');
        $Rap_Bilan = $request->input('bilan');
        $Rap_Motif = $request->input('motifvisite');
        $chaineMedoc =  $request -> input('listemed');
        //Initialisation des composants utiles pour le trie des medicaments 
        $nomMedic  = array();
        $nombreMedic =  array();
        $trie = array();
        $trie = explode(" ",$chaineMedoc);
        $compteur = 0;
        $compteur2 = 0;
    
        //Boucle qui remplit l'arrayList des nom des Medicaments
        for($i = 0; $i < count($trie);$i++) {
            if ($i % 2 == 0){ //
               
                $nomMedic[$compteur] = $trie[$i];
              
                $compteur++;
                //
            }
        }
        
        //boucle qui remplit l'Arraylist du nombre des medicaments à prescrire
            for($i = 0; $i < count($trie);$i++) {
            if ($i % 2 == 1){
               
                $nombreMedic[$compteur2] = $trie[$i];
              
                $compteur2++ ;
            }  
        }

        //Insert le rapport de visite
        $rapport_visite = new rapport_visite;
        $rapport_visite->ID_USER = Auth::user()->id;
        $rapport_visite->ID_PRATICIEN = $Pra_Num;
        $rapport_visite->RAP_DATE = $Rap_Date;
        $rapport_visite->RAP_BILAN = $Rap_Bilan;
        $rapport_visite->RAP_MOTIF = $Rap_Motif;
        $rapport_visite->save();
        
        //recupere le nombre de Rapport de visite
        $max = 0;
        $max = DB::table('rapport_visite')->max('id');
     
        
        
        
        //Insert la prescription des medicaments
      
        for($i = 0; $i < count($nombreMedic);$i++) {
            $vairable1 = $nomMedic[$i];
           
            $vairable2 = $nombreMedic[$i];

            //On recupere l'id du medicamants
            $medicament = medicament::where('MED_NOMCOMMERCIAL', $vairable1)->select('id')->first();
            //    return rapport_visite::with('praticien')->where('ID_USER',Auth::user()->id)->get();
                    
            //Requete pour ajouter la prescription de medicament
            DB::table('offrir')->insert(
                [   'ID_RAPPORT' => $max,
                    'ID_MEDICAMENT' => $medicament->id,
                    'MEDICAMENT_QTE' => $vairable2
                ]);
            
        }
        

        
        
        return redirect()->route('gsb.home');
        
    }
    
    
    
    
}



