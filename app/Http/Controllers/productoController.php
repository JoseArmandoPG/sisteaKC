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
        $categorias     = categorias::OrderBy('categoria','deleted_at','asc')->get();
        $ubicaciones    = ubicaciones::OrderBy('ubicacion','deleted_at','asc')->get();
        $plataformas    = plataformas::OrderBy('plataforma','deleted_at','asc')->get();
        $marcas         = marcas::OrderBy('marca','deleted_at','asc')->get();
        $clavesig       = productos::orderBy('idPro','producto')->take(1)->get();
		$idproSig       = $clavesig[0]->idPro+1;
		return view ('sistema.productos.altaProducto')
                    ->with('categorias',$categorias)
                    ->with('ubicaciones',$ubicaciones)
                    ->with('plataformas',$plataformas)
                    ->with('marcas',$marcas)
                    ->with('idproSig',$idproSig);
    }

    public function guardaProducto(Request $request){
        $idPro      = $request->idPro;
        $codigo     = $request->codigo;
        $producto   = $request->producto;
        $modelo     = $request->modelo;
        $unidad     = $request->unidad;
        $stock      = $request->stock;
        $precio     = $request->precio;
        $iva        = $request->iva;
        $total      = $request->total;

        $this->validate($request,[
			'idPro'		=>'required|numeric',
            'codigo'	=>'required|alpha_num',
            'producto'	=>'required|regex:/^[A-Z,a-z, ,ñ,á,é,í,ó,ú]+$/',
            'modelo'	=>'required|alpha_num',
            'unidad'	=>'required|regex:/^[A-Z,a-z, ,ñ,á,é,í,ó,ú]+$/',
            'stock'	    =>'required|integer',
            'precio'    =>'required|numeric',
            'iva'	    =>'required|numeric',
            'total'     =>'required|numeric',
            'foto'      =>'image|mimes:jpg,jpeg,png,gif',
		]);

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

        $prod               = new productos;
        $prod->idPro        = $request->idPro;
        $prod->codigo       = $request->codigo;
        $prod->producto     = $request->producto;
        $prod->modelo       = $request->modelo;
        $prod->unidad       = $request->unidad;
        $prod->stock        = $request->stock;
        $prod->precio       = $request->precio;
        $prod->iva          = $request->iva;
        $prod->total        = $request->total;
        $prod->tipo         = 1;
        $prod->idCat        = $request->idCat;
        $prod->idUb         = $request->idUb;
        $prod->idPla        = $request->idPla;
        $prod->idMarca      = $request->idMarca;
        $prod->foto         = $imgfo2;
        $prod->save();

        $proceso = "Alta Producto";
        $mensaje = "Registro guardado correctamente";
        return view('sistema.mensaje')->with('proceso',$proceso)->with('mensaje',$mensaje);
    }

    public function prueba(){
		return view ('sistema.productos.prueba');
    }

    public function reporteProducto(){
        $productos=\DB::select("SELECT p.idPro,p.codigo,p.producto,p.modelo,p.unidad,p.stock,p.precio,p.iva,p.total,p.foto,c.categoria as categoria,u.ubicacion AS ubicacion,
        pl.plataforma as plataforma,m.marca as marca,p.deleted_at
        FROM productos AS p
        INNER JOIN categorias AS c ON p.idCat = c.idCat
        INNER JOIN ubicaciones AS u ON p.idUb = u.idUb
        INNER JOIN plataformas AS pl ON p.idPla = pl.idPla
        INNER JOIN marcas AS m ON p.idMarca = m.idMarca");
        return view('sistema.productos.reporteProductos')->with('productos',$productos);
    }
}
