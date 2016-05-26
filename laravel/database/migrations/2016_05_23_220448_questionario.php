<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Questionario extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questionarios', function(Blueprint $table){
            $table->increments('id');
            $table->string('descricao', 45)->nullable();
            $table->integer('projeto_id')->unsigned();
            $table->string('objetivo', 45)->nullable();
            $table->boolean('ativo')->default(false);
            $table->timestamps();
            $table->foreign('projeto_id')->references('id')->on('projetos');
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
