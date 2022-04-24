<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class bitacoraVentas extends Model
{
    use SoftDeletes;
    protected $primaryKey   =   'idBV';
    protected $fillable     =   ['idBV','fechaHora','precio','iva','total','idPro','idUsu'];
    protected $date=['deleted_at'];
}
