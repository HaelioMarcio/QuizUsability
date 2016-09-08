<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCategoriaToPergunta extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pergunta', function (Blueprint $table) {            
            $table->integer('categoria_id')->nullable();            
            // $table->integer('categoria_id')->unsigned();            
            // $table->foreign('categoria_id')->references('id')->on('categoria');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pergunta', function (Blueprint $table) {
            //
        });
    }
}
