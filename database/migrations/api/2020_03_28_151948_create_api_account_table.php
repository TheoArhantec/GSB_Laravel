<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApiAccountTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('api_account', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('PASS')->unique();    //A la création du compte une chaine de caratere aléatoire va etre generer pour permettre la connection a son espace API
            $table->string('API_MAIL')->unique();   //l'adresse Mail est une possibilié pour se connecter a son espace API
            $table->integer('API_NB_UTILISATION');  //A chaque fois qu'une clé API est utilisé ce compteur s'incrémente
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('api_account');
    }
}
