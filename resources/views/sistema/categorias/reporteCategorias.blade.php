@extends('sistema.principal')
@section('contenido')
    <div class="card">
        <div class="card-body">
            <h4 class="card-title text-primary">Categorias</h4>
            <h6 class="card-subtitle">ConKalmhe</h6>
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
                            <th><b>Categoria</b></th>
                            <th><b>Operaciones</b></th>
                            @foreach($categorias as $ca)
                        </tr>
                    </thead>
                    <tbody class="contenidobusqueda">
                        <tr>
                            <td>{{$ca->idCat}}</td>
                            <td>{{$ca->categoria}}</td>
                            <td>
                                @if($ca->deleted_at =="")
                                    <a href="{{URL::action('categoriaController@modificaCategoria',['idCat'=>$ca->idCat])}}" class="opt">
                                        <i class="fa fa-pencil fa-lg fa-fw" title="modificar"></i>
                                    </a>
                                    <a href="{{URL::action('categoriaController@eliminaCategoria',['idCat'=>$ca->idCat])}}" class="opt">
                                        <i class="fa fa-toggle-on fa-lg fa-fw" title="Inhabilitar"></i>
                                    </a>
                                @else
                                    <a href="{{URL::action('categoriaController@restauraCategoria',['idCat'=>$ca->idCat])}}" class="opt">
                                        <i class="fa fa-toggle-off fa-lg fa-fw" title="Restaurar"></i>
                                    </a>
                                    <a href="{{URL::action('categoriaController@eFisicaCategoria',['idCat'=>$ca->idCat])}}" class="opt">
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