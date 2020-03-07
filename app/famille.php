<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class famille extends Model
{
    public $timestamps = false;
    public $table ="famille";
    protected $primaryKey = "id";
    public $fillable = [
        'id',
        'FAM_CODE',
        'FAM_LIBELLE'
    ];

    public function medicament()
    {
        return $this->belongsTo('App\medicament','FAM_CODE');
    }

}
