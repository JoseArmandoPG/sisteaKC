<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ventas extends Model
{
    use SoftDeletes;
    protected $primaryKey   =   'idVenta';
    protected $fillable     =   ['idVenta','codigo','descripcion','ultimaVenta','fechaEntrada','modelo','color','stock','medida','genero','talla','linea','status','idPro',];
    protected $date=['deleted_at'];
}
