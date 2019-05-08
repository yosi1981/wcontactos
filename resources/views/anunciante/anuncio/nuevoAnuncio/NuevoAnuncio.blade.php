@extends ('layouts.admin2')
@section ('barraizda')
                @include('layouts.includes.'.Auth::user()->stringRol->nombre . '.barraizda')
@endsection
@section ('contenido')
<h1>
    Crear Anuncio
</h1>
<div class="row">
    {{ Form::open(array('url' => '/anunciante/NuevoAnuncio','method'=>'POST'), array('role' => 'form')) }}
    <div class="row">
        <div class="form-group col-md-4">
            {{ Form::label('titulo', 'Titulo') }}
      {{ Form::text('titulo', null, array('placeholder' => 'Introduce el Titulo', 'class' => 'form-control')) }}
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-4">
            {{ Form::label('descripcion', 'Descripcion') }}
      {{ Form::text('descripcion',null, array('placeholder' => 'Introduce la descripción', 'class' => 'form-control')) }}
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-4">
            {{ Form::label('fechainicio', 'Fecha Inicio') }}
      {{ Form::input('date','fechainicio' , '2015-02-22', ['class'=>'datepicker form-control']) }}
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-4">
            {{ Form::label('fechafinal', 'Fecha Final') }}
      {{ Form::input('date','fechafinal' , '2015-02-22', ['class'=>'datepicker form-control']) }}
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-4">
            {{ Form::label('activo', 'Activo?') }}
      {{Form::checkbox('activo', '1',true)}}
        </div>
    </div>
    <div class="row" type="hidden">
        <div class="form-group col-md-4">
            {{ Form::label('idusuario', 'Id Usuario') }}
      {{ Form::label('idusuario', Auth::user()->id ) }}
        </div>
    </div>
    {{ Form::button('Crear Anuncio', array('type' => 'submit', 'class' => 'btn btn-primary')) }}

{{ Form::close() }}

@endsection
</div>