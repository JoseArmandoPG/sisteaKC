<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Ventas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ventas', function (Blueprint $table){
            $table->increments('idVenta');
            $table->string('codigo',40);
            $table->string('descripcion',40);
            $table->date('ultimaVenta');
            $table->date('fechaEntrada');
            $table->string('modelo',40);
            $table->string('color',40);
            $table->integer('stock');
            $table->double('medida');
            $table->string('genero',40);
            $table->double('talla');
            $table->string('linea',40);
            $table->string('status',40);
            $table->integer('idPro')->unsigned();
            $table->foreign('idPro')->references('idPro')->on('productos');
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
        Schema::drop('ventas');
    }
}
