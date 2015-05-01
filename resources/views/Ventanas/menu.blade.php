@extends('Ventanas.layout')

@section('titulo')
    Menu principal
@stop

@section('contenido')
    <div class="col-md-offset-3 col-md-4 division">
        <h1 id="titulo">Menu principal</h1>
        <hr />
        <br />
        <ul id="mmenu">
            <li><a href="{{ url('contenidos/create', null) }}" class="btn btn-primary">Agregar un contenido nuevo</a></li>
            <br />
            <li><a href="{{ url('contenidos/', null) }}" class="btn btn-primary">Ver contenidos agregados</a></li>
            <br />
            <li><a href="{{ url('categorias/', null) }}" class="btn btn-primary">Gestion de categorias</a></li>
        </ul>
    </div>
@stop

<style>
.division {
    margin-top: 100px;
}
#mmenu {
    list-style-type: none;
}
#titulo {
    color: #4682B4;
}
a {
width: 250px;
height: 50px;
}
</style>