@foreach($bitacoras as $bit)
<div class="row">
    <div class="col-lg-6">
        @if($errors->first('fEntrada'))
            <i>{{$errors->first('fEntrada')}}</i>
        @endif
        <div class="form-group">
            <label for="exampleInputname"><b>Fecha de Entrada</b></label>
            <div class="input-group">
                <div class="input-group-addon"><i class="ti-calendar"></i></div>
                <input type="text" name="fEntrada" id="fEntrada" class="form-control" value="{{$bit->fechaHora}}">
            </div>
        </div>
    </div>
@endforeach

@foreach($historicos as $his)
    <div class="col-lg-6">
        @if($errors->first('uVenta'))
            <i>{{$errors->first('uVenta')}}</i>
        @endif
        <div class="form-group">
            <label for="exampleInputname"><b>Ultima Venta</b></label>
            <div class="input-group">
                <div class="input-group-addon"><i class="ti-calendar"></i></div>
                <input type="text" name="uVenta" id="uVenta" class="form-control" value="{{$his->fechaHora}}">
            </div>
        </div>
    </div>
</div>
@endforeach