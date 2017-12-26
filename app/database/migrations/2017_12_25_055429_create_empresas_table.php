<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateempresasTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empresas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('rut', 10)->unique()->required();
            $table->string('razon_social', 150)->required();
            $table->string('nombre_fantasia', 150)->nullable();
            $table->string('direccion', 70)->required();
            $table->string('comuna', 40)->required();
            $table->string('ciudad', 40)->required();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('empresas');
    }
}
