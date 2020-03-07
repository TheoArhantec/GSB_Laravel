<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLaboTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('labo', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('LAB_CODE');
            $table->string('LAB_NOM');
            $table->string('LAB_CHEF_VENTE');
            $table->timestamps();
        });


        DB::table('labo')->insert([
        /*1*/     ['LAB_CODE' => 'BC', 'LAB_NOM' => 'Bichat' , 'LAB_CHEF_VENTE' => 'Suzanne Terminus'],
        /*2*/     ['LAB_CODE' => 'GY', 'LAB_NOM' => 'Gyverny' , 'LAB_CHEF_VENTE' => 'Marcel MacDouglas'],
        /*3*/     ['LAB_CODE' => 'SW', 'LAB_NOM' => 'Swiss Kane' , 'LAB_CHEF_VENTE' => 'Alain Poutre'],
        ]);

      

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('labo');
    }
}
