@foreach($productos as $cpro)
<input type="text" name="codigo" id="codigo" class="form-control" value="{{$cpro->codigo}}">
@endforeach
