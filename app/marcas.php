<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class marcas extends Model
{
    use SoftDeletes;
    protected $primaryKey   =   'idMarca';
    protected $fillable     =   ['idMarca','marca'];
    protected $date=['deleted_at'];
}
