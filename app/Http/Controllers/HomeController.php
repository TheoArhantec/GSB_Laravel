<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Facade\FlareClient\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use PDF;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $data = [

            'rapports' => DB::table('rapport_visite')
            ->join('praticien', 'praticien.PRA_NUM', '=', 'rapport_visite.PRA_NUM')
            ->select('rapport_visite.*','praticien.*')
            ->where('Vis_matricule', '=' ,Auth::user()->matricule )
            ->get(),

        ];

        return view('pages/home' , $data);
    }
    
    
    
    public function homeView(){
        $data = [
        'rapports' => DB::table('rapport_visite')
        ->join('praticien', 'praticien.PRA_NUM', '=', 'rapport_visite.PRA_NUM')
        ->select('rapport_visite.*','praticien.*')
        ->where('Vis_matricule', '=' ,Auth::user()->matricule )
        ->get(),

        ];

        return view('pages/home', $data);
    }
}
