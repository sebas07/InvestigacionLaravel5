@extends('Ventanas.layout')

@section('titulo')
    Pagina principal
@stop

@section('contenido')
    <div class="col-md-offset-3 col-md-4 division">
        <h1 id="titulo">Ingreso al sistema</h1>
        <hr />
        {!! Form::open(['url' => 'users']) !!}
            <div class="form-group">
                {!! Form::label('username', 'Nombre de usuario: ') !!}
                {!! Form::text('username', null, ['class' => "form-control", 'required' => "required", 'autofocus'=>'autofocus']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('password', 'Contraseña: ') !!}
                {!! Form::password('password', ['class' => "form-control", 'required' => "required"]) !!}
            </div>
            <div class="form-group">
                {!! Form::submit('Ingresar', ['class' => 'btn btn-primary form-control']) !!}
            </div>
        {!! Form::close() !!}
    </div>
@stop

@section('footer')
    @if(isset($resultado))
        <script>alert('Los datos ingresados no son validos')</script>
    @endif
@stop

<style>
.division {
    margin-top: 100px;
}
#titulo {
    color: #4682B4;
}
</style>