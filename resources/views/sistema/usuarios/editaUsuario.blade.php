@extends('sistema.principal')
@section('contenido')
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Modifica Usuario</h4>
            <h6 class="card-subtitle">Conkalmhe</h6>
            <form action="{{route('editaUsuario')}}" class="form p-t-20" method="post" enctype='multipart/form-data'>
                {{csrf_field()}}
                <div class="row">
                    <div class="col-lg-6">
                        @if($errors->first('idUsu'))
                            <i>{{$errors->first('idUsu')}}</i>
                        @endif
                        <div class="form-group">
                            <label for="exampleInputname">Clave Usuario</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="ti-key"></i></div>
                                <input type="text" name="idUsu" id="idUsu" class="form-control" value="{{$usuarioM->idUsu}}" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        @if($errors->first('nombre'))
                            <i>{{$errors->first('nombre')}}</i>
                        @endif
                        <div class="form-group">
                            <label for="exampleInputname">Nombre</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="ti-user"></i></div>
                                <input type="text" class="form-control" name="nombre" id="nombre" value="{{$usuarioM->nombre}}">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        @if($errors->first('usuario'))
                            <i>{{$errors->first('usuario')}}</i>
                        @endif
                        <div class="form-group">
                            <label for="exampleInputname">Usuario</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="ti-user"></i></div>
                                <input type="text" class="form-control" name="usuario" id="usuario" value="{{$usuarioM->usuario}}">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        @if($errors->first('password'))
                            <i>{{$errors->first('password')}}</i>
                        @endif
                        <div class="form-group">
                            <label for="exampleInputname">Password</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="ti-user"></i></div>
                                <input type="password" class="form-control" name="password" id="password" value="{{$usuarioM->password}}">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        @if($errors->first('permisos'))
                            <i>{{$errors->first('permisos')}}</i>
                        @endif
                        <div class="form-group">
                            <label for="exampleInputname">Permisos</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="ti-user"></i></div>
                                <input type="text" class="form-control" name="permisos" id="nombre" value="{{$usuarioM->permisos}}">
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