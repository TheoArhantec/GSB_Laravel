<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class boite_medicament extends Model
{
    public $timestamps = false;
    public $table = "boite_medicament";
    protected $primaryKey = "id";


    public $fillable = [
        'id',
        'BOITE_NOM',
        'BOITE_QTE',
      
    ];
    public function medicament(){
        return $this->belongsTo('App\medicament','ID_MEDICAMENT');
    }

}
