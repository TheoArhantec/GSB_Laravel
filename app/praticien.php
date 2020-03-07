<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class praticien extends Model
{
    public $timestamps = false;

    protected $primaryKey = "id";

    public $table ="praticien";

    public $fillable = ['id',
                        'PRA_NOM',
                        'PRA_PRENOM',
                        'PRA_ADRESSE',
                        'PRA_CP',
                        'PRA_VILLE',
                        'PRA_COEFNOTORIETE',
                         'TYP_CODE' ];

    public function rapport_visite()
    {
        return $this->hasMany('PRA_NOM');
    }
    
    public function type_praticien()
    {
        return $this->belongsTo('App\type_praticien','TYP_CODE');
    }
    


}

