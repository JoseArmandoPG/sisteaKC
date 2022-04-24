<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class categorias extends Model
{
    use SoftDeletes;
    protected $primaryKey   =   'idCat';
    protected $fillable     =   ['idCat','categoria'];
    protected $date=['deleted_at'];
}
