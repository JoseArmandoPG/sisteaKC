<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\usuarios;
use APP\historicos;
use APP\ventas;
use APP\productos;
use App\DB;
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
                Session::put('sesionTipo',$consulta[0]->permisos);

                return redirect()->route('inicio');
            }
        }
    }

    public function inicio(){
        $historicos =\DB::select("SELECT SUM(total) AS ganancias FROM historicos");

        $ventas =\DB::select("SELECT COUNT(idVenta) AS ventas FROM ventas");

        $graficas =\DB::select("SELECT COUNT(v.idVenta) AS cantidad ,p.producto
        FROM ventas AS v
        INNER JOIN productos AS p ON v.idPro = p.idPro
        GROUP BY p.producto ORDER BY cantidad DESC");

        $graficaMV =\DB::select("SELECT COUNT(v.idVenta) AS cantidad ,p.producto
        FROM ventas AS v
        INNER JOIN productos AS p ON v.idPro = p.idPro
        GROUP BY p.producto ORDER BY cantidad ASC");

        $productos =\DB::select("SELECT COUNT(idPro) AS nProductos, SUM(total) AS inversion FROM productos");

        if(Session::get('sesionidUsu')!=""){
            return view('sistema.inicio')   ->with('historicos',$historicos[0])
                                            ->with('ventas',$ventas[0])
                                            ->with('productos',$productos[0])
                                            ->with('graficas',$graficas)
                                            ->with('graficaMV',$graficaMV);
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

        //return view('sistema.page-login');
        return redirect()->route('login');
    }
}
