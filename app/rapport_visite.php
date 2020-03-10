<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class rapport_visite extends Model
{
    public $table ="rapport_visite";
    protected $primaryKey = 'id';
   
    public $timestamps = false;
    
    public $fillable = ['ID_USER', 'ID_PRATICIEN' , 'RAP_DATE' , 'RAP_BILAN', 'RAP_MOTIF'];

    public function praticien()
    {
       // return $this->belongsToMany(praticien::class);
       return $this->belongsTo('App\praticien','ID_PRATICIEN');
    }

    public function user()
    {
       // return $this->belongsToMany(praticien::class);
       return $this->belongsTo('App\User','ID_USER');
    }
}
