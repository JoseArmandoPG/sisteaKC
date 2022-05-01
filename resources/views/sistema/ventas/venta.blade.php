@extends('sistema.principal')
@section('contenido')
<div class="card">
    <div class="card-body">
        <h4 class="card-title text-primary">Producto</h4>
        <!-- {{$hora}}<br>
        {{$fechaHoraL}} -->
        <!-- {{$usuarioActivo}} -->
        <h6 class="card-subtitle">ConKalmhe</h6>
        <form action="{{route('guardaProducto')}}" class="form p-t-20" method="POST" enctype="multipart/form-data">
            {{csrf_field()}}
            
            <div class="row">
                <div class="col-lg-0">
                    @if($errors->first('idPro'))
                        <i>{{$errors->first('idPro')}}</i>
                    @endif
                    <div class="form-group">
                        <div class="input-group">
                            <input type="hidden" name="idPro" id="idPro" class="form-control" value="{{$idvenSig}}" readonly="readonly">
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    @if($errors->first('codigo'))
                        <i>{{$errors->first('codigo')}}</i>
                    @endif
                    <div class="form-group">
                        <label for="exampleInputname"><b>Codigo</b></label>
                        <div class="input-group">
                            <div class="input-group-addon"><i class="ti-tag"></i></div>
                            <input type="text" name="codigo" id="codigo" class="form-control" value="{{old('codigo')}}">
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    @if($errors->first('descripcion'))
                        <i>{{$errors->first('descripcion')}}</i>
                    @endif
                    <div class="form-group">
                        <label for="exampleInputname"><b>Descripcion</b></label>
                        <div class="input-group">
                            <div class="input-group-addon"><i class="ti-wallet"></i></div>
                            <input type="text" name="descripcion" id="descripcion" class="form-control" value="{{old('descripcion')}}">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    @if($errors->first('uVenta'))
                        <i>{{$errors->first('uVenta')}}</i>
                    @endif
                    <div class="form-group">
                        <label for="exampleInputname"><b>Ultima Venta</b></label>
                        <div class="input-group">
                            <div class="input-group-addon"><i class="ti-tag"></i></div>
                            <input type="text" name="uVenta" id="uVenta" class="form-control" value="{{old('uVenta')}}">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    @if($errors->first('fEntrada'))
                        <i>{{$errors->first('fEntrada')}}</i>
                    @endif
                    <div class="form-group">
                        <label for="exampleInputname"><b>Fecha de Entrada</b></label>
                        <div class="input-group">
                            <div class="input-group-addon"><i class="ti-tag"></i></div>
                            <input type="text" name="fEntrada" id="fEntrada" class="form-control" value="{{old('fEntrada')}}">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    @if($errors->first('modelo'))
                        <i>{{$errors->first('modelo')}}</i>
                    @endif
                    <div class="form-group">
                        <label for="exampleInputname"><b>Modelo</b></label>
                        <div class="input-group">
                            <div class="input-group-addon"><i class="ti-archive"></i></div>
                            <input type="text" name="modelo" id="modelo" class="form-control" value="{{old('modelo')}}">
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    @if($errors->first('color'))
                        <i>{{$errors->first('color')}}</i>
                    @endif
                    <div class="form-group">
                        <label for="exampleInputname"><b>Color</b></label>
                        <div class="input-group">
                            <div class="input-group-addon"><i class="ti-money"></i></div>
                            <input type="text" name="color" id="color" class="form-control" value="{{old('color')}}">
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6">
                    @if($errors->first('stock'))
                        <i>{{$errors->first('stock')}}</i>
                    @endif
                    <div class="form-group">
                        <label for="exampleInputname"><b>Stock</b></label>
                        <div class="input-group">
                            <div class="input-group-addon"><i class="ti-money"></i></div>
                            <input type="text" name="stock" id="stock" class="form-control" value="{{old('stock')}}">
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    @if($errors->first('medida'))
                        <i>{{$errors->first('medida')}}</i>
                    @endif
                    <div class="form-group">
                        <label for="exampleInputname"><b>Medida</b></label>
                        <div class="input-group">
                            <div class="input-group-addon"><i class="ti-money"></i></div>
                            <input type="text" name="medida" id="medida" class="form-control" value="{{old('medida')}}">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    @if($errors->first('genero'))
                        <i>{{$errors->first('genero')}}</i>
                    @endif
                    <div class="form-group">
                        <label for="exampleInputname"><b>Genero</b></label>
                        <div class="input-group">
                            <div class="input-group-addon"><i class="ti-money"></i></div>
                            <input type="text" name="genero" id="genero" class="form-control" value="{{old('genero')}}">
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    @if($errors->first('talla'))
                        <i>{{$errors->first('talla')}}</i>
                    @endif
                    <div class="form-group">
                        <label for="exampleInputname"><b>Talla</b></label>
                        <div class="input-group">
                            <div class="input-group-addon"><i class="ti-money"></i></div>
                            <input type="text" name="talla" id="talla" class="form-control" value="{{old('talla')}}">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6">
                        @if($errors->first('linea'))
                            <i>{{$errors->first('linea')}}</i>
                        @endif
                        <div class="form-group">
                            <label for="exampleInputname"><b>Linea</b></label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="ti-money"></i></div>
                                <input type="text" name="linea" id="linea" class="form-control" value="{{old('linea')}}">
                            </div>
                        </div>
                    </div>
    
                    <div class="col-lg-6">
                        @if($errors->first('status'))
                            <i>{{$errors->first('status')}}</i>
                        @endif
                        <div class="form-group">
                            <label for="exampleInputname"><b>Total</b></label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="ti-money"></i></div>
                                <input type="text" name="status" id="status" class="form-control" value="{{old('status')}}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            
            
            <button type='submit' class="btn btn-success btn-flat btn-addon m-b-10 m-l-5 waves-effect waves-light m-r-10" Value='Guardar'><i class="ti-plus"></i>Guardar</button>
            <button type="reset" class="btn btn-danger btn-flat btn-addon m-b-10 m-l-5 waves-effect waves-light" value="Cancelar"><i class="ti-close"></i>Cancelar</button>
        </form>
    </div>
</div>
<!-- <script src='http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.5/jquery-ui.min.js'></script> -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script type="text/javascript">
    $('#codigo').autocomplete({
        source: function(request, response){
            $.ajax({
                url: "{{ route('autocompleteProduc','ventaController@autocompleteProduc') }}",
                datatype: 'json',
                data: {
                    term: request.term
                },
                success: function(data){
                    response(data)
                }
            });
        },
        select: function(evento, selected) {
        // Actualizar campo oculto
        $('#modelo').val(selected.item.value);
    }
    });
</script>
@stop