<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class plataformas extends Model
{
    use SoftDeletes;
    protected $primaryKey   =   'idPla';
    protected $fillable     =   ['idPla','plataforma'];
    protected $date=['deleted_at'];
}
