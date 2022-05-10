<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\ventas;
use App\productos;
use App\categorias;
use App\historicos;
use App\bitacoras;
use App\usuarios;
use App\DB;
use Session;

class ventaController extends Controller
{
    public function venta(){
        date_default_timezone_set('America/Mexico_City');
        $fecha = date("Y-m-d");
        $hora = date("H:i:s");
        $fechaHoraL = date('d-m-Y H:i:s', time());
        $time = time();
        $usuarioActivo  = Session::get('sesionNombre');
        $userID         = Session::get('sesionidUsu');
        $clavesig       = ventas::orderBy('idVenta','codigo')->take(1)->get();
		$idvenSig       = $clavesig[0]->idVenta+1;
        $productos      = productos::all();
        $categorias     = categorias::all();
        // $sigBita        = bitacoras::orderBy('idBP')->take(1)->get();
        // $idBitSig       = $sigBita[0]->idBP+1;
		return view ('sistema.ventas.venta')
                    ->with('idvenSig',$idvenSig)
                    ->with('hora',$hora)
                    ->with('fecha',$fecha)
                    ->with('fechaHoraL',$fechaHoraL)
                    ->with('usuarioActivo',$usuarioActivo)
                    ->with('userID',$userID)
                    ->with('productos',$productos)
                    ->with('categorias',$categorias);
    }

    public function detalleFechas(Request $request){
        date_default_timezone_set('America/Mexico_City');
        $fecha = date("d-m-Y");
        $hora = date("H:i:s");
        $fechaHoraL = date('d-m-Y H:i:s', time());

        $codigo = $request->get('codigo');
        $bitacoras =\DB::select("SELECT b.fechaHora, b.idBP, p.codigo
        FROM bitacoras AS b
        INNER JOIN productos AS p
        WHERE p.codigo = '$codigo'
        AND b.tipo = 1
        ORDER BY idBP DESC
        LIMIT 1");
        
        $historicos =\DB::select("SELECT h.fechaHora, h.idBV
        FROM historicos AS h
        INNER JOIN ventas AS v ON h.idVenta = v.idVenta
        INNER JOIN productos AS p ON v.idPro = p.idPro
        WHERE p.codigo = '$codigo'
        ORDER BY h.idBV DESC
        LIMIT 1");
        return view('sistema.ventas.detalleFechas')->with('bitacoras',$bitacoras)->with('historicos',$historicos);
    }

    public function guardaVenta(Request $request){
        date_default_timezone_set('America/Mexico_City');
        $fechaHoraL = date('Y-m-d H:i:s', time());
        $userID         = Session::get('sesionidUsu');
        $sigBita        = bitacoras::orderBy('idBP','fechaHora')->take(1)->get();
		$idBPSig        = $sigBita[0]->idBP+1;
        $sigHisto       = historicos::orderBy('idBV','fechaHora')->take(1)->get();
        $idBVSig        = $sigHisto[0]->idBV+1;


        $idVenta        = $request->idVenta;
        $categoria      = $request->categoria;
        $idPro          = $request->idPro;
        $codigo         = $request->codigo;
        $modelo         = $request->modelo;
        $stock          = $request->stock;
        /*$precio         = $request->precio;
        $iva            = $request->iva;
        $total          = $request->total;*/
        $descripcion    = $request->descripcion;
        $uVenta         = $request->uVenta;
        $fEntrada       = $request->feEntrada;
        $color          = $request->color;
        $medida         = $request->medida;
        $genero         = $request->genero;
        $talla          = $request->talla;
        $linea          = $request->linea;
        $status         = $request->status;

        $this->validate($request,[
			'descripcion'   =>'required|string',
		]);

        if($uVenta == ""){
            $fec = $fechaHoraL;
        }else{
            $fec = $uVenta;
        }

        $vent               = new ventas;
        $vent->idVenta      = $request->idVenta;
        $vent->codigo       = $request->codigo;
        $vent->descripcion  = $request->descripcion;
        $vent->ultimaVenta  = $fec;
        $vent->fechaEntrada = $request->fEntrada;
        $vent->modelo       = $request->modelo;
        $vent->color        = $request->color;
        $vent->stock        = $request->stock-1;
        $vent->medida       = $request->medida;
        $vent->genero       = $request->genero;
        $vent->talla        = $request->talla;
        $vent->linea        = $request->linea;
        $vent->status       = $request->status;
        $vent->idPro        = $request->idPro;
        $vent->save();

        $bPro               = new bitacoras;
        $bPro->idBP         = $idBPSig;
        $bPro->fechaHora    = $fechaHoraL;
        $bPro->tipo         = 3;
        $bPro->idPro        = $request->idPro;
        $bPro->idUSu        = $userID;
        $bPro->save();

        $bVen               = new historicos;
        $bVen->idBV         = $idBVSig;
        $bVen->fechaHora    = $fechaHoraL;
        $bVen->precio       = $request->precio;
        $bVen->iva          = $request->iva;
        $bVen->total        = $request->total;
        $bVen->idVenta      = $request->idVenta;
        $bVen->idUsu        = $userID;
        $bVen->save();

        $venPro             = productos::find($idPro);
        $venPro->stock      = $request->stock-1;
        $venPro->save();
        
        $proceso = "Venta Realizada";
        $mensaje = "Registro guardado correctamente";
        return view('sistema.mensaje')->with('proceso',$proceso)->with('mensaje',$mensaje);
    }

    public function reporteVenta(){
        $historicos=\DB::select("SELECT v.codigo,v.descripcion,v.ultimaVenta,v.fechaEntrada,v.modelo,v.stock,v.color,v.medida,v.genero,v.talla,v.linea,
        v.status,b.fechaHora,b.precio,b.iva,b.total,p.foto,p.producto,u.nombre,b.deleted_at
        FROM historicos AS b
        INNER JOIN ventas AS v ON b.idVenta = v.idVenta
        INNER JOIN productos AS p ON v.idPro = p.idPro
        INNER JOIN usuarios AS u ON b.idUsu = u.idUsu
        ORDER BY b.idBV ASC");
        return view('sistema.ventas.reporteVentas')->with('historicos',$historicos);
    }
}
