<?php

namespace App\Http\Controllers;
use App\praticien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\type_praticien;

class praticienController extends Controller
{
    public function listePraticien(){  
        $data = [
            'praticiens' => praticien::with('type_praticien')->get(),
            'type_praticien' => type_praticien::all(),
        ];
        return view("pages/praticien",$data);
    }
    
    public function praticienParType(Request $request){
        $texte = $request->input('select'); //type praticien
        if ($texte == null){
            $texte = $request->input('input'); //nom ou ville du praticien
            $praticiens = praticien::with(['type_praticien'])->where('praticien.PRA_NOM', '=' , $texte)->orWhere('praticien.PRA_VILLE', '=' , $texte)->get()->toArray();
        }else{
           $praticiens = praticien::with(['type_praticien'])->where('praticien.TYP_CODE', '=' , $texte)->get()->toArray();
        }
        $data = [
        'praticiens' => $praticiens,
        'type_praticien' => type_praticien::all(),
        ];
        return view("pages/praticien", $data);
    }    
}
