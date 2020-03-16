<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRapportVisiteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rapport_visite', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('ID_USER');
            $table->unsignedBigInteger('ID_PRATICIEN');
            $table->date('RAP_DATE');
            $table->text('RAP_BILAN');
            $table->text('RAP_MOTIF');
            $table->timestamps();
        });

        Schema::table('rapport_visite', function (Blueprint $table) {
            $table->foreign('ID_USER')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('ID_PRATICIEN')->references('id')->on('praticien')->onDelete('cascade')->onUpdate('cascade');

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
        Schema::dropIfExists('rapport_visite');
    }
}
