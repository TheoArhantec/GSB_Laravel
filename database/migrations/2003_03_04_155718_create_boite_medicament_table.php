<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBoiteMedicamentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('boite_medicament', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('BOITE_NOM');
            $table->integer('BOITE_QTE');
        });

        DB::table('boite_medicament')->insert([
            ['BOITE_NOM' => 'Petite_Boite', 'BOITE_QTE' => 5],
            ['BOITE_NOM' => 'Moyenne_Boite', 'BOITE_QTE' => 10],
            ['BOITE_NOM' => 'Grande_Boite', 'BOITE_QTE' => 20],
            ]);
    }

  

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('boite_medicament');
    }
}
