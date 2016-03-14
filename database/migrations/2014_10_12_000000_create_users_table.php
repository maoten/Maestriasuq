<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->string('name');
            $table->string('phone');
            $table->string('profession');
            $table->string('college');
            $table->string('email')->unique();
            $table->string('password', 60);
            $table->enum('type',['admin','estudiante','director_grado','profesor','jurado','consejo_curricular'])->default('estudiante');
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
