@extends ('layouts.admin2')
@section ('barraizda')
                @include('layouts.includes.'.Auth::user()->stringRol->nombre . '.barraizda')
@endsection
@section ('contenido')
<h1>
    Modificar Anuncio
</h1>
<div class="row">
    {!!Form::model($anuncio,['method'=>'PATCH','route'=>['AnuncioA.update',$anuncio->idanuncio]])!!}
    <div class="row">
        <div class="form-group col-md-4">
            {{ Form::label('titulo', 'Titulo') }}
      {{ Form::text('titulo', $anuncio->titulo, array('placeholder' => 'Introduce el Titulo', 'class' => 'form-control')) }}
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-4">
            {{ Form::label('descripcion', 'Descripcion') }}
      {{ Form::text('descripcion', $anuncio->descripcion, array('placeholder' => 'Introduce la descripción', 'class' => 'form-control')) }}
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-4">
            {{ Form::label('activo', 'Activo?') }}
      @if($anuncio->activo==1)
          {{Form::checkbox('activo', '1',true)}}
      @else
          {{Form::checkbox('activo', '0',false)}}
      @endif
        </div>
    </div>
    @include('anunciante.anuncio.includes.ImagenesUsuarioAnuncio')

  {{ Form::button('Actualizar Anuncio', array('type' => 'submit', 'class' => 'btn btn-primary')) }}

{{ Form::close() }}


@endsection
</div>