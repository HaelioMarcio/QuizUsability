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
        Schema::create('pergunta', function(Blueprint $table){
            $table->increments('id');
            $table->string('descricao', 255)->nullable()->unique();
            $table->integer('heuristica_id')->unsigned();
            $table->timestamps();
            $table->foreign('heuristica_id')->references('id')->on('heuristica');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('pergunta');
    }
}
