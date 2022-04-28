@extends('sistema.principal')
@section('contenido')
    <div class="card">
        <div class="card-body">
            <h4 class="card-title text-primary">Ubicaciones</h4>
            <h6 class="card-subtitle">ConKalmhe</h6>
            <div class="table-responsive m-t-40">
                <table  class="table table-hover">
                    <thead class="table-secondary">
                        <tr>
                            <th>#</th>
                            <th>Ubicacion</th>
                            <th>Operaciones</th>
                            @foreach($ubicaciones as $ub)
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{$ub->idUb}}</td>
                            <td>{{$ub->ubicacion}}</td>
                            <td>
                                @if($ub->deleted_at =="")
                                    <a href="{{URL::action('ubicacionController@modificaUbicacion',['idUb'=>$ub->idUb])}}" class="opt">
                                        <i class="fa fa-pencil fa-lg fa-fw" title="modificar"></i>
                                    </a>
                                    <a href="{{URL::action('ubicacionController@eliminaUbicacion',['idUb'=>$ub->idUb])}}" class="opt">
                                        <i class="fa fa-toggle-on fa-lg fa-fw" title="Inhabilitar"></i>
                                    </a>
                                @else
                                    <a href="{{URL::action('ubicacionController@restauraUbicacion',['idUb'=>$ub->idUb])}}" class="opt">
                                        <i class="fa fa-toggle-off fa-lg fa-fw" title="Restaurar"></i>
                                    </a>
                                    <a href="{{URL::action('ubicacionController@eFisicaUbicacion',['idUb'=>$ub->idUb])}}" class="opt">
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