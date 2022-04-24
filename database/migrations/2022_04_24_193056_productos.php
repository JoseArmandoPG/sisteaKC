<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Productos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table){
            $table->increments('idPro');
            $table->string('codigo',40);
            $table->string('producto',40);
            $table->string('modelo',40);
            $table->string('unidad',40);
            $table->integer('stock');
            $table->double('precio');
            $table->double('iva');
            $table->double('total');
            $table->integer('tipo');
            $table->string('foto',40);
            $table->integer('idCat')->unsigned();
            $table->foreign('idCat')->references('idCat')->on('categorias');
            $table->integer('idUb')->unsigned();
            $table->foreign('idUb')->references('idUb')->on('ubicaciones');
            $table->integer('idPla')->unsigned();
            $table->foreign('idPla')->references('idPla')->on('plataformas');
            $table->integer('idMarca')->unsigned();
            $table->foreign('idMarca')->references('idMarca')->on('marcas');
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
        Schema::drop('productos');
    }
}
