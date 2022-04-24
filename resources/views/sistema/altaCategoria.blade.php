@extends('sistema.principal')
@section('contenido')
<div class="card">
    <div class="card-body">
        <h4 class="card-title">Alta Categoria</h4>
        <h6 class="card-subtitle">Sistema de Inventario KC</h6>
        <form action="{{route('guardaCategoria')}}" class="form p-t-20" method="POST" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="row">
                <div class="col-lg-6">
                    @if($errors->first('idCat'))
                        <i>{{$errors->first('idCat')}}</i>
                    @endif
                    <div class="form-group">
                        <label for="exampleInputname">Clave Categoria</label>
                        <div class="input-group">
                            <div class="input-group-addon"><i class="ti-key"></i></div>
                            <input type="text" name="idCat" id="idCat" class="form-control" value="{{$idest}}" readonly="readonly">
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    @if($errors->first('categoria'))
                        <i>{{$errors->first('categoria')}}</i>
                    @endif
                    <div class="form-group">
                        <label for="exampleInputname">Categoria</label>
                        <div class="input-group">
                            <div class="input-group-addon"><i class="ti-user"></i></div>
                            <input type="text" name="categoria" id="categoria" class="form-control" value="{{old('categoria')}}">
                        </div>
                    </div>
                </div>
            </div>
            {{-- <button type="submit" class="btn btn-success btn-flat btn-addon m-b-10 m-l-5 waves-effect waves-light m-r-10" value="Guardar"><i class="ti-plus">Guardar</i></button> --}}
            {{-- <button type="reset" class="btn btn-danger btn-flat btn-addon m-b-10 m-l-5 waves-effect waves-light" value="Cancelar"><i class="ti-close"></i>Cancelar</button> --}}
            <button type='submit' class="btn btn-success btn-flat btn-addon m-b-10 m-l-5 waves-effect waves-light m-r-10" Value='Guardar'><i class="ti-plus"></i>Guardar</button>
            <button type="reset" class="btn btn-danger btn-flat btn-addon m-b-10 m-l-5 waves-effect waves-light" value="Cancelar"><i class="ti-close"></i>Cancelar</button>
        </form>
    </div>
</div>
@stop