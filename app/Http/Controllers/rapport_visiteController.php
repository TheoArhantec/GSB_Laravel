<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PDF;


class rapport_visiteController extends Controller
{
 

    public function PDF(Request $request){
        $num = $request->input('nb');
      
        
        $data = ['title' => 'Welcome to ItSolutionStuff.com'];
        $pdf = PDF::loadView('myPDF', ["rapports" => DB::table('rapport_visite')
            ->join('praticien', 'praticien.PRA_NUM', '=', 'rapport_visite.PRA_NUM')
            ->select('rapport_visite.*','praticien.*')
            ->where('RAP_NUM', '=' , $num )
            ->get()]);
        
        
        return $pdf->download('Compte-Rendus.pdf');
        
    }
    
    
    
    
    
    
    
    
    
    
    
    public function listeCompteRendus(){
        return view("pages/compte_rendus", ["rapports" => DB::table('rapport_visite')
            ->join('praticien', 'praticien.PRA_NUM', '=', 'rapport_visite.PRA_NUM')
            ->select('rapport_visite.*','praticien.*')
            ->where('Vis_matricule', '=' ,Auth::user()->matricule )
            ->get()]);
}

/**
 * Affiche tout les contreRendus de la personne connecté
 * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
 */
public function newCompteRendus(){
    return view("pages/nouveauCompte_rendus" ,
        
        ["praticiens" => DB::table('praticien')
        ->select('praticien.*')
        ->get()] ,
        
        ["medics" => DB::table('medicament')
            ->join('famille', 'medicament.fam_code', '=', 'famille.fam_code')
            ->select('medicament.*', 'famille.FAM_LIBELLE')
            ->get()]
        );
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
        
        
        //Initialisation des composants utiles
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
        
 
        
        
        //Insert le compte-rendus
        DB::table('rapport_visite')->insertGetId(
            ['VIS_MATRICULE' => Auth::user()->matricule ,'PRA_NUM' => $Pra_Num ,
                'RAP_DATE' => $Rap_Date,'RAP_BILAN' => $Rap_Bilan ,'RAP_MOTIF' => $Rap_Motif
            ]
            );
        
        
        
        //recupere le nombre de Rapport de visite
        $max = 0;
        $max = DB::table('rapport_visite')->max('RAP_NUM');
       
        
        
        
        //Insert la prescription des medicaments
        echo count($nombreMedic);
        for($i = 0; $i < count($nombreMedic);$i++) {
            $vairable1 = $nomMedic[$i];
            $vairable2 = $nombreMedic[$i];
            
            
            DB::table('offrir')->insertGetId(
                ['VIS_MATRICULE' => Auth::user()->matricule ,'RAP_NUM' => $max,
                    'MED_DEPOTLEGAL' => $vairable1,
                    'OFF_QTE' => $vairable2
                ]
                );
            
        }
        
        
        
        
        return redirect()->route('gsb.home');
        
    }
    
    
    
    
}



