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
        Schema::create('avaliacoes', function(Blueprint $table){
            $table->increments('id');
            $table->timestamp('data_criacao');
            $table->integer('questionario_id')->unsigned();
            $table->integer('convidado_id')->unsigned();

            $table->foreign('questionario_id')->references('id')->on('questionarios');
            $table->foreign('convidado_id')->references('id')->on('convidados');
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
        Schema::drop('avaliacoes');
    }
}
