@extends('sistema.principal')
@section('contenido')
    <div class="card">
        <div class="card-body">
            <h4 class="card-title text-primary">Productos</h4>
            <h6 class="card-subtitle">ConKalmhe</h6>
            <!-- {{$mes}} -->
            <div class="input-group input-group-sm mb-3">
                <input id="entradafilter" type="text" class="form-control">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-sm"><b>Filtro &nbsp;<i class="ti-filter"></i></b></span>
                </div>
            </div>
            <div class="table-responsive m-t-40">
                <table  class="table table-hover">
                    <thead style="background-color: rgba(255, 98, 0, 0.45);">
                        <tr>
                            <th><b>#</b></th>
                            <th><b>Codigo</b></th>
                            <!-- <th><b>Imagen</b></th> -->
                            <th><b>Producto</b></th>
                            <th><b>Categoria</b></th>
                            <th><b>Marca</b></th>
                            <th><b>Modelo</b></th>
                            <th><b>Ubicacion</b></th>
                            <th><b>Plataforma</b></th>
                            <th><b>Stock</b></th>
                            <th><b>Ultimo Movimiento</b></th>
                            <th><b>Caducidad</b></th>
                            <!-- <th><b>Unidad</b></th>-->
                            <!-- <th><b>Status</b></th>
                            <th><b>Precio</b></th>
                            <th><b>Iva</b></th>
                            <th><b>Total</b></th> -->
                            <th><b>Operaciones</b></th>
                            @foreach($productos as $pr)
                        </tr>
                    </thead>
                    <tbody class="contenidobusqueda">
                        <tr>
                            <td>{{$pr->idPro}}</td>
                            <td>{{$pr->codigo}}</td>
                            <td>{{$pr->producto}}</td>
                            <td>{{$pr->categoria}}</td>
                            <td>{{$pr->marca}}</td>
                            <td>{{$pr->modelo}}</td>
                            <td>{{$pr->ubicacion}}</td>
                            <td>{{$pr->plataforma}}</td>
                            <td>{{$pr->stock}}</td>
                            @php
                                $campo = $pr->updated_at;
                                $date = date_create($campo);
                                $fecha = date_format($date, 'd-m-Y');
                                $dif = $mes - $pr->mes;


                                if($dif <= 2)
                                    echo "<td><b class='bg-success' style='color:#000000;'>$fecha </b></td>";
                                elseif($dif > 2 && $dif <= 3)
                                    echo "<td><b class='bg-warning' style='color:#000000;'>$fecha </b></td>";
                                elseif($dif > 3)
                                    echo "<td><b class='bg-danger' style='color: #000000;'>$fecha </b></td>";

                            @endphp

                            @php
                                $campo2 = $pr->fCaducidad;
                                $date2 = date_create($campo2);
                                $fecha2 = date_format($date2, 'd-m-Y');
                                $difCad = $pr->mesCad - $mes;
                                
                                if($pr->fCaducidad == "" || $pr->fCaducidad == '0000-00-00'){
                                    echo "<td>Sin Caducidad</td>";
                                }else{
                                    if($mes == $pr->mesCad){
                                        echo "<td><b class='bg-danger' style='color: #000000;'>$fecha2 </b></td>";
                                    }elseif($difCad > 1 && $difCad < 5){
                                        echo "<td><b class='bg-warning' style='color: #000000;'>$fecha2</b></td>";
                                    }elseif($difCad > 5){
                                        echo "<td><b class='bg-success' style='color: #000000;'>$fecha2</b></td>";
                                    }
                                }

                            @endphp
                            <!-- <td><img src ="{{asset('archivos/'.$pr->foto)}}" height = 60 width = 60></td> -->
                            <!-- <td>{{$pr->unidad}}</td> -->
                            <!-- <td>{{$pr->status}}</td>
                            <td>{{$pr->precio}}</td>
                            <td>{{$pr->iva}}</td>
                            <td>{{$pr->total}}</td> -->
                            <td>
                                <a href="#seeProducto{{$pr->idPro}}" data-toggle="modal" title="Visualizar">
                                    <i class="fa fa-eye fa-lg fa-fw" title="Inhabilitar"></i>
                                </a>
                                @include('sistema.productos.seeProducto')
                                @if($pr->deleted_at =="")
                                    
                                    <a href="{{URL::action('productoController@modificaProducto',['idPro'=>$pr->idPro])}} " class="opt">
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
    
    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <script src="http://code.jquery.com/ui/1.10.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.1/themes/base/jquery-ui.css" />
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script type="text/javascript">
        $('#entradafilter').keyup(function () {
            var rex = new RegExp($(this).val(), 'i');
            $('.contenidobusqueda tr').hide();
            $('.contenidobusqueda tr').filter(function () {
                    return rex.test($(this).text());
            }).show();
        })
    </script>
@stop