<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class medicamentController extends Controller
{
    public function listeMedicaments(){
        return view("pages/medicament", ["medics" => DB::table('medicament')
            ->join('famille', 'medicament.fam_code', '=', 'famille.fam_code')
            ->select('medicament.*', 'famille.FAM_LIBELLE')
            ->get()]);
    }
}
