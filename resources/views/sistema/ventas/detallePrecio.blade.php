@foreach($productos as $cpro)
    <div class="row">
        <div class="col-lg-6">
            @if($errors->first('cantidad'))
                <i>{{$errors->first('cantidad')}}</i>
            @endif
            <div class="form-group">
                <label for="exampleInputname"><b>Cantidad</b></label>
                <div class="input-group">
                    <div class="input-group-addon"><i class="ti-money"></i></div>
                    <input type="text" name="cantidad" id="cantidad" class="form-control" value="">
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
                    <input type="text" name="precio" id="precio" class="form-control" value="{{$cpro->precio}}">
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
                    <input type="text" name="importe" id="importe" class="form-control" value="">
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
                    <input type="text" name="iva" id="iva" class="form-control" value="{{$cpro->iva}}">
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
                    <input type="text" name="total" id="total" class="form-control" value="{{$cpro->total}}">
                </div>
            </div>
        </div>
    </div>
@endforeach
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.1/jquery-ui.js"></script>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.1/themes/base/jquery-ui.css" />
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $("#cantidad").focusout(function(){
            var precio = $("#precio").val();
            var cantidad = $("#cantidad").val();
            $("#importe").val((parseInt(cantidad)) * parseInt(precio));
            var importe = $("#importe").val();
            var iva=parseFloat((parseInt(importe))*.16).toFixed(2);

            $("#iva").val(iva);
            //var ivaT = $("#iva").val();
            //var precioT = $("#precio").val();
            //var tot=parseFloat(paserInt(precioT)+parseInt(ivaT));
            var total = parseFloat((parseInt(importe) + parseInt(iva))).toFixed(2);
            $("#total").val(total);
            // $("#total").val((parseInt(importe)+parseInt(iva))).toFixed(2);
            //$('#total').attr("value", $("#precio").val() +  $("#iva").val());
        });
    });
</script>
