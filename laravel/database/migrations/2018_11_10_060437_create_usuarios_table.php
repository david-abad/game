<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre')->unique();
            $table->string('password');
            $table->string('avatar')->default('luna.png');
            $table->integer('creditos')->default(0);
            $table->integer('nivelActual')->default(1);
            $table->string('nave')->default('nave1.png');
            $table->integer('diaRecompensa')->default(1);
            $table->date('ultimoLogin'); //No se puede dejar como nulo
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
        Schema::dropIfExists('usuarios');
    }
}
