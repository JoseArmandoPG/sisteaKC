@extends('sistema.principal')
@section('contenido')
    <div class="card">
        <div class="card-body">
            <h4 class="card-title text-primary">Productos</h4>
            <h6 class="card-subtitle">ConKalmhe</h6>
            <div class="table-responsive m-t-40">
                <table  class="table table-hover">
                    <thead style="background-color: rgba(255, 98, 0, 0.45);">
                        <tr>
                            <th>#</th>
                            <th>Codigo</th>
                            <th>Imagen</th>
                            <th>Producto</th>
                            <th>Modelo</th>
                            <th>Unidad</th>
                            <th>Stock</th>
                            <th>Precio</th>
                            <th>Iva</th>
                            <th>Total</th>
                            <th>Categoria</th>
                            <th>Ubicacion</th>
                            <th>Plataforma</th>
                            <th>Marca</th>
                            <th>Operaciones</th>
                            @foreach($productos as $pr)
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{$pr->idPro}}</td>
                            <td>{{$pr->codigo}}</td>
                            <td><img src ="{{asset('archivos/'.$pr->foto)}}" height = 60 width = 60></td>
                            <td>{{$pr->producto}}</td>
                            <td>{{$pr->modelo}}</td>
                            <td>{{$pr->unidad}}</td>
                            <td>{{$pr->stock}}</td>
                            <td>{{$pr->precio}}</td>
                            <td>{{$pr->iva}}</td>
                            <td>{{$pr->total}}</td>
                            <td>{{$pr->categoria}}</td>
                            <td>{{$pr->ubicacion}}</td>
                            <td>{{$pr->plataforma}}</td>
                            <td>{{$pr->marca}}</td>
                            <td>
                                @if($pr->deleted_at =="")
                                    <a href="{{URL::action('productoController@modificaProducto',['idPro'=>$pr->idPro])}}" class="opt">
                                        <i class="fa fa-pencil fa-lg fa-fw" title="modificar"></i>
                                    </a>
                                    <a href="{{URL::action('productoController@eliminaProducto',['idPro'=>$pr->idPro])}}" class="opt">
                                        <i class="fa fa-toggle-on fa-lg fa-fw" title="Inhabilitar"></i>
                                    </a>
                                @else
                                    <a href="{{URL::action('productoController@restauraProducto',['idPro'=>$pr->idPro])}}" class="opt">
                                        <i class="fa fa-toggle-off fa-lg fa-fw" title="Restaurar"></i>
                                    </a>
                                    <a href="{{URL::action('productoController@eFisicaProducto',['idPro'=>$pr->idPro])}}" class="opt">
                                        <i class="fa fa-times fa-lg fa-fw" title='Eliminar'></i>
                                    </a>
                                @endif
                            </td>
                            @endforeach
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop