<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class productos extends Model
{
    use SoftDeletes;
    protected $primaryKey   =   'idPro';
    protected $fillable     =   [   'idPro','codigo','producto','modelo','unidad','stock','cantidad','precio','importe','iva','total','precioAlterno','tipo','status','color','medida',
                                    'genero','talla','linea','fCaducidad','foto','idCat','idUb','idPla','idMarca'    ];
    protected $date=['deleted_at'];
}
