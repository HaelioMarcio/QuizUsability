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
        Schema::create('questionario', function(Blueprint $table){
            $table->increments('id');
            $table->string('descricao', 255);
            $table->integer('projeto_id')->unsigned();
            $table->string('token', 15)->unique();
            $table->string('objetivo', 255);
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('projeto_id')->references('id')->on('projeto');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('questionario');
    }
}
