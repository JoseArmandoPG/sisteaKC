@extends('sistema.principal')
@section('contenido')
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Reporte Categorias</h4>
            <h6 class="card-subtitle">Conkalmhe</h6>
            <div class="table-responsive m-t-40">
                <table  class="table table-hover">
                    <thead>
                        <tr>
                            <th>Clave</th>
                            <th>Categoria</th>
                            <th>Operaciones</th>
                            @foreach($categorias as $ca)
                        </tr>
                    </thead>
                    <tbody>
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
@stop