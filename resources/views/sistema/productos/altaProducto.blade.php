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
                            <input type="hidden" name="idPro" id="idPro" class="form-control" value="{{$idproSig}}" readonly="readonly">
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
                    @if($errors->first('producto'))
                        <i>{{$errors->first('producto')}}</i>
                    @endif
                    <div class="form-group">
                        <label for="exampleInputname"><b>Producto</b></label>
                        <div class="input-group">
                            <div class="input-group-addon"><i class="ti-wallet"></i></div>
                            <input type="text" name="producto" id="producto" class="form-control" value="{{old('producto')}}">
                        </div>
                    </div>
                </div>
            </div>
            <div id="datos">
                <div class="row">
                    <div class="col-lg-6">
                        @if($errors->first('modelo'))
                            <i>{{$errors->first('modelo')}}</i>
                        @endif
                        <div class="form-group">
                            <label for="exampleInputname"><b>Modelo</b></label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="ti-tag"></i></div>
                                <input type="text" name="modelo" id="modelo" class="form-control" value="{{old('modelo')}}">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        @if($errors->first('unidad'))
                            <i>{{$errors->first('unidad')}}</i>
                        @endif
                        <div class="form-group">
                            <label for="exampleInputuname"><b>Unidad</b></label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="ti-receipt"></i></div>
                                    <Select class="form-control" name='unidad' id="unidad">
                                        <option value="0">Seleccione Unidad</option>
                                        <option value = 'Kilos'>Kilos</option>
                                        <option value = 'Piezas'>Piezas</option>
                                        <option value = 'Litros'>Litros</option>
                                        <option value = 'Juegos'>Juegos</option>
                                        <option value = 'Pares'>Pares</option>
                                    </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        @if($errors->first('stock'))
                            <i>{{$errors->first('stock')}}</i>
                        @endif
                        <div class="form-group">
                            <label for="exampleInputname"><b>Cantidad</b></label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="ti-archive"></i></div>
                                <input type="text" name="stock" id="stock" class="form-control" value="{{old('stock')}}">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        @if($errors->first('precio'))
                            <i>{{$errors->first('precio')}}</i>
                        @endif
                        <div class="form-group">
                            <label for="exampleInputname"><b>Precio</b></label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="ti-money"></i></div>
                                <input type="text" name="precio" id="precio" class="form-control" value="{{old('precio')}}">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        @if($errors->first('importe'))
                            <i>{{$errors->first('importe')}}</i>
                        @endif
                        <div class="form-group">
                            <label for="exampleInputname"><b>Importe</b></label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="ti-money"></i></div>
                                <input type="text" name="importe" id="importe" class="form-control" value="{{old('importe')}}">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        @if($errors->first('iva'))
                            <i>{{$errors->first('iva')}}</i>
                        @endif
                        <div class="form-group">
                            <label for="exampleInputname"><b>IVA</b></label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="ti-money"></i></div>
                                <input type="text" name="iva" id="iva" class="form-control" value="{{old('iva')}}">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        @if($errors->first('total'))
                            <i>{{$errors->first('total')}}</i>
                        @endif
                        <div class="form-group">
                            <label for="exampleInputname"><b>Total</b></label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="ti-money"></i></div>
                                <input type="text" name="total" id="total" class="form-control" value="{{old('total')}}">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        @if($errors->first('precioAlterno'))
                            <i>{{$errors->first('precioAlterno')}}</i>
                        @endif
                        <div class="form-group">
                            <label for="exampleInputname"><b>Precio Alternativo</b></label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="ti-money"></i></div>
                                <input type="text" name="precioAlterno" id="precioAlterno" class="form-control" value="{{old('precioAlterno')}}">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="exampleInputname"><b>Ultimo Movimiento</b></label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="ti-calendar"></i></div>
                                <input type="date" name="uMovimiento" id="uMovimiento" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="exampleInputname"><b>Fecha de Caducidad</b></label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="ti-calendar"></i></div>
                                <input type="date" name="fCaducidad" id="fCaducidad" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        @if($errors->first('color'))
                            <i>{{$errors->first('color')}}</i>
                        @endif
                        <div class="form-group">
                            <label for="exampleInputname"><b>Color</b></label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="ti-pin"></i></div>
                                <input type="text" name="color" id="color" class="form-control" value="{{old('color')}}">
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
                                <div class="input-group-addon"><i class="ti-ruler"></i></div>
                                <input type="text" name="medida" id="medida" class="form-control" value="{{old('medida')}}">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        @if($errors->first('genero'))
                            <i>{{$errors->first('genero')}}</i>
                        @endif
                        <div class="form-group">
                            <label for="exampleInputname"><b>Genero</b></label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="ti-info"></i></div>
                                <input type="text" name="genero" id="genero" class="form-control" value="{{old('genero')}}">
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        @if($errors->first('talla'))
                            <i>{{$errors->first('talla')}}</i>
                        @endif
                        <div class="form-group">
                            <label for="exampleInputname"><b>Talla</b></label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="ti-ruler"></i></div>
                                <input type="text" name="talla" id="talla" class="form-control" value="{{old('talla')}}">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        @if($errors->first('linea'))
                            <i>{{$errors->first('linea')}}</i>
                        @endif
                        <div class="form-group">
                            <label for="exampleInputname"><b>Linea</b></label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="ti-tag"></i></div>
                                <input type="text" name="linea" id="linea" class="form-control" value="{{old('linea')}}">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="exampleInputuname"><b>Status</b></label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="ti-receipt"></i></div>
                                <Select class="form-control" name='status' id="status">
                                    <option value="0">Seleccione Status</option>
                                    <option value = 'Nuevo'>Nuevo</option>
                                    <option value = 'Medio Uso'>Medio Uso</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="exampleInputuname"><b>Categoria</b></label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="ti-tag"></i></div>
                                <Select class="form-control" name='idCat'>
                                    <option value="0">Seleccione Categoria</option>
                                    @foreach($categorias as $ca)
                                        @if($ca->deleted_at!="")
                                        @else
                                            <option value = '{{$ca->idCat}}'>{{$ca->categoria}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="exampleInputuname"><b>Ubicacion</b></label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="ti-home"></i></div>
                                <Select class="form-control" name='idUb'>
                                    <option value="0">Seleccione Ubicacion</option>
                                    @foreach($ubicaciones as $ub)
                                        @if($ub->deleted_at!="")
                                        @else
                                            <option value = '{{$ub->idUb}}'>{{$ub->ubicacion}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="exampleInputuname"><b>Plataforma</b></label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="ti-bag"></i></div>
                                <Select class="form-control" name='idPla'>
                                    <option value="0">Seleccione Plataforma</option>
                                    @foreach($plataformas as $pl)
                                        @if($pl->deleted_at!="")
                                        @else
                                            <option value = '{{$pl->idPla}}'>{{$pl->plataforma}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="exampleInputuname"><b>Marca</b></label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="ti-receipt"></i></div>
                                <Select class="form-control" name='idMarca'>
                                    <option value="0">Seleccione Marca</option>
                                    @foreach($marcas as $ma)
                                        @if($ma->deleted_at!="")
                                        @else
                                            <option value = '{{$ma->idMarca}}'>{{$ma->marca}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        @if($errors->first('foto'))
                            <i>{{$errors->first('foto')}}</i>
                        @endif
                        <div class="form-group">
                            <label for="exampleInputuname"><b>Seleccione imagen del producto</b></label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="ti-cloud-up"></i></div>
                                <input type='file' class="form-control" name='foto'>
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
    $(document).ready(function(){

        $("#stock,#precio").keyup(function(){
            var precio = $("#precio").val();
            var cantidad = $("#stock").val();
            $("#importe").val((parseInt(cantidad)) * parseInt(precio));
            var importe = $("#importe").val();
            var iva=parseFloat((parseInt(importe))*.16).toFixed(2);
            $("#iva").val(iva);
            var total = parseFloat((parseInt(importe) + parseInt(iva)));
            $("#total").val(total);
        });

        // $("#codigo").keyup(function() {
        //     $("#datos").load('{{url('datos')}}' + '?codigo=' + $("#codigo").val());
        // });
    }); 
</script>
@stop