<?php
namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\User;

class VisiteurAPIController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        dd(auth::user());
        return User::where('id',Auth::user()->id);
       // return User::all();
    }

    /**
     * Request with a visiteur name 
     */
    public function show(String  $nom)
    {
        $user = [];

        foreach(User::all() as $unUser) {
            if ($unUser->name == $nom) {
                array_push($user,$unUser);
            }
        }
        return $user;
    }
   
}