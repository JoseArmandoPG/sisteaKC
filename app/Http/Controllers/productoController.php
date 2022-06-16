<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\productos;
use App\categorias;
use App\ubicaciones;
use App\plataformas;
use App\marcas;
use App\bitacoras;
use App\DB;
use Session;

class productoController extends Controller
{
    public function altaProducto(){
        date_default_timezone_set('America/Mexico_City');
        $fecha = date("d-m-Y");
        $hora = date("H:i:s");
        $fechaHoraL = date('d-m-Y H:i:s', time());
        $time = time();
        $usuarioActivo  = Session::get('sesionNombre');
        $userID         = Session::get('sesionidUsu');
        $categorias     = categorias::OrderBy('categoria','deleted_at','asc')->get();
        $ubicaciones    = ubicaciones::OrderBy('ubicacion','deleted_at','asc')->get();
        $plataformas    = plataformas::OrderBy('plataforma','deleted_at','asc')->get();
        $marcas         = marcas::OrderBy('marca','deleted_at','asc')->get();
        $clavesig       = productos::orderBy('idPro','producto')->take(1)->get();
		$idproSig       = $clavesig[0]->idPro+1;
        //$sigBita        = bitacoras::orderBy('idBP')->take(1)->get();
        //$idBitSig       = $sigBita[0]->idBP+1;
		return view ('sistema.productos.altaProducto')
                    ->with('categorias',$categorias)
                    ->with('ubicaciones',$ubicaciones)
                    ->with('plataformas',$plataformas)
                    ->with('marcas',$marcas)
                    ->with('idproSig',$idproSig)
                    ->with('hora',$hora)
                    ->with('fechaHoraL',$fechaHoraL)
                    ->with('usuarioActivo',$usuarioActivo)
                    ->with('userID',$userID);
    }

    public function guardaProducto(Request $request){
        date_default_timezone_set('America/Mexico_City');
        $fechaHoraL = date('Y-m-d H:i:s', time());
        $userID         = Session::get('sesionidUsu');
        //$sigBita        = bitacoras::orderBy('idBP','tipo')->take(1)->get();
		//$idBPSig        = $sigBita[0]->idBP+1;


        $idPro          = $request->idPro;
        $codigo         = $request->codigo;
        $producto       = $request->producto;
        $modelo         = $request->modelo;
        $unidad         = $request->unidad;
        $stock          = $request->stock;
        $cantidad       = $request->stock;
        $precio         = $request->precio;
        $importe        = $request->importe;
        $iva            = $request->iva;
        $total          = $request->total;
        $precioAlterno  = $request->precioAlterno;
        $status         = $request->status;
        $color          = $request->color;
        $medida         = $request->medida;
        $genero         = $request->genero;
        $talla          = $request->talla;
        $linea          = $request->linea;
        $fCaducidad     = $request->fCaducidad;
        $uMovimiento    = $request->uMovimiento;

        $this->validate($request,[
			'idPro'		=>'required|numeric',
            'codigo'	=>'required|string',
            'producto'	=>'required|string',
            'modelo'	=>'required|string',
            'unidad'	=>'required|regex:/^[A-Z,a-z, ,ñ,á,é,í,ó,ú]+$/',
            'status'	=>'required|regex:/^[A-Z,a-z, ,ñ,á,é,í,ó,ú]+$/',
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

        if($uMovimiento == ""){
            $ultimoMov = $fechaHoraL;
        }else{
            $ultimoMov = $uMovimiento;
        }

        $prod                   = new productos;
        //$prod->idPro            = $request->idPro;
        $prod->codigo           = $request->codigo;
        $prod->producto         = $request->producto;
        $prod->modelo           = $request->modelo;
        $prod->unidad           = $request->unidad;
        $prod->stock            = $request->stock;
        $prod->cantidad         = $request->stock;
        $prod->precio           = $request->precio;
        $prod->importe          = $request->importe;
        $prod->iva              = $request->iva;
        $prod->total            = $request->total;
        $prod->precioAlterno    = $request->precioAlterno;
        $prod->tipo             = 1;
        $prod->status           = $request->status;
        $prod->color            = $request->color;
        $prod->medida           = $request->medida;
        $prod->genero           = $request->genero;
        $prod->talla            = $request->talla;
        $prod->linea            = $request->linea;
        $prod->fCaducidad       = $request->fCaducidad;
        $prod->idCat            = $request->idCat;
        $prod->idUb             = $request->idUb;
        $prod->idPla            = $request->idPla;
        $prod->idMarca          = $request->idMarca;
        $prod->foto             = $imgfo2;
        $prod->updated_at       = $ultimoMov;
        $prod->save();

        $bPro               = new bitacoras;
        //$bPro->idBP         = $idBPSig+1;
        $bPro->fechaHora    = $fechaHoraL;
        $bPro->tipo         = 1;
        $bPro->idPro        = $request->idPro;
        $bPro->idUSu        = $userID;
        $bPro->save();

        $proceso = "Alta Producto";
        $mensaje = "Registro guardado correctamente";
        return view('sistema.mensaje')->with('proceso',$proceso)->with('mensaje',$mensaje);
    }

    /*public function prueba(){
		return view ('sistema.productos.prueba');
    }*/

    public function reporteProducto(){
        $productos=\DB::select("SELECT p.idPro,p.codigo,p.producto,p.modelo,p.unidad,p.stock,p.precio,p.importe,p.iva,p.total,p.precioAlterno,p.fCaducidad,p.status,p.color,p.medida,
        p.genero,p.talla,p.linea,p.foto,c.categoria AS categoria,u.ubicacion AS ubicacion,pl.plataforma AS plataforma,m.marca AS marca,p.deleted_at, 
        EXTRACT(MONTH FROM p.updated_at) AS mes,p.updated_at
        FROM productos AS p
        INNER JOIN categorias AS c ON p.idCat = c.idCat
        INNER JOIN ubicaciones AS u ON p.idUb = u.idUb
        INNER JOIN plataformas AS pl ON p.idPla = pl.idPla
        INNER JOIN marcas AS m ON p.idMarca = m.idMarca
        ORDER BY p.idPro ASC");
        
        /** FECHA**/
        date_default_timezone_set('America/Mexico_City');
        $fecha = date("d-m-Y");
        $fechaHoy = date("Y-m-d");
        $hora = date("H:i:s");
        $fechaHoraL = date('d-m-Y H:i:s', time());

        $mes = date("m", strtotime($fecha));
        return view('sistema.productos.reporteProductos')->with('productos',$productos)->with('mes',$mes)->with('fechaHoy',$fechaHoy);
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
        $idPro          = $request->idPro;
        $codigo         = $request->codigo;
        $producto       = $request->producto;
        $modelo         = $request->modelo;
        $unidad         = $request->unidad;
        $stock          = $request->stock;
        $precio         = $request->precio;
        $importe        = $request->importe;
        $iva            = $request->iva;
        $total          = $request->total;
        $precioAlterno  = $request->precioAlterno;
        $status         = $request->status;
        $color          = $request->color;
        $medida         = $request->medida;
        $genero         = $request->genero;
        $talla          = $request->talla;
        $linea          = $request->linea;
        $uMovimiento    = $request->uMovimiento;
        $fCaducidad     = $request->fCaducidad;

        $this->validate($request,[
            'idPro'		=>'required|numeric',
            'codigo'	=>'required|string',
            'producto'	=>'required|regex:/^[A-Z,a-z, ,ñ,á,é,í,ó,ú]+$/',
            'modelo'	=>'required|string',
            'unidad'	=>'required|regex:/^[A-Z,a-z, ,ñ,á,é,í,ó,ú]+$/',
            'status'	=>'required|regex:/^[A-Z,a-z, ,ñ,á,é,í,ó,ú]+$/',
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

        $prod                   = productos::find($idPro);
        $prod->idPro            = $request->idPro;
        $prod->codigo           = $request->codigo;
        $prod->producto         = $request->producto;
        $prod->modelo           = $request->modelo;
        $prod->unidad           = $request->unidad;
        $prod->stock            = $request->stock;
        $prod->precio           = $request->precio;
        $prod->importe          = $request->importe;
        $prod->iva              = $request->iva;
        $prod->total            = $request->total;
        $prod->precioAlterno    = $request->precioAlterno;
        $prod->status           = $request->status;
        $prod->color            = $request->color;
        $prod->medida           = $request->medida;
        $prod->genero           = $request->genero;
        $prod->talla            = $request->talla;
        $prod->linea            = $request->linea;
        $prod->updated_at       = $request->uMovimiento;
        $prod->fCaducidad       = $request->fCaducidad;
        $prod->idCat            = $request->idCat;
        $prod->idUb             = $request->idUb;
        $prod->idPla            = $request->idPla;
        $prod->idMarca          = $request->idMarca;
        if($file!=''){
            $prod->foto         = $imgfo2;
        }
        $prod->save();

        $proceso = "Modificar Producto";
        $mensaje = "Registro modificado corretamente";
        return view('sistema.mensaje')->with('proceso',$proceso)->with('mensaje',$mensaje);
    }

    public function detalleProd(Request $request){
        $idCat = $request->get('idCat');
        $productos = productos::where('idCat','=',$idCat)->get();
        return view('sistema.ventas.detalleProd')->with('productos',$productos);
    }

    public function productoDetalle(Request $request){
        $codigo = $request->get('codigo');
        $productos =\DB::select("SELECT p.idPro,p.codigo,p.producto,p.modelo,p.unidad,p.stock,p.precio,p.iva,p.total,p.status,p.color,p.medida,p.genero,p.talla,p.linea,
        p.foto,c.categoria as categoria,u.ubicacion AS ubicacion,pl.plataforma as plataforma,m.marca as marca,p.deleted_at
        FROM productos AS p
        INNER JOIN categorias AS c ON p.idCat = c.idCat
        INNER JOIN ubicaciones AS u ON p.idUb = u.idUb
        INNER JOIN plataformas AS pl ON p.idPla = pl.idPla
        INNER JOIN marcas AS m ON p.idMarca = m.idMarca
        WHERE p.codigo = '$codigo'");
        return view('sistema.ventas.productoDetalle')->with('productos',$productos);
    }

    public function seeProducto($idPro){
        $productos=\DB::select("SELECT p.idPro,p.codigo,p.producto,p.modelo,p.unidad,p.stock,p.precio,p.importe,p.iva,p.total,p.precioAlterno,p.fCaducidad,p.status,p.color,p.medida,
        p.genero,p.talla,p.linea,p.foto,c.categoria as categoria,u.ubicacion AS ubicacion,pl.plataforma as plataforma,m.marca as marca,p.deleted_at,p.updated_at
        FROM productos AS p
        INNER JOIN categorias AS c ON p.idCat = c.idCat
        INNER JOIN ubicaciones AS u ON p.idUb = u.idUb
        INNER JOIN plataformas AS pl ON p.idPla = pl.idPla
        INNER JOIN marcas AS m ON p.idMarca = m.idMarca
        WHERE p.idPro = $idPro");
        return view('sistema.productos.reporteProductos')->with('productos',$productos);
    }

    public function datos(Request $request){
        $codigo = $request->get('codigo');
        $productos = productos::where('codigo','=',$codigo)->get();
        return view('sistema.productos.datos')->with('productos',$productos);
    }

    public function busqueda(Request $request){
        $codigo = $request->get('codigo');
        if(isset($codigo)){
            $productos=\DB::select("SELECT p.idPro,p.codigo,p.producto,p.modelo,p.unidad,p.stock,p.precio,p.iva,p.total,p.status,p.foto,c.categoria as categoria,u.ubicacion AS ubicacion,
            pl.plataforma as plataforma,m.marca as marca,p.deleted_at
            FROM productos AS p
            INNER JOIN categorias AS c ON p.idCat = c.idCat
            INNER JOIN ubicaciones AS u ON p.idUb = u.idUb
            INNER JOIN plataformas AS pl ON p.idPla = pl.idPla
            INNER JOIN marcas AS m ON p.idMarca = m.idMarca
            WHERE p.codigo LIKE '%$codigo%'");
        }else{
            $productos=\DB::select("SELECT p.idPro,p.codigo,p.producto,p.modelo,p.unidad,p.stock,p.precio,p.iva,p.total,p.status,p.foto,c.categoria as categoria,u.ubicacion AS ubicacion,
            pl.plataforma as plataforma,m.marca as marca,p.deleted_at
            FROM productos AS p
            INNER JOIN categorias AS c ON p.idCat = c.idCat
            INNER JOIN ubicaciones AS u ON p.idUb = u.idUb
            INNER JOIN plataformas AS pl ON p.idPla = pl.idPla
            INNER JOIN marcas AS m ON p.idMarca = m.idMarca
            WHERE p.codigo LIKE '%%'");
        }
		return view ('sistema.productos.busqueda')->with('productos',$productos);
    }
}
