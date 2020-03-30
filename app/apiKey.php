<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class apiKey extends Model
{
    protected $table = 'api_user';
    protected $primaryKey = "id";

    protected $fillable = ['id',
                        'API_KEY',  
                        'ID_ACCOUNT',
                        'API_NB_UTILISATION',
                        'API_DATE_CREATION' ]; 



    public function apiAccount()
    {
        return $this->belongsTo('App\apiAccount' ,'ID_ACCOUNT');
    }
}
