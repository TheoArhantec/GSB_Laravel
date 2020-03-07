<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFamilleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('famille', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('FAM_CODE');
            $table->string('FAM_LIBELLE');
            $table->timestamps();
        });

        DB::table('famille')->insert([
        /*1*/    ['FAM_CODE' => 'AA', 'FAM_LIBELLE' => 'Antalgiques en association'],
        /*2*/    ['FAM_CODE' => 'AAA', 'FAM_LIBELLE' => 'Antalgiques antipyrétiques en association'],
        /*3*/    ['FAM_CODE' => 'AAC', 'FAM_LIBELLE' => 'Antidépresseur d\'action centrale'],
        /*4*/    ['FAM_CODE' => 'AAH', 'FAM_LIBELLE' => 'Antivertigineux antihistaminique H1'],
        /*5*/    ['FAM_CODE' => 'ABA', 'FAM_LIBELLE' => 'Antibiotique antituberculeux'],
        /*6*/    ['FAM_CODE' => 'ABC', 'FAM_LIBELLE' => 'Antibiotique antiacnéique local'],
        /*7*/    ['FAM_CODE' => 'ABP', 'FAM_LIBELLE' => 'Antibiotique de la famille des béta-lactamines (pénicilline A)'],
        /*8*/    ['FAM_CODE' => 'AFC', 'FAM_LIBELLE' => 'Antibiotique de la famille des cyclines'],
        /*9*/    ['FAM_CODE' => 'AFM', 'FAM_LIBELLE' => 'Antibiotique de la famille des macrolides'],
        /*10*/    ['FAM_CODE' => 'AH', 'FAM_LIBELLE' =>  'Antihistaminique H1 local'],
        /*11*/    ['FAM_CODE' => 'AIM', 'FAM_LIBELLE' => 'Antidépresseur imipraminique (tricyclique)'],
        /*12*/    ['FAM_CODE' => 'AIN', 'FAM_LIBELLE' => 'Antidépresseur inhibiteur sélectif de la recapture de la sérotonine'],
        /*13*/    ['FAM_CODE' => 'ALO', 'FAM_LIBELLE' => 'Antibiotique local (ORL)'],
        /*14*/    ['FAM_CODE' => 'ANS', 'FAM_LIBELLE' => 'Antidépresseur IMAO non sélectif'],
        /*15*/    ['FAM_CODE' => 'AO', 'FAM_LIBELLE' =>  'Antibiotique ophtalmique'],
        /*16*/    ['FAM_CODE' => 'AP', 'FAM_LIBELLE' => 'Antipsychotique normothymique'],
        /*17*/    ['FAM_CODE' => 'AUM', 'FAM_LIBELLE' => 'Antibiotique urinaire minute'],  
        /*18*/    ['FAM_CODE' => 'CRT', 'FAM_LIBELLE' => 'Corticoïde, antibiotique et antifongique à  usage local'],  
        /*19*/    ['FAM_CODE' => 'HYP', 'FAM_LIBELLE' => 'Hypnotique antihistaminique'],  
        /*20*/    ['FAM_CODE' => 'PSA', 'FAM_LIBELLE' => 'Psychostimulant, antiasthénique'],  
        ]);

    }

         


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('famille');
    }
}
