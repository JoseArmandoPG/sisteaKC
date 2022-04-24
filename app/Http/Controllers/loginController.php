<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\usuarios;
use Session;

class loginController extends Controller
{
    public function login(){
        return view ('sistema.page-login');
    }

    public function valida(Request $request){
        $usuario = $request->usuario;
        $password = $request->password;
        $this->validate($request,[
            'usuario'=>'required',
            'password'=>'required'
        ]);
        $consulta = usuarios::withTrashed()->where('usuario',$usuario)
                                           ->where('password','=',$password)
                                           ->get();
        
        if(count($consulta)==0){
            Session::flash('error','El usuario no existe o la contraseña no es correcta');
            return redirect()->route('login');
        }else{
            if($consulta[0]->deleted_at!=""){
                Session::flash('error','El usuario esta desactivado consulte a su administrador');
                return redirect()->route('login');
            }else{
                Session::put('sesionNombre',$consulta[0]->nombre);
                Session::put('sesionidUsu',$consulta[0]->idUsu);
                Session::put('sesionTipo',$consulta[0]->tipo_usu);

                return redirect()->route('inicio');
            }
        }
    }

    public function inicio(){
        if(Session::get('sesionidUsu')!=""){
            return view('sistema.inicio');
        }else{
            Session::flash('error','Es necesario loguearse antes de continuar');
            return redirect()->route('login');
        }
    }

    public function cerrarsesion(){
        Session::forget('sesionNombre');
        Session::forget('sesionidUsu');
        Session::forget('sesionTipo');
        Session::flush();

        return view('sistema.page-login');
    }
}
