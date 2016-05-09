<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddComentariosTable extends Migration
{

    public $comentarios = "comentarios";

    public $user_id = 'user_id';


    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->comentarios, function (Blueprint $table) {
            $table->increments('id');
            $table->string($this->comentarios, 255);
            $table->integer('propuesta_id')->unsigned()->nullable();
            $table->foreign('propuesta_id')->references('id')->on('propuesta')->onDelete('cascade');

            $table->integer('trabajogrado_id')->unsigned()->nullable();
            $table->foreign('trabajogrado_id')->references('id')->on('trabajogrado')->onDelete('cascade');

            $table->integer($this->user_id)->unsigned();
            $table->foreign($this->user_id)->references($this->user_id)->on('jurados')->onDelete('cascade');
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
        Schema::drop($this->comentarios);
    }
}
