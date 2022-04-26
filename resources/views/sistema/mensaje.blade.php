@extends('sistema.principal')
@section('contenido')
    <div class="card-content">
        <div class="alert alert-success">
            <h4 class="alert-heading">{{$proceso}}</h4>
            <p>{{$mensaje}}</p>
        </div>
    </div>
@stop