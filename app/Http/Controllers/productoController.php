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

    public function guardaProducto(Request $request){
        $idPro      = $request->idPro;
        $codigo    = $request->codigo;
        $producto   = $request->producto;
        $modelo   = $request->modelo;
        $unidad     = $request->unidad;
        $stock = $request->stock;
        $precio = $request->precio;
        $iva = $request->iva;
        $total = $request->total;

        $file	= $request->file('foto');
		if($file!=""){
		$ldate	= date('Ymd_His_');
		$imgfo	= $file->getClientOriginalName();
		$imgfo2	= $ldate.$imgfo;
		\Storage::disk('local')->put($imgfo2,\File::get($file));
		}
		else {
			$imgfo2	= 'sin_foto.jpg';
        }

        $prod                = new productos;
        $prod->idPro         = $request->idPro;
        $prod->codigo       = $request->codigo;
        $prod->producto      = $request->producto;
        $prod->modelo      = $request->modelo;
        $prod->unidad        = $request->unidad;
        $prod->stock        = $request->stock;
        $prod->precio        = $request->precio;
        $prod->iva        = $request->iva;
        $prod->total        = $request->total;
        $prod->idCat        = $request->idCat;
        $prod->idUb        = $request->idUb;
        $prod->idPla        = $request->idPla;
        $prod->idMarca        = $request->idMarca;
        $prod->save();

        $proceso = "Alta Producto";
        $mensaje = "Registro guardado correctamente";
        return view('sistema.mensaje')->with('proceso',$proceso)->with('mensaje',$mensaje);
    }

    public function prueba(){
		return view ('sistema.productos.prueba');
    }
}
