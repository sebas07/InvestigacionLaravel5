@extends('Ventanas.layout')

@section('titulo')
    Contenidos agregados a la pagina
@stop

@section('contenido')
    <section class="col-md-12 seccion" style="height:600px;overflow-y:scroll;">
        <table id="contenidos">
            <caption id="tableTitle">Contenidos existentes</caption>
            <tr>
                <th class="tableH" style="max-width: 190px; width: 190px; overflow: hidden">Titulo</th>
                <th class="tableH" style="max-width: 275px; width: 275px; overflow: hidden">Descripcion</th>
                <th class="tableH" style="max-width: 145px; width: 145px; overflow: hidden">Categoria</th>
                <th class="tableH" style="max-width: 160px; width: 160px; overflow: hidden">Palabras clave</th>
                <th class="tableH" style="max-width: 310px; width: 310px; overflow: hidden">Opciones</th>
            </tr>
            @foreach($contenidos as $contenido)
                <tr>
                    <td class="tableD" style="max-width: 190px; width:190px; overflow: hidden">
                        {{ $contenido->titulo }}</td>
                    <td class="tableD" style="max-width: 275px; width:275px; overflow: hidden">
                        {{ $contenido->descripcion }}</td>
                    <td class="tableD" style="max-width: 145px; width:145px; overflow: hidden">
                        {{ $contenido->categoria }}</td>
                    <td class="tableD" style="max-width: 160px; width:160px; overflow: hidden">
                        {{ $contenido->palabrasClave }}</td>
                    <td class="tableD" style="max-width: 310px; overflow: hidden">
                        <div class="right">
                            <a href="{{ action('ContenidosController@destroy', [$contenido->id]) }}" class="btn btn-danger">Borrar</a>
                        </div>
                        <div class="right">
                            <a href="{{ action('ContenidosController@modify', [$contenido->id]) }}" class="btn btn-success">Modificar</a>
                        </div>
                        <div class="right">
                            <a href="{{ action('ContenidosController@verContenido', [$contenido->id]) }}" class="btn btn-primary">Ver HTML</a>
                        </div>
                    </td>
                </tr>
            @endforeach
        </table>
    </section>
@stop

<style>
.seccion {
    margin-top: 40px;
}
table, tr, td, th {
    text-align: left;
    border: 1px solid;
    border-collapse: collapse;
    border-color: #FFFFFF;
}
#tableTitle {
    color: #4682B4;
    font-size: 230%;
    font-weight: bold;
    padding: 10px;
    margin-bottom: 20px;
    text-align: center;
}
.tableH {
    text-align: center;
    font-size: 20px;
    color: #4682B4;
    padding: 15px 10px 15px 10px;
}
.tableD {
    padding: 7px 10px 7px 10px;
}
table#contenidos tr:nth-child(even) {
    background-color: #d9edf7;
}
table#contenidos tr:nth-child(odd) {
    background-color: #DCDCDC;
}
.right{
    float:right;
    margin: 5px;
}
</style>