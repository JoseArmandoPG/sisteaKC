<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\ventas;
use App\productos;
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
        // $sigBita        = bitacoras::orderBy('idBP')->take(1)->get();
        // $idBitSig       = $sigBita[0]->idBP+1;
		return view ('sistema.ventas.venta')
                    ->with('idvenSig',$idvenSig)
                    ->with('hora',$hora)
                    ->with('fechaHoraL',$fechaHoraL)
                    ->with('usuarioActivo',$usuarioActivo)
                    ->with('userID',$userID);
    }

    public function autocompleteProduc(Request $request){
        $term = $request->get('term');

        $querys = productos::where('codigo', 'LIKE', '%' . $term . '%')->get();

        $data = [];

        foreach ($querys as $querys) {
            $data[] = [
                'label' => $querys->codigo,
                'value' => $querys->modelo
            ];
        }

        return $data;
    }
}
