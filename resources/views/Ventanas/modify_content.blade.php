@extends('Ventanas.layout')

@section('titulo')
    Modificar un contenido
@stop

@section('contenido')
    <h1>Modificar un contenido</h1>
    <hr />
    <br />
    <div class="col-md-offset-2 col-md-7">
        @if(isset($contenido))
            {!! Form::open(['url' => 'contenidos/old']) !!}
                <div class="form-group">
                    {!! Form::label('title', 'Titulo del contenido: ') !!}
                    <div class=" text-danger">
                        <p style="font-size: 20px;">*</p>
                    </div>
                    {!! Form::text('title', $value = $contenido->titulo, ['class' => "form-control", 'required' => "required", 'autofocus'=>'autofocus']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('description', 'Descripcion: ') !!}
                    {!! Form::textarea('description', $value = $contenido->descripcion, ['class' => "form-control", 'id' => 'textA']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('category', 'Categoria: ') !!}
                    {!! Form::select('category', $categorias, $value = $contenido->id_categoria, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('key_words', 'Palabras clave: ') !!}
                    {!! Form::text('key_words', $value = $contenido->palabrasClave, ['class' => "form-control"]) !!}
                </div>
                <div class="text-danger">
                    <p style="font-size: 20px; padding: 5px;">* Campo requerido</p>
                </div>
                <div class="form-group">
                    {!! Form::submit('Modificar contenido', ['class' => 'btn btn-primary form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::text('id', $value = $contenido->id, ['style' => 'visibility: hidden']) !!}
                </div>
            {!! Form::close() !!}
        @else
            <h1>No se encontro el contenido</h1>
        @endif
    </div>
@stop

<style>
#textA {
    height: 90px;
}
</style>