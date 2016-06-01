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
            $table->string('password');
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
         $pass= bcrypt('12345');
          DB::statement("INSERT INTO `users` (`cc`,`nombre`,`telefono`,`profesion`,`universidad`,`email`,`password`,`imagen`,`rol`) VALUES ('1094950026','Nefrectery Morales Gómez','3117568273','Ingeniera de sistemas y computación','Universidad del Quindío','nefremg@hotmail.com','$pass','/sistema/usuarios/user.jpg','admin')");
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
