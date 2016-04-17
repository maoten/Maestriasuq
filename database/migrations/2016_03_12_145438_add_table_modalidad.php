<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTableModalidad extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modalidad', function (Blueprint $table) {
        $table->increments('id');
        $table->string('nombre')->unique();
        $table->timestamps();
    });
       DB::statement("INSERT INTO `modalidad` (`nombre`) VALUES ('Investigación')");
       DB::statement("INSERT INTO `modalidad` (`nombre`) VALUES ('Profundización')");
   }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::drop('modalidad');
    }
}
