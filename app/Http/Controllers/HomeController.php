<?php


namespace App\Http\Controllers;
use App\praticien;
use App\rapport_visite;
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
       return $this->homeView();
    }
    
    public function homeView(){
        return view('pages/home')->with('rapports',$rapports = $this->getRapport_Visite());
    }

    public function getRapport_Visite(){
        return rapport_visite::with('praticien')->where('ID_USER',Auth::user()->id)->get();
    }
}

    




/*

$var = rapport_visite::with('praticien')->where('ID_USER',Auth::user()->id)->get();

Dans un fichier Blade

@foreach ($var as $autreChose)
    //Apres la première fleche tu rajotue le nom de la table praticien pour 
    //préciser que les données viennent de là
    $autreChose->praticien->champDansLaTableP¨raticien



@endforeach

*/