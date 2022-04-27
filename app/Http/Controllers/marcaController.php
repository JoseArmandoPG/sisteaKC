<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\marcas;
use App\DB;
use Session;

class marcaController extends Controller
{
    public function altaMarca(){
        $clavesig   = marcas::orderBy('idMarca','marca')->take(1)->get();
		$idmarSig    = $clavesig[0]->idMarca+1;
		return view ('sistema.marcas.altaMarca')->with('idmarSig',$idmarSig);
    }

    public function guardaMarca(Request $request){
        $idMarca    = $request->idMarca;
        $marca      = $request->marca;

        $this->validate($request,[
            'idMarca'   =>'required|numeric',
            'marca'     =>'required|alpha_num',
        ]);

        $mar            = new marcas;
        $mar->idMarca   = $request->idMarca;
        $mar->marca     = $request->marca;
        $mar->save();

        $proceso = "Alta Marca";
        $mensaje = "Registro guardado correctamente";
        return view('sistema.mensaje')->with('proceso',$proceso)->with('mensaje',$mensaje);
    }

    public function reporteMarca(){
        $marcas=\DB::select("SELECT idMarca,marca,deleted_at
        FROM marcas");
        return view('sistema.marcas.reporteMarcas')->with('marcas',$marcas);
    }

    public function eliminaMarca($idMarca){
        marcas::find($idMarca)->delete();
        $proceso = "Desactivar Marca";
        $mensaje = "La marca se ha desactivado correctamente";
        return view('sistema.mensaje')->with('proceso',$proceso)->with('mensaje',$mensaje);
    }

    public function eFisicaMarca($idMarca){
        marcas::withTrashed()->where('idMarca',$idMarca)->forceDelete();
        $proceso = "Eliminar Marca";
        $mensaje = "La Marca ha sido borrada correctamente";
        return view('sistema.mensaje')->with('proceso',$proceso)->with('mensaje',$mensaje);
    }

    public function restauraMarca($idMarca){
        marcas::withTrashed()->where('idMarca',$idMarca)->restore();
        $proceso = "Restauración de Marca";
        $mensaje = "Registro restaurado correctamente";
        return view('sistema.mensaje')->with('proceso',$proceso)->with('mensaje',$mensaje);
    }

    public function modificaMarca($idMarca){
        $marcaM = marcas::where('idMarca','=',$idMarca)->get();
        return view('sistema.marcas.editaMarca')->with('marcaM',$marcaM[0]);
    }

    public function editaMarca(Request $request){
        $marca      = $request->marca;
        $idMarca    = $request->idMarca;

        $this->validate($request,[
            'marca'   =>'required|alpha_num',
        ]);

        $mar            = marcas::find($idMarca);
        $mar->idMarca   = $request->idMarca;
        $mar->marca     = $request->marca;
        $mar->save();

        $proceso = "Modificar Marca";
        $mensaje = "Registro modificado corretamente";
        return view('sistema.mensaje')->with('proceso',$proceso)->with('mensaje',$mensaje);
    }
}
