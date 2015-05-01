@extends('Ventanas.layout')

@section('titulo')
    Categorias
@stop

@section('contenido')
    <section class="col-md-offset-2 col-md-6 categorias" style="height:400px;overflow-y:scroll;">
        <table id="categorias">
            <caption id="tableTitle">Categorias existentes</caption>
            <tr>
                <th class="tableH">Categoria</th>
                <th class="tableH">Opciones</th>
            </tr>
                @foreach($categorias as $categoria)
                <tr>
                    <td class="tableD" style="max-width: 250px; width:250px; overflow: hidden">
                        {{ $categoria->categoria }}</td>
                    <td class="tableD" style="max-width: 310px;overflow: hidden">
                        <div class="right">
                            <a href="{{ action('CategoriasController@destroy', [$categoria->id]) }}" onclick="return ConfirmDelete()" class="btn btn-danger">Eliminar</a>
                        </div>
                        <div class="right">
                            <a href="{{ action('CategoriasController@modify', [$categoria->id]) }}" class="btn btn-primary">Modificar</a>
                        </div>
                    </td>
                </tr>
                @endforeach
        </table>
    </section>
    <section class="col-md-offset-2 col-md-6 nueva">
        <hr />
        @if(isset($category))
            {!! Form::open(['url' => 'categorias/old']) !!}
                <div class="form-group">
                    {!! Form::label('description', 'Descripcion de la categoria: ') !!}
                    {!! Form::text('description', $value = $category->categoria, ['class' => "form-control", 'required' => "required"]) !!}
                </div>
                <div class="form-group">
                    {!! Form::submit('Modificar categoria', ['class' => 'btn btn-primary form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::text('id', $value = $category->id, ['style' => 'visibility: hidden']) !!}
                </div>
            {!! Form::close() !!}
        @else
            {!! Form::open(['url' => 'categorias/new']) !!}
                <div class="form-group">
                    {!! Form::label('description', 'Descripcion de la categoria: ') !!}
                    {!! Form::text('description', null, ['class' => "form-control", 'required' => "required"]) !!}
                </div>
                <div class="form-group">
                    {!! Form::submit('Agregar categoria', ['class' => 'btn btn-primary form-control']) !!}
                </div>
            {!! Form::close() !!}
        @endif
    </section>
@stop

<script>
    function ConfirmDelete()
    {
        var x = confirm("¿Desea eliminar la categoria? Si lo hace los contenidos con esa categoria serán eliminados.");
        if (x)
            return true;
        else
            return false;
    }
    function ConfirmModify()
    {
        var y = confirm("¿Desea modificar la categoria?");
        if (y)
            return true;
        else
            return false;
    }
</script>

<style>
.categorias {
    margin-top: 50px;
}
.nueva {
margin-top: 25px;
}
table, tr, td, th {
    text-align: left;
    border: 1px solid;
    border-collapse: collapse;
    border-color: #DCDCDC;
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
table#categorias tr:nth-child(even) {
    background-color: #F5F5DC;
}
table#categorias tr:nth-child(odd) {
    background-color: #F5F5F5;
}
.right{
    float:right;
    margin: 5px;
}
</style>