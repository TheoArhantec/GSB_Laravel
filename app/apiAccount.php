<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class apiAccount extends Model
{
    protected $table = 'api_account';
    protected $primaryKey = "id";

    protected $fillable = ['id',
                        'PASS',
                        'API_MAIL',              
                        'API_NB_UTILISATION' ]; 


  public function apiKey()
    {
        return $this->belongsTo('App\apiKey' ,'ID_ACCOUNT');
    }
}
