@extends('sistema.principal')
@section('contenido')
<div class="card">
    <div class="card-body">
        <h4 class="card-title">Alta Marca</h4>
        <h6 class="card-subtitle">Sistema Conkalmhe</h6>
        <form action="{{route('guardaMarca')}}" class="form p-t-20" method="POST" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="row">
                <div class="col-lg-6">
                    @if($errors->first('idMarca'))
                        <i>{{$errors->first('idMarca')}}</i>
                    @endif
                    <div class="form-group">
                        <label for="exampleInputname">Clave Marca</label>
                        <div class="input-group">
                            <div class="input-group-addon"><i class="ti-key"></i></div>
                            <input type="text" name="idMarca" id="idMarca" class="form-control" value="{{$idmarSig}}" readonly="readonly">
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    @if($errors->first('marca'))
                        <i>{{$errors->first('marca')}}</i>
                    @endif
                    <div class="form-group">
                        <label for="exampleInputname">Marca</label>
                        <div class="input-group">
                            <div class="input-group-addon"><i class="ti-user"></i></div>
                            <input type="text" name="marca" id="marca" class="form-control" value="{{old('marca')}}">
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