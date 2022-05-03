@extends('sistema.principal')
@section('contenido')
    <div class="card">
        <div class="card-body">
            <h4 class="card-title text-primary">Ventas</h4>
            <h6 class="card-subtitle">ConKalmhe</h6>
            <div class="table-responsive m-t-40">
                <table  class="table table-hover">
                    <thead style="background-color: rgba(255, 98, 0, 0.45);">
                        <tr>
                            <th><b>Usuario</b></th>
                            <th><b>Fecha</b></th>
                            <th><b>Producto</b></th>
                            <th><b>Descripcion</b></th>
                            <th><b>Codigo</b></th>
                            <th><b>Modelo</b></th>
                            <th><b>Status</b></th>
                            <th><b>Stock</b></th>
                            <th><b>Ultima Venta</b></th>
                            <th><b>Fecha de Entrada</b></th>
                            <th><b>Precio</b></th>
                            <th><b>Iva</b></th>
                            <th><b>Precio + Iva</b></th>
                            <th><b>Color</b></th>
                            <th><b>Medida</b></th>
                            <th><b>Genero</b></th>
                            <th><b>Talla</b></th>
                            <th><b>Linea</b></th>
                            <th><b>Foto</b></th>
                            <th><b>Operaciones</b></th>
                            @foreach($historicos as $his)
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{$his->nombre}}</td>
                            <td>{{$his->fechaHora}}</td>
                            <td>{{$his->producto}}</td>
                            <td>{{$his->descripcion}}</td>
                            <td>{{$his->codigo}}</td>
                            <td>{{$his->modelo}}</td>
                            <td>{{$his->status}}</td>
                            <td>{{$his->stock}}</td>
                            <td>{{$his->ultimaVenta}}</td>
                            <td>{{$his->fechaEntrada}}</td>
                            <td>{{$his->precio}}</td>
                            <td>{{$his->iva}}</td>
                            <td>{{$his->total}}</td>
                            <td>{{$his->color}}</td>
                            <td>{{$his->medida}}</td>
                            <td>{{$his->genero}}</td>
                            <td>{{$his->talla}}</td>
                            <td>{{$his->linea}}</td>
                            <td><img src ="{{asset('archivos/'.$his->foto)}}" height = 60 width = 60></td>
                            <td>
                                @if($his->deleted_at =="")
                                    <a href="#" class="opt">
                                        <i class="fa fa-pencil fa-lg fa-fw" title="modificar"></i>
                                    </a>
                                    <a href="#" class="opt">
                                        <i class="fa fa-toggle-on fa-lg fa-fw" title="Inhabilitar"></i>
                                    </a>
                                @else
                                    <a href="#" class="opt">
                                        <i class="fa fa-toggle-off fa-lg fa-fw" title="Restaurar"></i>
                                    </a>
                                    <a href="#" class="opt">
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