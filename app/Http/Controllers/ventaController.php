<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\ventas;
use App\productos;
use App\categorias;
use App\DB;
use Session;

class ventaController extends Controller
{
    public function venta(){
        date_default_timezone_set('America/Mexico_City');
        $fecha = date("d-m-Y");
        $hora = date("H:i:s");
        $fechaHoraL = date('d-m-Y H:i:s', time());
        $time = time();
        $usuarioActivo  = Session::get('sesionNombre');
        $userID         = Session::get('sesionidUsu');
        $clavesig       = ventas::orderBy('idVenta')->take(1)->get();
		$idvenSig       = $clavesig[0]->idVenta+1;
        $productos      = productos::all();
        $categorias     = categorias::all();
        // $sigBita        = bitacoras::orderBy('idBP')->take(1)->get();
        // $idBitSig       = $sigBita[0]->idBP+1;
		return view ('sistema.ventas.venta')
                    ->with('idvenSig',$idvenSig)
                    ->with('hora',$hora)
                    ->with('fechaHoraL',$fechaHoraL)
                    ->with('usuarioActivo',$usuarioActivo)
                    ->with('userID',$userID)
                    ->with('productos',$productos)
                    ->with('categorias',$categorias);
    }
}
