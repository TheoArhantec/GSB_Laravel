<?php

namespace App\Http\Controllers;
use App\medicament;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class medicamentController extends Controller
{
    public function listeMedicaments(){
        return view("pages/medicament")->with('medics', medicament::with('famille')->get());
    }
}


