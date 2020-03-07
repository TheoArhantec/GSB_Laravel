<?php
namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class VisiteurAPIController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return User::all();
    }

    /**
     * Request with a visiteur name 
     */
    public function show(String  $nom)
    {
        foreach(User::all() as $unUser) {
            if ($unUser->name == $nom) {
                $user = $unUser;
            }
        }
        return $user;
    }
   
}