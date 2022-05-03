@extends('sistema.principal')
@section('contenido')
    <div class="card">
        <div class="card-body">
            <h4 class="card-title text-primary">Plataformas</h4>
            <h6 class="card-subtitle">Conkalmhe</h6>
            <div class="table-responsive m-t-40">
                <table  class="table table-hover">
                    <thead style="background-color: rgba(255, 98, 0, 0.45);">
                        <tr>
                            <th><b>#</b></th>
                            <th><b>Plataforma</b></th>
                            <th><b>Operaciones</b></th>
                            @foreach($plataformas as $pl)
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{$pl->idPla}}</td>
                            <td>{{$pl->plataforma}}</td>
                            <td>
                                @if($pl->deleted_at =="")
                                    <a href="{{URL::action('plataformaController@modificaPlataforma',['idPla'=>$pl->idPla])}}" class="opt">
                                        <i class="fa fa-pencil fa-lg fa-fw" title="modificar"></i>
                                    </a>
                                    <a href="{{URL::action('plataformaController@eliminaPlataforma',['idPla'=>$pl->idPla])}}" class="opt">
                                        <i class="fa fa-toggle-on fa-lg fa-fw" title="Inhabilitar"></i>
                                    </a>
                                @else
                                    <a href="{{URL::action('plataformaController@restauraPlataforma',['idPla'=>$pl->idPla])}}" class="opt">
                                        <i class="fa fa-toggle-off fa-lg fa-fw" title="Restaurar"></i>
                                    </a>
                                    <a href="{{URL::action('plataformaController@eFisicaPlataforma',['idPla'=>$pl->idPla])}}" class="opt">
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