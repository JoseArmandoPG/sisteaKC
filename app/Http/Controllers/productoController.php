<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\productos;
use App\categorias;
use App\ubicaciones;
use App\plataformas;
use App\marcas;
use App\DB;
use Session;

class productoController extends Controller
{
    public function altaProducto(){
        $categorias = categorias::OrderBy('categoria','asc')->get();
        $ubicaciones = ubicaciones::OrderBy('ubicacion','asc')->get();
        $plataformas = plataformas::OrderBy('plataforma','asc')->get();
        $marcas = marcas::OrderBy('marca','asc')->get();
        $clavesig   = productos::orderBy('idPro','producto')->take(1)->get();
		$idproSig    = $clavesig[0]->idPro+1;
		return view ('sistema.productos.altaProducto')
                    ->with('categorias',$categorias)
                    ->with('ubicaciones',$ubicaciones)
                    ->with('plataformas',$plataformas)
                    ->with('marcas',$marcas)
                    ->with('idproSig',$idproSig);
    }

    public function guardaUsuario(Request $request){
        $idUsu      = $request->idUsu;
        $usuario    = $request->usuario;
        $password   = $request->password;
        $permisos   = $request->permisos;
        $nombre     = $request->nombre;

        $this->validate($request,[
            'idUsu'     =>'required|numeric',
            'usuario'   =>'required|alpha_num',
            'password'  =>'required|alpha_num',
            'permisos'  =>'required|regex:/^[A-Z,a-z, ,ñ,á,é,í,ó,ú]+$/',
            'nombre'    =>'required|regex:/^[A-Z,a-z, ,ñ,á,é,í,ó,ú]+$/',
        ]);

        $usu                = new usuarios;
        $usu->idUsu         = $request->idUsu;
        $usu->usuario       = $request->usuario;
        $usu->password      = $request->password;
        $usu->permisos      = $request->permisos;
        $usu->nombre        = $request->nombre;
        $usu->save();

        $proceso = "Alta Usuario";
        $mensaje = "Registro guardado correctamente";
        return view('sistema.mensaje')->with('proceso',$proceso)->with('mensaje',$mensaje);
    }

    public function prueba(){
		return view ('sistema.productos.prueba');
    }
}
