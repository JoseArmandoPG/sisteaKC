<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\plataformas;
use App\DB;
use Session;

class plataformaController extends Controller
{
    public function altaPlataforma(){
        /*$clavesig   = plataformas::orderBy('idPla','plataforma')->take(1)->get();
		$idplata    = $clavesig[0]->idPla+1;*/
		return view ('sistema.plataformas.altaPlataforma');
    }

    public function guardaPlataforma(Request $request){
        //$idPla      = $request->idPla;
        $plataforma = $request->plataforma;

        $this->validate($request,[
            //'idPla'      =>'required|numeric',
            'plataforma' =>'required|regex:/^[A-Z][A-Z,a-z, ,ñ,á,é,í,ó,ú]+$/',
        ]);

        $plat               =   new plataformas;
        //$plat->idPla        =   $request->idPla;
        $plat->plataforma   =   $request->plataforma;
        $plat->save();

        $proceso = "Alta Plataforma";
        $mensaje = "Registro guardado correctamente";
        return view('sistema.mensaje')->with('proceso',$proceso)->with('mensaje',$mensaje);
    }

    public function reportePlataforma(){
        $plataformas=\DB::select("SELECT idPla,plataforma,deleted_at
        FROM plataformas
        ORDER BY idPla ASC");
        return view('sistema.plataformas.reportePlataformas')->with('plataformas',$plataformas);
    }

    public function eliminaPlataforma($idPla){
        plataformas::find($idPla)->delete();
        $proceso = "Desactivar Plataforma";
        $mensaje = "La plataforma se ha desactivado correctamente";
        return view('sistema.mensaje')->with('proceso',$proceso)->with('mensaje',$mensaje);
    }

    public function eFisicaPlataforma($idPla){
        plataformas::withTrashed()->where('idPla',$idPla)->forceDelete();
        $proceso = "Eliminar Plataforma";
        $mensaje = "La Plataforma ha sido borrada correctamente";
        return view('sistema.mensaje')->with('proceso',$proceso)->with('mensaje',$mensaje);
    }

    public function restauraPlataforma($idPla){
        plataformas::withTrashed()->where('idPla',$idPla)->restore();
        $proceso = "Restauración de Plataforma";
        $mensaje = "Registro restaurado correctamente";
        return view('sistema.mensaje')->with('proceso',$proceso)->with('mensaje',$mensaje);
    }

    public function modificaPlataforma($idPla){
        $plataformaM = plataformas::where('idPla','=',$idPla)->get();
        return view('sistema.plataformas.editaPlataforma')->with('plataformaM',$plataformaM[0]);
    }

    public function editaPlataforma(Request $request){
        $plataforma     = $request->plataforma;
        $idPla          = $request->idPla;

        $this->validate($request,[
            'plataforma'    =>'required|regex:/^[A-Z][A-Z,a-z, ,ñ,á,é,í,ó,ú]+$/',
        ]);

        $plat                = plataformas::find($idPla);
        $plat->idPla         = $request->idPla;
        $plat->plataforma    = $request->plataforma;
        $plat->save();

        $proceso = "Modificar Plataforma";
        $mensaje = "Registro modificado corretamente";
        return view('sistema.mensaje')->with('proceso',$proceso)->with('mensaje',$mensaje);
    }
}
