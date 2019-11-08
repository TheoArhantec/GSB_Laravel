<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class visiteurController extends Controller
{
    public function listeVisiteur(){
    
    $users = DB::table('visiteur')->get();
    
    foreach ($users as $user)
    {
        var_dump($user->VIS_NOM);
        var_dump($user->VIS_DATEEMBAUCHE);
        
    }
    //return $users;
    }
}
