<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddTableEvaluaciones extends Migration
{
    public  $cascade='cascade';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evaluaciones', function (Blueprint $table) {
            $table->increments('id');
            $table->string('evaluacion');
            $table->enum('estado', [ 'aceptada', 'aplazada', 'a modificar', 'aceptado', 'aplazado' ]);

            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete($this->cascade);

            $table->integer('propuesta_id')->unsigned()->nullable();
            $table->foreign('propuesta_id')->references('id')->on('propuesta')->onDelete($this->cascade);

            $table->integer('trabajogrado_id')->unsigned()->nullable();
            $table->foreign('trabajogrado_id')->references('id')->on('trabajogrado')->onDelete($this->cascade);

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
        Schema::drop('evaluaciones');
    }
}
