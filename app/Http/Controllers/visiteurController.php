<?php

namespace App\Http\Controllers;
use App\praticien;
use App\User;
use App\visiteur;
//use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class visiteurController extends Controller{
    
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
  

}


