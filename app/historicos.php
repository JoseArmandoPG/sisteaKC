<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class historicos extends Model
{
    use SoftDeletes;
    protected $primaryKey   =   'idBV';
    protected $fillable     =   ['idBV','fechaHora','cantidad','precio','importe','iva','total','idVenta','idUsu'];
    protected $date=['deleted_at'];
}
