@foreach($productos as $pr)
<div class="col-lg-6">
    @if($errors->first('producto'))
        <i>{{$errors->first('producto')}}</i>
    @endif
    <div class="form-group">
        <label for="exampleInputname"><b>Producto</b></label>
        <div class="input-group">
            <div class="input-group-addon"><i class="ti-wallet"></i></div>
            <input type="text" name="producto" id="producto" class="form-control" value="{{$pr->producto}}">
        </div>
    </div>
</div>
@endforeach