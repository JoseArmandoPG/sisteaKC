<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class bitacoraProductos extends Model
{
    use SoftDeletes;
    protected $primaryKey   =   'idBP';
    protected $fillable     =   ['idBP','fechaHora','tipo','idPro','idUsu'];
    protected $date=['deleted_at'];
}
