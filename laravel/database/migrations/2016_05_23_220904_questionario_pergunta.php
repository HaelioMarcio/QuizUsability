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
        Schema::create('questionario_pergunta', function(Blueprint $table){
            $table->integer('questionario_id')->unsigned();
            $table->integer('pergunta_id')->unsigned();

            $table->foreign('questionario_id')->references('id')->on('questionario');
            $table->foreign('pergunta_id')->references('id')->on('pergunta');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('questionario_pergunta');
    }
}
