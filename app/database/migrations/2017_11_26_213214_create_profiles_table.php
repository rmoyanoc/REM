<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProfilesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('users_id')->unsigned()->required()->unique();
            $table->string('rut', 10)->required()->unique();
            $table->string('nombres', 100)->required();
            $table->string('apellidoPaterno', 70)->required();
            $table->string('apellidoMaterno', 70)->required();
            $table->date('fechaNacimiento');
            $table->string('telefono', 15)->nullable;
            $table->binary('imagen')->nullable;
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('users_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('profiles');
    }
}
