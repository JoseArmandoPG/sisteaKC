@extends('sistema.principal')
@section('contenido')
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Reporte Usuarios</h4>
            <h6 class="card-subtitle">Conkalmhe</h6>
            <div class="table-responsive m-t-40">
                <table  class="table table-hover">
                    <thead>
                        <tr>
                            <th>Clave</th>
                            <th>Usuario</th>
                            <th>Permisos</th>
                            <th>Nombre</th>
                            <th>Operaciones</th>
                            @foreach($usuarios as $us)
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{$us->idUsu}}</td>
                            <td>{{$us->usuario}}</td>
                            <td>{{$us->permisos}}</td>
                            <td>{{$us->nombre}}</td>
                            <td>
                                @if($us->deleted_at =="")
                                    <a href="{{URL::action('usuarioController@modificaUsuario',['idUsu'=>$us->idUsu])}}" class="opt">
                                        <i class="fa fa-pencil fa-lg fa-fw" title="modificar"></i>
                                    </a>
                                    <a href="{{URL::action('usuarioController@eliminaUsuario',['idUsu'=>$us->idUsu])}}" class="opt">
                                        <i class="fa fa-toggle-on fa-lg fa-fw" title="Inhabilitar"></i>
                                    </a>
                                @else
                                    <a href="{{URL::action('usuarioController@restauraUsuario',['idUsu'=>$us->idUsu])}}" class="opt">
                                        <i class="fa fa-toggle-off fa-lg fa-fw" title="Restaurar"></i>
                                    </a>
                                    <a href="{{URL::action('usuarioController@eFisicaUsuario',['idUsu'=>$us->idUsu])}}" class="opt">
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