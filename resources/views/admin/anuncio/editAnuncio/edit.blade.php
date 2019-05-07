@extends ('layouts.admin2')
@section ('barraizda')
                @include('layouts.includes.'.Auth::user()->stringRol->nombre . '.barraizda')
@endsection
@section ('contenido')
<div class="main-content">
    <div class="main-content-inner">
        <div class="breadcrumbs ace-save-state" id="breadcrumbs">
        </div>
        <div class="page-content">
            <div class="row">
                <div class="col-xs-12">
                    @include('admin.anuncio.includes.modalDelete')

@if(session()->has('msj'))
                    <div class="alert alert-success">
                        <button aria-hidden="true" class="close" type="button">
                            ×
                        </button>
                        <span>
                            <b>
                                Exito -
                            </b>
                            {{ session('msj')}} ".alert-success"
                        </span>
                    </div>
                    @endif
                    <div class="tableefecto widget-box widget-color-blue ui-sortable-handle" id="widget-box-3">
                        <div class="widget-header widget-header-small">
                            <h6 class="widget-title">
                                <i class="ace-icon fa fa-table">
                                </i>
                                Modificar Anuncio
                            </h6>
                        </div>
                        <div class="breadcrumbs ace-save-state" id="breadcrumbs">

                        </div>
                        <div class="widget-body" style="display: block;">
                            <div class="widget-main ">
    {!!Form::model($anuncio,['method'=>'PATCH','route'=>['Anuncio.update',$anuncio->idanuncio]])!!}
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
    <div class="row">
        <div class="form-group col-md-4">
            {{ Form::label('Pelo', 'Pelo') }}
      {!! Form::select('idpelos',$pelos,$anuncio->idpelo, $attributes = array('class'=>'form-control','id'=>'idpelos')) !!}
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-4">
            {{ Form::label('Ojos', 'Ojos') }}
      {!! Form::select('idojos',$ojos,$anuncio->idojos, $attributes = array('class'=>'form-control','id'=>'idojos')) !!}
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-4">
            {{ Form::label('Estatura', 'Estatura') }}
      {!! Form::select('idestatura',$estaturas,$anuncio->idestatura, $attributes = array('class'=>'form-control','id'=>'idestatura')) !!}
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-4">
            {{ Form::label('Usuario', 'Usuario') }}
      {!! Form::select('idusuario',$usuarios,$usu, $attributes = array('class'=>'form-control','id'=>'Provincia')) !!}
        </div>
    </div>
    @include('admin.anuncio.includes.ImagenesUsuarioAnuncio')
                            </div>
                                    <div class="modal-footer">
  {{ Form::button('Actualizar Anuncio', array('type' => 'submit', 'class' => 'btn btn-primary')) }}
                                    </div>
{{ Form::close() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.tableefecto{
  box-shadow: 1px 1px 20px #000;
}
</style>
    <script>
        $('#Provincia').change(function(event) {
            event.preventDefault();
            $.get("/admin/getLocalidadesJSON/" + event.target.value + "",function(response){
              $('#Localidad').empty();

              $.each(response, function(i, item) {
                $('#Localidad').append("<option value='" + response[i].idlocalidad+"'>"+response[i].nombre+"</option");
              });

            });
          });
    $(document).ready(function() {
        $("#widget-box-3").fadeIn();
        TweenMax.from("#widget-box-3", 0.4, { scale: 0, ease: Sine.easeInOut });
        TweenMax.to("#widget-box-3", 0.4, { scale: 1, ease: Sine.easeInOut });
        $('.modal').appendTo("body");

    });
    </script>
    @endsection