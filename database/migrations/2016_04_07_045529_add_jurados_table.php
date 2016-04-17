<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddJuradosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jurados', function (Blueprint $table) {


            $table->integer('user_id')->unsigned();
            $table->string('pais_id',2);
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('pais_id')->references('cod')->on('paises')->onDelete('cascade');
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
        Schema::drop('jurados');
    }
}
