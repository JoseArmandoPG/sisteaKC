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
                    @if($errors->first('idPro'))
                        <i>{{$errors->first('idPro')}}</i>
                    @endif
                    <div class="form-group">
                        <label for="exampleInputname">Clave Producto</label>
                        <div class="input-group">
                            <div class="input-group-addon"><i class="ti-key"></i></div>
                            <input type="text" name="idPro" id="idPro" class="form-control" value="{{$idproSig}}" readonly="readonly">
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    @if($errors->first('codigo'))
                        <i>{{$errors->first('codigo')}}</i>
                    @endif
                    <div class="form-group">
                        <label for="exampleInputname">Codigo</label>
                        <div class="input-group">
                            <div class="input-group-addon"><i class="ti-user"></i></div>
                            <input type="text" name="codigo" id="codigo" class="form-control" value="{{old('codigo')}}">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    @if($errors->first('producto'))
                        <i>{{$errors->first('producto')}}</i>
                    @endif
                    <div class="form-group">
                        <label for="exampleInputname">Producto</label>
                        <div class="input-group">
                            <div class="input-group-addon"><i class="ti-user"></i></div>
                            <input type="text" name="producto" id="producto" class="form-control" value="{{old('producto')}}">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    @if($errors->first('modelo'))
                        <i>{{$errors->first('modelo')}}</i>
                    @endif
                    <div class="form-group">
                        <label for="exampleInputname">Modelo</label>
                        <div class="input-group">
                            <div class="input-group-addon"><i class="ti-key"></i></div>
                            <input type="text" name="modelo" id="modelo" class="form-control" value="{{old('modelo')}}">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    @if($errors->first('unidad'))
                        <i>{{$errors->first('unidad')}}</i>
                    @endif
                    <div class="form-group">
                        <label for="exampleInputname">Unidad</label>
                        <div class="input-group">
                            <div class="input-group-addon"><i class="ti-user"></i></div>
                            <input type="text" name="unidad" id="unidad" class="form-control" value="{{old('unidad')}}">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    @if($errors->first('stock'))
                        <i>{{$errors->first('stock')}}</i>
                    @endif
                    <div class="form-group">
                        <label for="exampleInputname">Stock</label>
                        <div class="input-group">
                            <div class="input-group-addon"><i class="ti-user"></i></div>
                            <input type="text" name="stock" id="stock" class="form-control" value="{{old('stock')}}">
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6">
                    @if($errors->first('precio'))
                        <i>{{$errors->first('precio')}}</i>
                    @endif
                    <div class="form-group">
                        <label for="exampleInputname">Precio</label>
                        <div class="input-group">
                            <div class="input-group-addon"><i class="ti-key"></i></div>
                            <input type="text" name="precio" id="precio" class="form-control" value="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    @if($errors->first('iva'))
                        <i>{{$errors->first('iva')}}</i>
                    @endif
                    <div class="form-group">
                        <label for="exampleInputname">IVA</label>
                        <div class="input-group">
                            <div class="input-group-addon"><i class="ti-user"></i></div>
                            <input type="text" name="iva" id="iva" class="form-control" value="">
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6">
                    @if($errors->first('total'))
                        <i>{{$errors->first('total')}}</i>
                    @endif
                    <div class="form-group">
                        <label for="exampleInputname">Total</label>
                        <div class="input-group">
                            <div class="input-group-addon"><i class="ti-user"></i></div>
                            <input type="text" name="total" id="total" class="form-control" value="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    @if($errors->first('foto'))
                        <i>{{$errors->first('foto')}}</i>
                    @endif
                    <div class="form-group">
                        <label for="exampleInputuname">Seleccione imagen del producto</label>
                        <div class="input-group">
                            <div class="input-group-addon"><i class="ti-cloud-up"></i></div>
                            <input type='file' class="form-control" name='foto'>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3">
                    <div class="form-group">
                        <label for="exampleInputuname">Categoria</label>
                        <div class="input-group">
                            <div class="input-group-addon"><i class="ti-location-pin"></i></div>
                                <Select class="form-control" name='idCat'>
                                    <option value="0">Seleccione Categoria</option>
                                    @foreach($categorias as $ca)
                                        <option value = '{{$ca->idCat}}'>{{$ca->categoria}}</option>
                                    @endforeach
                                </select>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-group">
                        <label for="exampleInputuname">Ubicacion</label>
                        <div class="input-group">
                            <div class="input-group-addon"><i class="ti-location-pin"></i></div>
                                <Select class="form-control" name='idUb'>
                                    <option value="0">Seleccione Ubicacion</option>
                                    @foreach($ubicaciones as $ub)
                                        <option value = '{{$ub->idUb}}'>{{$ub->ubicacion}}</option>
                                    @endforeach
                                </select>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-group">
                        <label for="exampleInputuname">Plataforma</label>
                        <div class="input-group">
                            <div class="input-group-addon"><i class="ti-location-pin"></i></div>
                                <Select class="form-control" name='idPla'>
                                    <option value="0">Seleccione Plataforma</option>
                                    @foreach($plataformas as $pl)
                                        <option value = '{{$pl->idPla}}'>{{$pl->plataforma}}</option>
                                    @endforeach
                                </select>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-group">
                        <label for="exampleInputuname">Marca</label>
                        <div class="input-group">
                            <div class="input-group-addon"><i class="ti-location-pin"></i></div>
                                <Select class="form-control" name='idMarca'>
                                    <option value="0">Seleccione Marca</option>
                                    @foreach($marcas as $ma)
                                        <option value = '{{$ma->idMarca}}'>{{$ma->marca}}</option>
                                    @endforeach
                                </select>
                        </div>
                    </div>
                </div>
            </div>
            <button type='submit' class="btn btn-success btn-flat btn-addon m-b-10 m-l-5 waves-effect waves-light m-r-10" Value='Guardar'><i class="ti-plus"></i>Guardar</button>
            <button type="reset" class="btn btn-danger btn-flat btn-addon m-b-10 m-l-5 waves-effect waves-light" value="Cancelar"><i class="ti-close"></i>Cancelar</button>
        </form>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function(){

        $("#precio").keyup(function(){
            var precio = $("#precio").val();
            var iva=parseFloat((parseInt(precio))*.16).toFixed(2);
            $("#iva").val(iva);
            //var ivaT = $("#iva").val();
            //var precioT = $("#precio").val();
            //var tot=parseFloat(paserInt(precioT)+parseInt(ivaT));
            $("#total").val(parseInt(precio)+parseInt(iva));
            //$('#total').attr("value", $("#precio").val() +  $("#iva").val());
        });
    }); 
</script>
@stop