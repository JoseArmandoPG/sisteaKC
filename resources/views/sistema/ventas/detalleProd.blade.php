@foreach ($productos as $pro)
    @if($pro->deleted_at!="")
    @else
        <option value='{{$pro->idPro}}' id="idPro" name="idPro">{{$pro->producto}}</option>
    @endif
@endforeach
