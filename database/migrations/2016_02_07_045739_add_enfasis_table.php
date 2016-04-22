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
            $table->increments('id');
            $table->string('nombre')->unique();
            $table->timestamps();
        });
        DB::statement("INSERT INTO `enfasis` (`nombre`) VALUES ('Ingeniería Sísmica y Estructural')");
        DB::statement("INSERT INTO `enfasis` (`nombre`) VALUES ('Geomática')");
        DB::statement("INSERT INTO `enfasis` (`nombre`) VALUES ('Ingeniería en Recursos Hídricos y Medio Ambiente')");
        DB::statement("INSERT INTO `enfasis` (`nombre`) VALUES ('Ingeniería de Software')");
        DB::statement("INSERT INTO `enfasis` (`nombre`) VALUES ('Telecomunicaciones')");

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
