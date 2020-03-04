<?php

namespace App\Http\Controllers;

use App\visiteur;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use function foo\func;

class visiteurController extends Controller
{
    public function listeVisiteur(){
    
    $users = DB::table('visiteur')->get();
    
 
    //return $users;
    }
    
    public function getLogged(){
      /*  $lesRapports  = rapport_visite::where('VIS_MATRICULE', $nomUser )->get(); */
        
        return view("pages/profil", ["UnUsers" => DB::table('visiteur')
            ->select('visiteur.*')
            ->where('visiteur.vis_matricule','=', Auth::user()->matricule )
            ->get()]); 
    }
    
    
    /**
     * Permet de mettre à jour les informations personnelles de la personne connectée
     * hormis sa date d'embauche et son matricule
     * @param Request $request
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */
    public function updateProfil(Request $request){
        
        $newNom = $request->input('newNom');
        $newPrenom = $request->input('newPrenom');
        $NewCP = $request->input('newCp');
        $NewVille = $request->input('NewVille');
        $NewAdresse = $request->input('adresse');
        $NewMdp = $request->input("password");

        /**Pour la table User */
        $user = User::find(Auth::user()->id);

        $user->name = $newNom;
        $user->password = Hash::make($NewMdp);
        $user->save();
        
        /**Pour la table visiteur */
        DB::table('visiteur')
        ->where('visiteur.vis_matricule','=', Auth::user()->matricule)
        ->update(['VIS_NOM' => $newNom , 'VIS_PRENOM' => $newPrenom,'VIS_CP' => $NewCP, 'VIS_VILLE' => $NewVille, 'VIS_ADRESSE' => $NewAdresse]);
    

     
        Auth::logout();
        return redirect() -> route('login');
      
    }
    
    
       
    
    
public function connexion() {
    return view("pages/connexion", ["lesUsers" => DB::table('visiteur')
        ->select('visiteur.*')
         ->get()]); 
    }

public function listeVisiteurAvecLabo(){
    return view("pages/visiteur", ["visiteurs" => DB::table('visiteur')
        ->join('labo', 'visiteur.Lab_code', '=', 'labo.lab_code')
        ->select('visiteur.*', 'labo.*')
        ->get()]); 
    }
    
    
    public function profil(){
        return view("pages/profil");
    }
    
    /**
     * permet d'ajouter les visiteur dans la table Users pour gerer les connections
     */
    public function test() {
        $lesUsers = DB::table('visiteur') -> get();
        
        $userTable = DB::table('users') -> get();
        
        foreach ($lesUsers as $unUser) {
            echo  $unUser->VIS_NOM." ";
            echo  $unUser->VIS_MATRICULE." ";
            echo $unUser->VIS_DATEEMBAUCHE."<br>";
            
            $matricule = $unUser->VIS_MATRICULE;
            $name =  $unUser->VIS_NOM;
            $password = $unUser->VIS_DATEEMBAUCHE;
            
            DB::table('users')->insert([
                ['matricule'=>$matricule,'name' => $name, 'email' => null, 'password' => Hash::make($password)]
            ]);
            
        }
        
    }
    
    
    
    
    
    
}
