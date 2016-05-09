<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddTableEventos extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eventos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('asunto');
            $table->string('descripcion');
            $table->string('lugar');
            $table->timestamp('fecha_inicio');
            $table->timestamp('fecha_fin');
            $table->integer('propuesta_id')->unsigned()->nullable();
            $table->foreign('propuesta_id')->references('id')->on('propuesta')->onDelete('cascade');
            $table->integer('trabajogrado_id')->unsigned()->nullable();
            $table->foreign('trabajogrado_id')->references('id')->on('trabajogrado')->onDelete('cascade');
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
        Schema::drop('eventos');
    }
}
