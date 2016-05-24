<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Pergunta extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perguntas', function(Blueprint $table){
            $table->increments('id');
            $table->string('descricao', 45)->nullable();
            $table->integer('heuristica_id')->unsigned();
            $table->integer('empresa_id')->unsigned();
            $table->timestamps();

            $table->foreign('heuristica_id')->references('id')->on('heuristicas');
            $table->foreign('empresa_id')->references('id')->on('empresas');
            
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
