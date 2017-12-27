<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCiudadesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ciudades', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('comunas_id')->unsigned()->required();
            $table->string('nombre', 60)->required();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('comunas_id')->references('id')->on('comunas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('ciudades');
    }
}
