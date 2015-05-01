@extends('Ventanas.layout')

@section('contenido')
    @if(isset($contenido))
        <div id="contentD" class="col-md-offset-3 col-md-6">
            <h1 id="titulo">{{ $contenido->titulo }}</h1>
            <hr />
            <p>{{ $contenido->descripcion }}</p>
            <hr />
            <p>{{ $contenido->categoria }}</p>
            <hr />
            <span>{{ $contenido->palabrasClave }}</span>
        </div>
    @else
        <h1>El contenido solicitado no existe</h1>
    @endif
@stop

<style>
#contentD {
    margin-top: 50px;
}
#titulo {
color: #4682B4;
}
p {
font-size: 25px;
}
span {
font-size: 20px;
color: blue;
}
</style>