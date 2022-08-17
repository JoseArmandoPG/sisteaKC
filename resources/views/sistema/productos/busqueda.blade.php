@extends('sistema.principal')
@section('contenido')
<div class="card">
    <div class="card-body">
        <h4 class="card-title text-primary">Producto</h4>
        <h6 class="card-subtitle">ConKalmhe</h6>
        <form action="{{route('busqueda')}}" class="form p-t-20" method="GET" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="row">
                <div class="col-lg-12">
                    @if($errors->first('codigo'))
                        <i>{{$errors->first('codigo')}}</i>
                    @endif
                    <div class="form-group">
                        <label for="exampleInputname"><b>Busca Producto con codigo</b></label>
                        <div class="input-group">
                            <div class="input-group-addon"><i class="ti-search"></i></div>
                            <input type="text" name="codigo" id="codigo" class="form-control" value="{{old('codigo')}}">
                        </div>
                    </div>
                </div>
            </div>
            <button type='submit' class="btn btn-success btn-flat btn-addon m-b-10 m-l-5 waves-effect waves-light m-r-10" Value='Guardar'><i class="ti-search"></i> Buscar</button>
        </form>
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
                            <th><b>Condicion</b></th>
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
                            @if($pr->codigo !="")
                            <td>{{$pr->idPro}}</td>
                            <td>{{$pr->codigo}}</td>
                            <td>{{$pr->producto}}</td>
                            <td>{{$pr->categoria}}</td>
                            <td>{{$pr->marca}}</td>
                            <td>{{$pr->modelo}}</td>
                            <td>{{$pr->ubicacion}}</td>
                            <td>{{$pr->plataforma}}</td>
                            <td>{{$pr->stock}}</td>
                            
                            <!-- <td>
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
                            </td> -->
                            @else
                            <p>El Producto no Existe</p>
                            @endif
                            @endforeach
                        </tr>
                    </tbody>
                </table>
            </div>
    </div>
</div>
<!-- <script src='http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.5/jquery-ui.min.js'></script> -->

<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.1/jquery-ui.js"></script>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.1/themes/base/jquery-ui.css" />
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $("#codigo").focusout(function(){
            $("#detalleFechas").load('{{url('detalleFechas')}}' + '?codigo=' + $("#codigo").val());
            //console.log(idCat);
        });
    });
</script>
@stop