@extends('Ventanas.layout')

@section('titulo')
    Agregar un contenido nuevo
@stop

@section('contenido')
    <h1>Agregar un contenido nuevo</h1>
    <hr />
    <br />
    <div class="col-md-offset-2 col-md-7">
        {!! Form::open(['url' => 'contenidos/new']) !!}
            <div class="form-group">
                {!! Form::label('title', 'Titulo del contenido: ') !!}
                <div class=" text-danger">
                    <p style="font-size: 20px;">*</p>
                </div>
                {!! Form::text('title', null, ['class' => "form-control", 'required' => "required", 'autofocus'=>'autofocus']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('description', 'Descripcion: ') !!}
                {!! Form::textarea('description', null, ['class' => "form-control", 'id' => 'textA']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('category', 'Categoria: ') !!}
                {!! Form::select('category', $categorias, null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('key_words', 'Palabras clave: ') !!}
                {!! Form::text('key_words', null, ['class' => "form-control"]) !!}
            </div>
            <div class="text-danger">
                <p style="font-size: 20px; padding: 5px;">* Campo requerido</p>
            </div>
            <div class="form-group">
                {!! Form::submit('Agregar contenido', ['class' => 'btn btn-primary form-control']) !!}
            </div>
        {!! Form::close() !!}
    </div>
@stop

<style>
#textA {
    height: 90px;
}
</style>