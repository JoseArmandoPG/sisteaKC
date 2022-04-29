<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\productos;
use App\categorias;
use App\ubicaciones;
use App\plataformas;
use App\marcas;
use App\bitacoraProductos;
use App\DB;
use Session;

class productoController extends Controller
{
    public function altaProducto(){
        date_default_timezone_set('America/Mexico_City');
        $fecha = date("d-m-Y");
        $hora = date("H:i:s");
        $fechaHora = date('d-m-Y H:i:s', time());
        $time = time();
        $usuarioActivo  = Session::get('sesionNombre');
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
                    ->with('idproSig',$idproSig)
                    ->with('hora',$hora)
                    ->with('fechaHora',$fechaHora)
                    ->with('usuarioActivo',$usuarioActivo);
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

    public function eliminaProducto($idPro){
        productos::find($idPro)->delete();
        $proceso = "Desactivar Producto";
        $mensaje = "El producto se ha desactivado correctamente";
        return view('sistema.mensaje')->with('proceso',$proceso)->with('mensaje',$mensaje);
    }

    public function eFisicaProducto($idPro){
        productos::withTrashed()->where('idPro',$idPro)->forceDelete();
        $proceso = "Eliminar Producto";
        $mensaje = "El Producto ha sido borrada correctamente";
        return view('sistema.mensaje')->with('proceso',$proceso)->with('mensaje',$mensaje);
    }

    public function restauraProducto($idPro){
        productos::withTrashed()->where('idPro',$idPro)->restore();
        $proceso = "Restauración de Producto";
        $mensaje = "Registro restaurado correctamente";
        return view('sistema.mensaje')->with('proceso',$proceso)->with('mensaje',$mensaje);
    }

    public function modificaProducto($idPro){
        $productoM      = productos::where('idPro','=',$idPro)->get();
		$idCat         = $productoM[0]->idCat;
		$categ          = categorias::where('idCat','=',$idCat)->get();
        $allCategorias  = categorias::where('idCat','!=',$idCat)->get();
        $idUb           = $productoM[0]->idUb;
        $ubica          = ubicaciones::where('idUb','=',$idUb)->get();
        $allUbicaciones = ubicaciones::where('idUb','!=',$idUb)->get();
        $idPla          = $productoM[0]->idPla;
        $plataf         = plataformas::where('idPla','=',$idPla)->get();
        $allPlataformas = plataformas::where('idPla','!=',$idPla)->get();
        $idMarca        = $productoM[0]->idMarca;
        $mrca           = marcas::where('idMarca','=',$idMarca)->get();
        $allMarcas      = marcas::where('idMarca','!=',$idMarca)->get();
        return view('sistema.productos.editaProducto')->with('productoM',$productoM[0])
                                                      ->with('idCat',$idCat)
                                                      ->with('categ',$categ[0]->categoria)
                                                      ->with('allCategorias',$allCategorias)
                                                      ->with('idUb',$idUb)
                                                      ->with('ubica',$ubica[0]->ubicacion)
                                                      ->with('allUbicaciones',$allUbicaciones)
                                                      ->with('idPla',$idPla)
                                                      ->with('plataf',$plataf[0]->plataforma)
                                                      ->with('allPlataformas',$allPlataformas)
                                                      ->with('idMarca',$idMarca)
                                                      ->with('mrca',$mrca[0]->marca)
                                                      ->with('allMarcas',$allMarcas);
    }

    public function editaProducto(Request $request){
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

        $prod               = productos::find($idPro);
        $prod->idPro        = $request->idPro;
        $prod->codigo       = $request->codigo;
        $prod->producto     = $request->producto;
        $prod->modelo       = $request->modelo;
        $prod->unidad       = $request->unidad;
        $prod->stock        = $request->stock;
        $prod->precio       = $request->precio;
        $prod->iva          = $request->iva;
        $prod->total        = $request->total;
        $prod->idCat        = $request->idCat;
        $prod->idUb         = $request->idUb;
        $prod->idPla        = $request->idPla;
        $prod->idMarca      = $request->idMarca;
        if($file!=''){
            $prod->foto     = $imgfo2;
        }
        $prod->save();

        $proceso = "Modificar Producto";
        $mensaje = "Registro modificado corretamente";
        return view('sistema.mensaje')->with('proceso',$proceso)->with('mensaje',$mensaje);
    }
}
