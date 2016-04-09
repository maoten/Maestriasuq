<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddEnfasisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enfasis', function (Blueprint $table) {
            $table->string('nombre')->unique();
            $table->string('ubicacion');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('user_id')->on('coordinador')->onDelete('cascade');
            
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
        Schema::drop('enfasis');
    }
}
