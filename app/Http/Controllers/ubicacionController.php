<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\ubicaciones;
use App\DB;
use Session;

class ubicacionController extends Controller
{
    public function altaUbicacion(){
        $clavesig = ubicaciones::orderBy('idUb','ubicacion')->take(1)->get();
		$idubi	  = $clavesig[0]->idUb+1;
		return view ('sistema.ubicaciones.altaUbicacion')->with('idubi',$idubi);
    }

    public function guardaUbicacion(Request $request){
        $idUb      = $request->idUb;
        $ubicacion  = $request->ubicacion;

        $this->validate($request,[
            'idUb'      =>'required|numeric',
            'ubicacion' =>'required|string',
        ]);

        $ubica            =   new ubicaciones;
        $ubica->idUb     =   $request->idUb;
        $ubica->ubicacion =   $request->ubicacion;
        $ubica->save();

        $proceso = "Alta Ubicacion";
        $mensaje = "Registro guardado correctamente";
        return view('sistema.mensaje')->with('proceso',$proceso)->with('mensaje',$mensaje);
    }

    public function reporteUbicacion(){
        $ubicaciones=\DB::select("SELECT idUb,ubicacion,deleted_at
        FROM ubicaciones
        ORDER BY idUb ASC");
        return view('sistema.ubicaciones.reporteUbicaciones')->with('ubicaciones',$ubicaciones);
    }

    public function eliminaUbicacion($idUb){
        ubicaciones::find($idUb)->delete();
        $proceso = "Desactivar Ubicacion";
        $mensaje = "La ubicacion se ha desactivado correctamente";
        return view('sistema.mensaje')->with('proceso',$proceso)->with('mensaje',$mensaje);
    }

    public function eFisicaUbicacion($idUb){
        ubicaciones::withTrashed()->where('idUb',$idUb)->forceDelete();
        $proceso = "Eliminar Ubicacion";
        $mensaje = "La ubicacion ha sido borrada correctamente";
        return view('sistema.mensaje')->with('proceso',$proceso)->with('mensaje',$mensaje);
    }

    public function restauraUbicacion($idUb){
        ubicaciones::withTrashed()->where('idUb',$idUb)->restore();
        $proceso = "Restauración de ubicacion";
        $mensaje = "Registro restaurado correctamente";
        return view('sistema.mensaje')->with('proceso',$proceso)->with('mensaje',$mensaje);
    }

    public function modificaUbicacion($idUb){
        $ubicacionM = ubicaciones::where('idUb','=',$idUb)->get();
        return view('sistema.ubicaciones.editaUbicacion')->with('ubicacionM',$ubicacionM[0]);
    }

    public function editaUbicacion(Request $request){
        $ubicacion  = $request->ubicacion;
        $idUb      = $request->idUb;

        $this->validate($request,[
            'ubicacion'    =>'required|string',
        ]);

        $cat = ubicaciones::find($idUb);
        $cat->idUb = $request->idUb;
        $cat->ubicacion = $request->ubicacion;
        $cat->save();

        $proceso = "Modificar Ubicacion";
        $mensaje = "Registro modificado corretamente";
        return view('sistema.mensaje')->with('proceso',$proceso)->with('mensaje',$mensaje);
    }
}
