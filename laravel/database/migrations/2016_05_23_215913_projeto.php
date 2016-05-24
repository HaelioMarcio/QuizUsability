<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Projeto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projetos', function(Blueprint $table){
            $table->increments('id');
            $table->string('descricao', 45)->nullable();
            $table->timestamp('data_cadastro')->nullable();
            $table->integer('empresa_id')->unsigned();
            $table->timestamps();

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
        Schema::drop('projetos');
    }
}
