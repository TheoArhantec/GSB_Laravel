<?php

namespace App\Http\Controllers;
use App\medicament;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class medicamentController extends Controller
{
    //Retourne tout les medicaments présent de la base de données
    public function listeMedicaments(){
        return view("pages/medicament")->with('medics', medicament::with('famille')->get());
    }
}


