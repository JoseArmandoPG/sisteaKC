<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\categorias;
use App\DB;
use Session;

class categoriaController extends Controller
{
    public function altaCategoria(){
        $clavesig = categorias::orderBy('idCat','categoria')->take(1)->get();
		$idest	  = $clavesig[0]->idCat+1;
		return view ('sistema.altaCategoria')->with('idest',$idest);
    }
}
