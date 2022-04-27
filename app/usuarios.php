<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class usuarios extends Model
{
    use SoftDeletes;
    protected $primaryKey   =   'idUsu';
    protected $fillable     =   ['idUsu','usuario','password','permisos','nombre'];
    protected $date=['deleted_at'];
}
