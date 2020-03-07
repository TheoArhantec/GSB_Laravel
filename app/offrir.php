<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class offrir extends Model
{
    public $timestamps = false;
    public $table = "offrir";
    protected $primaryKey = "id";

    public $fillable = [
        'id',
        'ID_RAPPORT',
        'ID_MEDICAMENT',
        'MEDICAMENT_QTE',
    ];

/*
    public function rapport_visite(){
        return $this->belongsTo('App\rapport_visite');
    }
*/
    public function medicament(){
        return $this->belongsTo('App\medicament','ID_MEDICAMENT');
    }

}
