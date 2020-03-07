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
            $table->timestamps();
        });
    }

    // TODO ADD INSERT DATA HERE

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
