<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTablePropuestaJurado extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('propuesta_jurado', function (Blueprint $table) {
            $table->integer('propuesta_id')->unsigned();
           $table->foreign('propuesta_id')->references('id')->on('propuesta')->onDelete('cascade');
           $table->integer('user_id')->unsigned();
           $table->foreign('user_id')->references('user_id')->on('jurados')->onDelete('cascade');
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
        Schema::drop('propuesta_jurado');
    }

}
