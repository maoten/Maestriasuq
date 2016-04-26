<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cc')->unique();
            $table->string('nombre');
            $table->string('telefono');
            $table->string('profesion');
            $table->string('universidad');
            $table->string('email')->unique();
            $table->string('password', 60);
            $table->string('imagen');
            $table->enum('rol', [
                'admin',
                'estudiante',
                'director_grado',
                'profesor',
                'jurado',
                'consejo_curricular'
            ])->default('estudiante');
            $table->rememberToken();
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
        Schema::drop('users');
    }
}
