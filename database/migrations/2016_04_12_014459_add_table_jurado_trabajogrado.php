<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddTableJuradoTrabajogrado extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jurado_trabajogrado', function (Blueprint $table) {
            $table->integer('trabajogrado_id')->unsigned();
            $table->foreign('trabajogrado_id')->references('id')->on('trabajogrado')->onDelete('cascade');
            $table->integer('jurado_id')->unsigned();
            $table->foreign('jurado_id')->references('user_id')->on('jurados')->onDelete('cascade');
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
        Schema::drop('jurado_trabajogrado');
    }

}
