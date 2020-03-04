<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class praticienController extends Controller
{
    public function listePraticien(){
        return view("pages/praticien", ["praticiens" => DB::table('praticien')
            ->join('type_praticien', 'praticien.typ_code', '=', 'type_praticien.typ_code')
            ->select('praticien.*', 'type_praticien.*')
            ->get()]);
    }
    
    public function praticienParType(Request $request){
        $texte = $request->input('select');
        if ($texte == null){
            $texte = $request ->input('input');
        }
        
        return view("pages/praticien", ["praticiens" => DB::table('praticien')
            ->join('type_praticien', 'praticien.typ_code', '=', 'type_praticien.typ_code')
            ->select('praticien.*', 'type_praticien.*')
            ->where('type_praticien.typ_code','=', $texte)
            ->orWhere('praticien.pra_nom','=', $texte)
            ->orWhere('praticien.pra_ville','=', $texte)
            ->get()]);
    }
    
}