<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Avaliacao extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('avaliacao', function(Blueprint $table){
            $table->increments('id');
            $table->integer('questionario_id')->unsigned();
            $table->integer('convidado_id')->unsigned();

            $table->foreign('questionario_id')->references('id')->on('questionario');
            $table->foreign('convidado_id')->references('id')->on('convidado');
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
        Schema::drop('avaliacao');
    }
}
