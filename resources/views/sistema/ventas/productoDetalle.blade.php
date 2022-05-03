@foreach($productos as $cpro)
    <div class="row">
        <div class="col-lg-6">
            @if($errors->first('codigo'))
                <i>{{$errors->first('codigo')}}</i>
            @endif
            <div class="form-group">
                <label for="exampleInputname"><b>Codigo</b></label>
                <div class="input-group">
                    <div class="input-group-addon"><i class="ti-tag"></i></div>
                    <input type="text" name="codigo" id="codigo" class="form-control" value="{{$cpro->codigo}}">
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            @if($errors->first('modelo'))
                <i>{{$errors->first('modelo')}}</i>
            @endif
            <div class="form-group">
                <label for="exampleInputname"><b>Modelo</b></label>
                <div class="input-group">
                    <div class="input-group-addon"><i class="ti-archive"></i></div>
                    <input type="text" name="modelo" id="modelo" class="form-control" value="{{$cpro->modelo}}">
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
                    <input type="text" name="stock" id="stock" class="form-control" value="{{$cpro->stock}}">
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
        <div class="col-lg-6">
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

        <div class="col-lg-6">
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
