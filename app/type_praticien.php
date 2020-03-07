<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class type_praticien extends Model
{
    public $timestamps = false;
    public $table = "type_praticien";
    protected $primaryKey = "id";

    public $fillable = ['id','TYP_CODE','TYP_LIBELLE','TYP_LIEU'];


    public function praticien(){
        return $this->belongsTo('App\praticien','id');
    }
}
