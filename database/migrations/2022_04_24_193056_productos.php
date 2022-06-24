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
            $table->integer('cantidad');
            $table->double('precio');
            $table->double('importe');
            $table->double('iva');
            $table->double('total');
            $table->double('precioAlterno');
            $table->integer('tipo');
            $table->string('status',40);
            $table->string('color',40);
            $table->double('medida');
            $table->string('genero',40);
            $table->double('talla');
            $table->string('linea',40);
            $table->date('fCaducidad');
            $table->string('foto',200);
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
