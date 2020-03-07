<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    
   
     public $table = "users";
      protected $primaryKey = "id";

      public $fillable = [
        'id',
        'name',
        'email',
        'PRENOM',
        'ADRESSE',
        'CODE_POSTAL',
        'VILLE',
        'DATE_EMBAUCHE',
        'LAB_CODE'
    ];
  
     
  
      public function labo()
      {
          return $this->belongsTo('App\labo','LAB_CODE');
      }


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    
    
    
    
}
