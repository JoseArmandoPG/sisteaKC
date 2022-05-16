@extends('sistema.principal')
@section('contenido')
<div class="card">
    <div class="card-body">
        <h4 class="card-title text-primary">Producto</h4>
        <!-- {{$hora}}<br>
        {{$fechaHoraL}} -->
        <!-- {{$usuarioActivo}} -->
        <h6 class="card-subtitle">ConKalmhe</h6>
        <form action="{{route('guardaVenta')}}" class="form p-t-20" method="POST" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="row">
                <div class="col-lg-0">
                    @if($errors->first('idPro'))
                        <i>{{$errors->first('idPro')}}</i>
                    @endif
                    <div class="form-group">
                        <div class="input-group">
                            <input type="hidden" name="idVenta" id="idVenta" class="form-control" value="{{$idvenSig}}" readonly="readonly">
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
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
            </div>
            <div id="productoDetalle">
                <div class="row">
                    <div class="col-lg-0">
                        @if($errors->first('idPro'))
                            <i>{{$errors->first('idPro')}}</i>
                        @endif
                        <div class="form-group">
                            <div class="input-group">
                                <input type="hidden" name="idPro" id="idPro" class="form-control" value="{{old('idPro')}}" readonly="readonly">
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
                    <div class="col-lg-6">
                        @if($errors->first('categoria'))
                            <i>{{$errors->first('categoria')}}</i>
                        @endif
                        <div class="form-group">
                            <label for="exampleInputname"><b>Categoria</b></label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="ti-tag"></i></div>
                                <input type="text" name="categoria" id="categoria" class="form-control" value="{{old('categoria')}}">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
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
                    <div class="col-lg-4">
                        @if($errors->first('stock'))
                            <i>{{$errors->first('stock')}}</i>
                        @endif
                        <div class="form-group">
                            <label for="exampleInputname"><b>Stock</b></label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="ti-archive"></i></div>
                                <input type="text" name="stock" id="stock" class="form-control" value="{{old('stock')}}">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        @if($errors->first('status'))
                            <i>{{$errors->first('status')}}</i>
                        @endif
                        <div class="form-group">
                            <label for="exampleInputname"><b>Status</b></label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="ti-receipt"></i></div>
                                <input type="text" name="status" id="status" class="form-control" value="{{old('status')}}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="detalleFechas">
                <div class="row">
                    <div class="col-lg-6">
                        @if($errors->first('uVenta'))
                            <i>{{$errors->first('uVenta')}}</i>
                        @endif
                        <div class="form-group">
                            <label for="exampleInputname"><b>Ultima Venta</b></label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="ti-calendar"></i></div>
                                <input type="text" name="uVenta" id="uVenta" class="form-control" value="{{$fecha}}">
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
                                <div class="input-group-addon"><i class="ti-calendar"></i></div>
                                <input type="text" name="fEntrada" id="fEntrada" class="form-control" value="{{old('fEntrada')}}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="detallePrecio">
                <div class="row">
                    <div class="col-lg-6">
                        @if($errors->first('cantidad'))
                            <i>{{$errors->first('cantidad')}}</i>
                        @endif
                        <div class="form-group">
                            <label for="exampleInputname"><b>Cantidad</b></label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="ti-money"></i></div>
                                <input type="text" name="cantidad" id="cantidad" class="form-control" value="{{old('cantidad')}}">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
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
                </div>
                <div class="row">
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
                <div class="col-lg-12">
                    @if($errors->first('descripcion'))
                        <i>{{$errors->first('descripcion')}}</i>
                    @endif
                    <div class="form-group">
                        <label for="exampleInputname"><b>Descripcion</b></label>
                        <div class="input-group">
                            <div class="input-group-addon"><i class="ti-notepad"></i></div>
                            <input type="text" name="descripcion" id="descripcion" class="form-control" value="{{old('descripcion')}}">
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

<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.1/jquery-ui.js"></script>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.1/themes/base/jquery-ui.css" />
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function(){
        /*$("#categoria").click(function(){
            $("#producto").load('{{url('detalleProd')}}' + '?idCat=' + this.options[this.selectedIndex].value);
            //console.log(idCat);
        });

        $("#producto").click(function(){
            $("#productoDetalle").load('{{url('productoDetalle')}}' + '?idPro=' + this.options[this.selectedIndex].value);
            //console.log(idCat);
        });*/

        $("#codigo").focusout(function(){
            $("#detalleFechas").load('{{url('detalleFechas')}}' + '?codigo=' + $("#codigo").val());
            //console.log(idCat);
        });

        $("#codigo").focusout(function() {
            $("#productoDetalle").load('{{url('productoDetalle')}}' + '?codigo=' + $("#codigo").val());
        });

        $("#codigo").focusout(function() {
            $("#detallePrecio").load('{{url('detallePrecio')}}' + '?codigo=' + $("#codigo").val());
        });

        $("#cantidad").keyup(function(){
            var precio = $("#precio").val();
            var cantidad = $("#cantidad").val();
            $("#importe").val((parseInt(cantidad)) * parseInt(precio));
            var importe = $("#importe").val();
            var iva=parseFloat((parseInt(importe))*.16).toFixed(2);
            $("#iva").val(iva);
            //var ivaT = $("#iva").val();
            //var precioT = $("#precio").val();
            //var tot=parseFloat(paserInt(precioT)+parseInt(ivaT));
            $("#total").val((parseInt(importe)+parseInt(iva)));
            //$('#total').attr("value", $("#precio").val() +  $("#iva").val());
        });
        
        /*$("#categoria").change( function() {
            var dia = $(this).val();
            if (dia == 1){
                $("#color").attr("required", true);
                $("#medida").attr("required", true);
                $("#talla").attr("required", false)
                $("#genero").attr("required", false)
            } else if(dia == 2) {
                $("#color").attr("required", false);
                $("#medida").attr("required", false);
                $("#talla").attr("required", true)
                $("#genero").attr("required", true)
            }
        });*/
    });
</script>
@stop