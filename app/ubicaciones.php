<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ubicaciones extends Model
{
    use SoftDeletes;
    protected $primaryKey   =   'idUb';
    protected $fillable     =   ['idUb','ubicacion'];
    protected $date=['deleted_at'];
}
