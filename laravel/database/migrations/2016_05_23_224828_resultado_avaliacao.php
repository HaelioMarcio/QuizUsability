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
        Schema::create('resultado_avaliacao', function(Blueprint $table){
            $table->increments('id');
            
            $table->integer('avaliacao_id')->unsigned();
            $table->integer('pergunta_id')->unsigned();
            $table->integer('resposta_id')->unsigned();

            $table->foreign('avaliacao_id')->references('id')->on('avaliacao');
            $table->foreign('pergunta_id')->references('id')->on('pergunta');
            $table->foreign('resposta_id')->references('id')->on('resposta');

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
        Schema::drop('resultado_avaliacao');
    }
}
