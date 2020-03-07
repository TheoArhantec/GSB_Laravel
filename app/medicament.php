<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class medicament extends Model
{

    public $table ="medicament";
    protected $primaryKey = "id";
    public $timestamps = false;
    public $fillable = [
        'id',
        'MED_DEPOTLEGAL',
        'MED_NOMCOMMERCIAL',
        'ID_FAM_CODE',
        'MED_COMPOSITION',
        'MED_EFFETS' ,
        'MED_CONTREINDIC' ,
        'MED_PRIXECHANTILLON',
    ];

    public function famille()
    {
        return $this->belongsTo('App\famille' ,'ID_FAM_CODE');
    }

    public function offrir(){
        return $this->hasMany('MED_NOMCOMMERCIAL');

    }


}
