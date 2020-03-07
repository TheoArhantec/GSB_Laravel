<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class labo extends Model
{
    public $timestamps = false;

    public $table = "labo";
    protected $primaryKey = "id";


    public $fillable = [
        'id',
        'LAB_CODE',
        'LAB_NOM',
        'LAB_CHEF_VENTE',
    ];

    public function users(){
        return $this->hasOne('App\User');
    }



}
