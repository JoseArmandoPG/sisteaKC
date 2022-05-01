<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class bitacoras extends Model
{
    use SoftDeletes;
    protected $primaryKey   =   'idBP';
    protected $fillable     =   ['idBP','fechaHora','tipo','idPro','idUsu'];
    protected $date=['deleted_at'];
}
