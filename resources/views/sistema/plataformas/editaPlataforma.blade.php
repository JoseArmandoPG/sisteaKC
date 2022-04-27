@extends('sistema.principal')
@section('contenido')
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Modifica Plataforma</h4>
            <h6 class="card-subtitle">Conkalmhe</h6>
            <form action="{{route('editaPlataforma')}}" class="form p-t-20" method="post" enctype='multipart/form-data'>
                {{csrf_field()}}
                <div class="row">
                    <div class="col-lg-6">
                        @if($errors->first('idPla'))
                            <i>{{$errors->first('idPla')}}</i>
                        @endif
                        <div class="form-group">
                            <label for="exampleInputname">Clave Plataforma</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="ti-key"></i></div>
                                <input type="text" name="idPla" id="idPla" class="form-control" value="{{$plataformaM->idPla}}" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        @if($errors->first('plataforma'))
                            <i>{{$errors->first('plataforma')}}</i>
                        @endif
                        <div class="form-group">
                            <label for="exampleInputname">Plataforma</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="ti-user"></i></div>
                                <input type="text" class="form-control" name="plataforma" id="plataforma" value="{{$plataformaM->plataforma}}">
                            </div>
                        </div>
                    </div>
                </div>
                <button type='submit' class="btn btn-success  btn-flat btn-addon m-b-10 m-l-5 waves-effect waves-light m-r-10" Value='Guardar'><i class="ti-plus"></i>Guardar</button>
                <button type="reset" class="btn btn-danger btn-flat btn-addon m-b-10 m-l-5 waves-effect waves-light" value="Cancelar"><i class="ti-close"></i>Cancelar</button> 
            </form>
        </div>
    </div>
@stop