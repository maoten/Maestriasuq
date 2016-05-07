<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddTrabajoGradoTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('TrabajoGrado', function (Blueprint $table) {

            $table->increments('id');
            $table->string('descripcion')->required();
            $table->enum('estado',
                [ 'enviado', 'aceptado', 'aplazado', 'modificado', 'a modificar', 'en espera' ])->default('enviado');

            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->integer('propuesta_id')->unsigned();
            $table->foreign('propuesta_id')->references('id')->on('propuesta')->onDelete('cascade');

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
        Schema::drop('TrabajoGrado');
    }
}
