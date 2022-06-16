@foreach($productos as $cpro)
    <div class="row">
        <div class="col-lg-0">
            @if($errors->first('idPro'))
                <i>{{$errors->first('idPro')}}</i>
            @endif
            <div class="form-group">
                <div class="input-group">
                    <input type="hidden" name="idPro" id="idPro" class="form-control" value="{{$cpro->idPro}}" readonly="readonly">
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
                    <input type="text" name="producto" id="producto" class="form-control" value="{{$cpro->producto}}">
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
                    <input type="text" name="categoria" id="categoria" class="form-control" value="{{$cpro->categoria}}">
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
                    <input type="text" name="modelo" id="modelo" class="form-control" value="{{$cpro->modelo}}">
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
                    <input type="text" name="stock" id="stock" class="form-control" value="{{$cpro->stock}}">
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
                    <input type="text" name="status" id="status" class="form-control" value="{{$cpro->status}}">
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
                    <input type="text" name="color" id="color" class="form-control" value="{{$cpro->color}}">
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
                    <input type="text" name="medida" id="medida" class="form-control" value="{{$cpro->medida}}">
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
                    <input type="text" name="genero" id="genero" class="form-control" value="{{$cpro->genero}}">
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
                    <input type="text" name="talla" id="talla" class="form-control" value="{{$cpro->talla}}">
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
                    <input type="text" name="linea" id="linea" class="form-control" value="{{$cpro->linea}}">
                </div>
            </div>
        </div>
    </div>
@endforeach
