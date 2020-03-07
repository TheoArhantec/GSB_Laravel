<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTypePraticienTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('type_praticien', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('TYP_CODE',5);
            $table->string('TYP_LIBELLE',50);
            $table->string('TYP_LIEU',50);
        });

        DB::table('type_praticien')->insert([
        /*1*/    ['TYP_CODE' => 'MH', 'TYP_LIBELLE' => 'Médecin Hospitalier' , 'TYP_LIEU' => 'Hopital ou clinique'],
        /*2*/    ['TYP_CODE' => 'MV', 'TYP_LIBELLE' => 'Médecine de Ville' , 'TYP_LIEU' => 'Cabinet'],
        /*3*/    ['TYP_CODE' => 'PH', 'TYP_LIBELLE' => 'Pharmacien Hospitalier' , 'TYP_LIEU' => 'Hopital ou clinique'],
        /*4*/    ['TYP_CODE' => 'PO', 'TYP_LIBELLE' => 'Pharmacien Officine' , 'TYP_LIEU' => 'Pharmacie'],
        /*5*/    ['TYP_CODE' => 'PS', 'TYP_LIBELLE' => 'Personnel de santé ' , 'TYP_LIEU' => 'Centre paramédical'],
           
           
        ]);
    }
  
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('type_praticien');
    }
}
