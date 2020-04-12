<?php


namespace App\Http\Controllers;
use App\praticien;
use App\rapport_visite;
use App\User;   
use Illuminate\Http\Request;
use Facade\FlareClient\View;
use Illuminate\Database\Eloquent\Model;
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
    public function index(){
      
     }
    //Redirige vers la page d'acceuil
    public function homeView(){
        return view('pages/home')->with('rapports',$rapports = $this->getRapport_Visite());
    }
    //Recupere les rapport de visite du visiteur connecté
    public function getRapport_Visite(){
        return rapport_visite::with('praticien')->where('ID_USER',Auth::user()->id)->get();
    }
}

