<?php

namespace App\Http\Controllers;
use App\praticien;
use App\User;
use App\visiteur;
use App\rapport_visite;
//use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class visiteurController extends Controller{



    public function __construct()
    {
        $this->middleware('auth');
    
       
    }
    
    public function getProfil(){
        return view("pages/profil")->with(compact('UnUsers',$UnUsers =  User::where('id', Auth::user()->id)->get())); 
    }
    
    /**
     * Permet de mettre à jour les informations personnelles de la personne connectée
     * hormis sa date d'embauche et son matricule
     * @param Request $request
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */
    public function updateProfil(Request $request){
        
        //On recupere les données du formulaire//
        $newNom = $request->input('newNom');
        $newPrenom = $request->input('newPrenom');
        $NewCP = $request->input('newCp');
        $NewVille = $request->input('NewVille');
        $NewAdresse = $request->input('adresse');
        $NewMdp = $request->input("password");

        //On récupere l'id de l'user //
        $user = User::find(Auth::user()->id);

        //Mise à jour de son profil//
        if($NewCP){
        $user->CODE_POSTAL = $NewCP;
        }
        if($NewAdresse){ 
        $user->ADRESSE = $NewAdresse;
        }
        if($NewVille){
        $user->VILLE = $NewVille;
        }
        if($newPrenom){
        $user->PRENOM = $newPrenom;
        }
        if($newNom){
        $user->name = $newNom;
        }
        if($NewMdp){
        $user->password = Hash::make($NewMdp);
        }
        $user->save();
        
       //Si le mot de passe est modifié on deconnecte l'user 
       if ($NewMdp){
        Auth::logout();
       }
        return redirect() -> route('login');
    }

public function listeVisiteurAvecLabo(){
    return view("pages/visiteur")->with(compact('visiteurs',$visiteurs = User::with('labo')->get()));
}


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
        //  Requete qui permet de recuperer les informations sur chaque praticien 
        $data = rapport_visite::with(['praticien','user'])->where('ID_USER',$id_Visiteur->id)->get(); 
        //  Boucle qui permet les données de chaque praticiens concernant me visiteur
        foreach($data as $key => $object){
            $tableau[$key]['Nom_Praticien'] =  $object->praticien->PRA_NOM;
            $tableau[$key]['Prenom_Praticien'] =  $object->praticien->PRA_PRENOM;
            $tableau[$key]['Nom_visiteur'] =  $object->User->name;
            $tableau[$key]['Prenom_visiteur'] = $object->User->PRENOM;
        }
        //  On retourne le Tableau une fois la boucle terminée
        return $tableau;
    
    }
}


