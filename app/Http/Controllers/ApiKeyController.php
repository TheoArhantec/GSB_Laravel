<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\apiKey;
use App\apiAccount;
use Illuminate\Support\Collection;
class ApiKeyController extends Controller
{
    //Retourne la vue pour se connecter ou créer un espace API
    function getProfilAPI(){
        return view("API/ProfilApi");
        }

    //Permet de créer une clé quand la personne est connecté sur son espace API
    function CreateKeyWithAccount(Request $request){
        $idAccount = $request->input('idAccount');
        $pass = $request->input('pass');
        $count = apiKey::where('ID_ACCOUNT','=',$idAccount)->count();
        
        //On test si le compte possède déjà 3 clé ou non
        //si son nombre de clé est supérieur à trois on retourne un message d'erreur
        if($count == 3 ){
           // $stringError = "Vous avez déjà atteint le nombre maximale de clés";
            $data = ApiKeyController::getData($pass);
            return view("API/ProfilApi",$data);
        }

        $returnKey = "";                //futur clé API
        $currentDate = date('Y-m-d');   //date_actuelle
        //Toute les clés font 10 de longueur
        //On verifie que la clé générée n'existe pas dans la BDD 
        $checkKey = false;
        while ($checkKey == false) {
            $returnKey = $this->generateRandomString(10);
            $checkKey = $this->checkPassKey($pass);
        }



        /**Creation de la clé */
        $key = new apiKey();
        $key->API_KEY = $returnKey;
        $key->ID_ACCOUNT = $idAccount;
        $key->API_NB_UTILISATION = 0;
        $key->API_DATE_CREATION = $currentDate;
        $key->save();
        /**Fin Creation Clé */
        

        $data = ApiKeyController::getData($pass);

        if ($data == null){
            return back()->withInput();
        } 
        
        return view("API/ProfilApi",$data);
       
        }


    //Permet de créer un nouveau compte pour utiliser l'API//
    function CreateNewAccount(Request $request){
        $mail = $request->input('mailAPI');

    
        $checkPass = false;
        //Permet de generer un mot de passe et teste si le mot de passe est déjà rentrer dans la BDD
        while ($checkPass == false) {
            $pass = $this->generateRandomString(20);
            $checkPass = $this->checkPassAccount($pass);
        }

       //Creation du nouveau CompteApi
        $AccountData = new apiAccount();
        $AccountData->PASS = $pass;
        $AccountData->API_MAIl = $mail;
        $AccountData->API_NB_UTILISATION  = 0;
        $AccountData->save();

        $data = ApiKeyController::getData($pass);
        if ($data == null){
            return back()->withInput();
        } 
        return view("API/ProfilApi",$data);
        }

    //Permet à l'user de se connecter sur son espace API personnel
    function getAccount(Request $request){
        $mail = $request->input('mail');
        $pass = $request->input('pass');

       
        $data = ApiKeyController::getData($pass);
        if ($data == null){
            return back()->withInput();
        } 
        return view("API/ProfilApi",$data);
      

        }


    //Fonction qui permet l'utilisation des API dans la documentation
    //Cette clé est generer lors de l'initialisation de la base données
    //cette clé est relié à aucun compte
    static public function getAdminKey(){
            $key = apiKey::find(1);
            return $key->API_KEY;
        }


    //Verifie si le mot de passe est déjà existant dans la base de données
    //retourne Faux si le mot de passe est déjà presente dans la BDD
    //retourne Vrai si le mot de passe est unique
    public function checkPassAccount($pass){
            $allPass = apiAccount::all();
            foreach($allPass as $onePass){
                if($pass == $onePass->PASS){
                    return false;
                }
            }
            return true;
        }

    //Genere une chaine de caracte de façon aléatoire  
    public function generateRandomString($length) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
        }
    //retourne l'id d'un Compte
    //garder l'id permet de laisser l'esapce API actif
    function getId($data){
        foreach ($data as $d){
            return $d->id;
        }

        }

    //Recupere les données à return sur chaque Vue
    function getData($pass){
        $dataUser = apiAccount::with('apiKey')->where('PASS','=',$pass)->get();
        $idAccount = ApiKeyController::getId($dataUser);
        $dataKey = apiKey::where('ID_ACCOUNT','=',$idAccount)->get();

        //si les informations du l'user est null
        //on passe data en null pour que la fonction
        //redirige ensuite vers l'accueil de l'espace API
        if($dataUser == "[]"){
            return null;
        }

        $data = [
            'dataUser' => $dataUser,
            'pass' => true,
            'idAccount' =>$idAccount,
            'dataKey' =>$dataKey,
            'MotDePasse'=>$pass,
        ];

        return $data;
        }

    //Verifie que la clé n'a jamais été attribué
    //retourne Faux si la clé est déjà presente dans la BDD
    //retourne Vrai si la clé est unique
    public function checkPassKey($pass){
        $allKey = apiKey::all();
        foreach($allKey as $key){
            if($key->API_KEY == $pass){
                return  false;
            }
        }
        return true;
        }

}
