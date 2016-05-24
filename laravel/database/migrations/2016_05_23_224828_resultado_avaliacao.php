<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ResultadoAvaliacao extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resultados_avaliacoes', function(Blueprint $table){
            $table->increments('id');
            
            $table->integer('avaliacao_id')->unsigned();
            $table->integer('pergunta_id')->unsigned();
            $table->integer('resposta_id')->unsigned();

            $table->foreign('avaliacao_id')->references('id')->on('avaliacoes');
            $table->foreign('pergunta_id')->references('id')->on('perguntas');
            $table->foreign('resposta_id')->references('id')->on('respostas');

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
        //
    }
}
