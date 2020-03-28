<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAPIUSERTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('api_user', function (Blueprint $table) { //Chaque personne à le droit a generer 3 clé API
            $table->bigIncrements('id');
            $table->string('API_KEY')->unique();
            $table->unsignedBigInteger('ID_ACCOUNT')->nullable();
            $table->integer('API_NB_UTILISATION');
            $table->Date('API_DATE_CREATION');
           // $table->date('API_DATE_VALIDATION')->nullable();
            $table->timestamps();
        });
        $currentDateTime = date('Y-m-d');
        DB::table('api_user')->insert([
            ['API_KEY' => 'fze564f65e', 'ID_ACCOUNT' => null , 'API_NB_UTILISATION' => 0 ,'API_DATE_CREATION' => $currentDateTime],
        ]);                 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::enableForeignKeyConstraints();
        Schema::dropIfExists('api_user');
    }
}