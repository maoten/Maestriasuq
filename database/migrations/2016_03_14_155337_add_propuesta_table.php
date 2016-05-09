<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddPropuestaTable extends Migration
{

    public $cascade = 'cascade';


    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('propuesta', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titulo')->required();
            $table->enum('estado',
                [ 'enviada', 'aceptada', 'aplazada', 'modificada', 'a modificar', 'en espera' ])->default('enviada');

            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete($this->cascade);
            $table->integer('dir_id')->unsigned();
            $table->foreign('dir_id')->references('id')->on('users')->onDelete($this->cascade);

            $table->integer('enf_id')->unsigned();
            $table->foreign('enf_id')->references('id')->on('enfasis')->onDelete($this->cascade);

            $table->integer('mod_id')->unsigned();
            $table->foreign('mod_id')->references('id')->on('modalidad')->onDelete($this->cascade);

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
        Schema::drop('propuesta');
    }
}
