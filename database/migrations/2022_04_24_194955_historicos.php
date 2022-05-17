<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class historicos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historicos', function (Blueprint $table){
            $table->increments('idBV');
            $table->dateTime('fechaHora');
            $table->integer('cantidad');
            $table->double('precio');
            $table->double('importe');
            $table->double('iva');
            $table->double('total');
            $table->integer('idVenta')->unsigned();
            $table->foreign('idVenta')->references('idVenta')->on('ventas');
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
        Schema::drop('historicos');
    }
}
