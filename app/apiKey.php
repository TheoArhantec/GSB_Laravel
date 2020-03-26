<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class apiKey extends Model
{
    protected $table = 'api_user';
    protected $primaryKey = "id";

    protected $fillable = ['id',
                        'API_KEY',               //Chaine de caractere aléatoire
                        'API_DATE_VALIDATION' ]; // pas obligatoire
}
