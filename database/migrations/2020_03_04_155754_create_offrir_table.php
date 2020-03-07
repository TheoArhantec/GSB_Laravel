<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOffrirTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offrir', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('ID_RAPPORT')->nullable();
            $table->unsignedBigInteger('ID_MEDICAMENT')->nullable();
            $table->Integer('MEDICAMENT_QTE');
            $table->timestamps();
        });

        Schema::table('offrir', function (Blueprint $table) {
            $table->foreign('ID_RAPPORT')->references('id')->on('rapport_visite')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('ID_MEDICAMENT')->references('id')->on('medicament')->onDelete('cascade')->onUpdate('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::enableForeignKeyConstraints();
        Schema::dropIfExists('offrir');
    }
}
