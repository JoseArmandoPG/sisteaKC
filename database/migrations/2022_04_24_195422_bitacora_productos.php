<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BitacoraProductos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bitacoraProductos', function (Blueprint $table){
            $table->increments('idBP');
            $table->dateTime('fechaHora');
            $table->integer('tipo');
            $table->integer('idPro')->unsigned();
            $table->foreign('idPro')->references('idPro')->on('productos');
            $table->integer('idUsu')->unsigned();
            $table->foreign('idUsu')->references('idUsu')->on('usuarios');
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
        Schema::drop('bitacoraProductos');
    }
}
