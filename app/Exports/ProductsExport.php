<?php
    namespace App\Exports;

    use App\productos;
    use App\categorias;
    use App\marcas;
    use App\plataformas;
    use App\ubicaciones;
    use DB;
    use Maatwebsite\Excel\Concerns\FromCollection;
    use Maatwebsite\Excel\Concerns\WithHeadings;

    class ProductsExport implements FromCollection,WithHeadings{
        /**
        * @return \illuminate\Support\Collection 
        */

        public function headings(): array{
            return[
                '#',
                'Codigo',
                'Producto',
                'Modelo',
                'Unidad',
                'Stock',
                'Precio',
                'Importe',
                'IVA',
                'Total',
                'Precio Alterno',
                'Caducidad',
                'Ultimo Movimiento',
                'Status',
                'Color',
                'Medida',
                'Genero',
                'Talla',
                'Linea',
                'Categoria',
                'Ubicacion',
                'Plataforma',
                'Marca',
            ];
        }

        public function collection(){
            /*$productos=\DB::select("SELECT p.idPro,p.codigo,p.producto,p.modelo,p.unidad,p.stock,p.precio,p.importe,p.iva,p.total,p.precioAlterno,p.fCaducidad,p.updated_at,
            p.status,p.color,p.medida,p.genero,p.talla,p.linea,c.categoria AS categoria,u.ubicacion AS ubicacion,pl.plataforma AS plataforma,m.marca AS marca
            FROM productos AS p
            INNER JOIN categorias AS c ON p.idCat = c.idCat
            INNER JOIN ubicaciones AS u ON p.idUb = u.idUb
            INNER JOIN plataformas AS pl ON p.idPla = pl.idPla
            INNER JOIN marcas AS m ON p.idMarca = m.idMarca
            ORDER BY p.idPro DESC")->get();*/

            $productos = DB::table('productos')->select('idPro','codigo','producto','modelo','unidad','stock','precio','importe','iva','total','precioAlterno','fCaducidad',
            'productos.updated_at','status','color','medida','genero','talla','linea','categorias.categoria','ubicaciones.ubicacion','plataformas.plataforma','marcas.marca')
            ->join('categorias',    'productos.idCat',      '=',    'categorias.idCat')
            ->join('ubicaciones',   'productos.idUb',       '=',    'ubicaciones.idUb')
            ->join('plataformas',   'productos.idPla',      '=',    'plataformas.idPla')
            ->join('marcas',        'productos.idMarca',    '=',    'marcas.idMarca')
            ->orderBy('idPro','asc')
            ->get();

            return $productos;
        }
    }
?>