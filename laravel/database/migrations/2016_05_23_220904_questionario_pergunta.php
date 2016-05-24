<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class QuestionarioPergunta extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questionarios_perguntas', function(Blueprint $table){
            $table->integer('questionario_id')->unsigned();
            $table->integer('pergunta_id')->unsigned();
            $table->timestamps();

            $table->foreign('questionario_id')->references('id')->on('questionarios');
            $table->foreign('pergunta_id')->references('id')->on('perguntas');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('questionarios_perguntas');
    }
}
