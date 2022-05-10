<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\usuarios;
use App\DB;
use Session;

class usuarioController extends Controller
{
    public function altaUsuario(){
        $clavesig   = usuarios::orderBy('idUsu','usuario')->take(1)->get();
		$idusuSig    = $clavesig[0]->idUsu+1;
		return view ('sistema.usuarios.altaUsuario')->with('idusuSig',$idusuSig);
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

    public function reporteUsuario(){
        $usuarios=\DB::select("SELECT idUsu,usuario,permisos,nombre,deleted_at
        FROM usuarios
        ORDER BY idUsu ASC");
        return view('sistema.usuarios.reporteUsuarios')->with('usuarios',$usuarios);
    }

    public function eliminaUsuario($idUsu){
        usuarios::find($idUsu)->delete();
        $proceso = "Desactivar Usuario";
        $mensaje = "El usuario se ha desactivado correctamente";
        return view('sistema.mensaje')->with('proceso',$proceso)->with('mensaje',$mensaje);
    }

    public function eFisicaUsuario($idUsu){
        usuarios::withTrashed()->where('idUsu',$idUsu)->forceDelete();
        $proceso = "Eliminar Usuario";
        $mensaje = "El Usuario ha sido borrada correctamente";
        return view('sistema.mensaje')->with('proceso',$proceso)->with('mensaje',$mensaje);
    }

    public function restauraUsuario($idUsu){
        usuarios::withTrashed()->where('idUsu',$idUsu)->restore();
        $proceso = "Restauración de Usuario";
        $mensaje = "Registro restaurado correctamente";
        return view('sistema.mensaje')->with('proceso',$proceso)->with('mensaje',$mensaje);
    }

    public function modificaUsuario($idUsu){
        $usuarioM = usuarios::where('idUsu','=',$idUsu)->get();
        return view('sistema.usuarios.editaUsuario')->with('usuarioM',$usuarioM[0]);
    }

    public function editaUsuario(Request $request){
        $usuario    = $request->usuario;
        $password   = $request->password;
        $permisos   = $request->permisos;
        $nombre     = $request->nombre;
        $idUsu      = $request->idUsu;

        $this->validate($request,[
            'usuario'   =>'required|alpha_num',
            'password'  =>'required|alpha_num',
            'permisos'  =>'required|regex:/^[A-Z,a-z, ,ñ,á,é,í,ó,ú]+$/',
            'nombre'    =>'required|regex:/^[A-Z,a-z, ,ñ,á,é,í,ó,ú]+$/',
        ]);

        $usu            = usuarios::find($idUsu);
        $usu->idUsu     = $request->idUsu;
        $usu->usuario   = $request->usuario;
        $usu->password  = $request->password;
        $usu->permisos  = $request->permisos;
        $usu->nombre    = $request->nombre;
        $usu->save();

        $proceso = "Modificar Usuario";
        $mensaje = "Registro modificado corretamente";
        return view('sistema.mensaje')->with('proceso',$proceso)->with('mensaje',$mensaje);
    }
}
