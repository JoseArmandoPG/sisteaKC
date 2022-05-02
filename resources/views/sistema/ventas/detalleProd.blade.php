@foreach ($productos as $pro)
    @if($pro->deleted_at!="")
        <option value="0">No hay productos para esta categoria</option>
    @else
        <option value='{{$pro->idPro}}'>{{$pro->producto}}</option>
    @endif
@endforeach
