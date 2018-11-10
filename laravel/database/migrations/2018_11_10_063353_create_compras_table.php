<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComprasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compras', function (Blueprint $table) {
            $table->unsignedInteger('id_usuarios');
            $table->unsignedInteger('id_objetos');
            $table->timestamps();
        });
        Schema::table('compras', function (Blueprint $table) {
            $table->foreign('id_usuarios')->references('id')->on('usuarios');
            $table->foreign('id_objetos')->references('id')->on('objetos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('compras');
    }
}
