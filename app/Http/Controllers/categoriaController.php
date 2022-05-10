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
		$idcate	  = $clavesig[0]->idCat+1;
		return view ('sistema.categorias.altaCategoria')->with('idcate',$idcate);
    }

    public function guardaCategoria(Request $request){
        $idCat      = $request->idCat;
        $categoria  = $request->categoria;

        $this->validate($request,[
            'idCat'     =>'required|numeric',
            'categoria' =>'required|regex:/^[A-Z][A-Z,a-z, ,ñ,á,é,í,ó,ú]+$/',
        ]);

        $cat            =   new categorias;
        $cat->idCat     =   $request->idCat;
        $cat->categoria =   $request->categoria;
        $cat->save();

        $proceso = "Alta Categoria";
        $mensaje = "Registro guardado correctamente";
        return view('sistema.mensaje')->with('proceso',$proceso)->with('mensaje',$mensaje);
    }

    public function reporteCategoria(){
        $categorias=\DB::select("SELECT idCat,categoria,deleted_at
        FROM categorias
        ORDER BY idCat ASC");
        return view('sistema.categorias.reporteCategorias')->with('categorias',$categorias);
    }

    public function eliminaCategoria($idCat){
        categorias::find($idCat)->delete();
        $proceso = "Desactivar Categoria";
        $mensaje = "La categoria se ha desactivado correctamente";
        return view('sistema.mensaje')->with('proceso',$proceso)->with('mensaje',$mensaje);
    }

    public function eFisicaCategoria($idCat){
        categorias::withTrashed()->where('idCat',$idCat)->forceDelete();
        $proceso = "Eliminar Categoria";
        $mensaje = "La Categoria ha sido borrada correctamente";
        return view('sistema.mensaje')->with('proceso',$proceso)->with('mensaje',$mensaje);
    }

    public function restauraCategoria($idCat){
        categorias::withTrashed()->where('idCat',$idCat)->restore();
        $proceso = "Restauración de Categoria";
        $mensaje = "Registro restaurado correctamente";
        return view('sistema.mensaje')->with('proceso',$proceso)->with('mensaje',$mensaje);
    }

    public function modificaCategoria($idCat){
        $categoriaM = categorias::where('idCat','=',$idCat)->get();
        return view('sistema.categorias.editaCategoria')->with('categoriaM',$categoriaM[0]);
    }

    public function editaCategoria(Request $request){
        $categoria  = $request->categoria;
        $idCat      = $request->idCat;

        $this->validate($request,[
            'categoria'    =>'required|regex:/^[A-Z][A-Z,a-z, ,ñ,á,é,í,ó,ú]+$/',
        ]);

        $cat = categorias::find($idCat);
        $cat->idCat = $request->idCat;
        $cat->categoria = $request->categoria;
        $cat->save();

        $proceso = "Modificar Categoria";
        $mensaje = "Registro modificado corretamente";
        return view('sistema.mensaje')->with('proceso',$proceso)->with('mensaje',$mensaje);
    }
}
