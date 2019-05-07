@extends ('layouts.admin2')
@section ('barraizda')
                @include('layouts.includes.'.Auth::user()->stringRol->nombre . '.barraizda')
@endsection
@section ('contenido')
<div aria-hidden="true" class="modal fade modal-slide-in-right" id="AnunProLoca" role="dialog">
</div>
<div aria-hidden="true" class="modal fade modal-slide-in-right" id="editAnunProLoca" role="dialog">
</div>
<div aria-hidden="true" class="modal fade modal-slide-in-right" id="deleteAnunProLoca" role="dialog">
</div>
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
{!!Form::model($anuncioP,['method'=>'PATCH','route'=>['AP.update',$anuncioP->idanuncio_programado]])!!}
<div class="row">
    <div class="form-group col-md-4">
        {{ Form::label('titulo', 'Tituloasdf') }}
      {{ Form::text('titulo', $anuncioP->titulo, array('placeholder' => 'Introduce el Titulo', 'class' => 'form-control')) }}
    </div>
</div>
<div class="row">
    <div class="form-group col-md-4">
        {{ Form::label('descripcion', 'Descripcion') }}
      {{ Form::text('descripcion', $anuncioP->descripcion, array('placeholder' => 'Introduce la descripción', 'class' => 'form-control')) }}
    </div>
</div>
<div class="row">
    <div class="form-group col-md-4">
        {{ Form::label('Pelo', 'Pelo') }}
      {!! Form::select('idpelos',$pelos,$anuncioP->idpelos, $attributes = array('class'=>'form-control','id'=>'idpelos')) !!}
    </div>
</div>
<div class="row">
    <div class="form-group col-md-4">
        {{ Form::label('Ojos', 'Ojos') }}
      {!! Form::select('idojos',$ojos,$anuncioP->idojos, $attributes = array('class'=>'form-control','id'=>'idojos')) !!}
    </div>
</div>
<div class="row">
    <div class="form-group col-md-4">
        {{ Form::label('Estatura', 'Estatura') }}
      {!! Form::select('idestatura',$estaturas,$anuncioP->idestatura, $attributes = array('class'=>'form-control','id'=>'idestatura')) !!}
    </div>
</div>
<div class="row">
    <div class="form-group col-md-4">
        {{ Form::label('fechainicio', 'Fecha Inicio') }}
      {{ Form::input('date','fechainicio' , $anuncioP->fechainicio, ['class'=>'datepicker form-control','min'=>'2018-12-20']) }}
    </div>
</div>
<div class="row">
    <div class="form-group col-md-4">
        {{ Form::label('fechafinal', 'Fecha Final') }}
     {{ Form::input('date','fechafinal' , $anuncioP->fechafinal, ['class'=>'datepicker form-control','min'=>'2018-12-20']) }}
    </div>
</div>
<div class="row">
    <div class="form-group col-md-4">
        {{ Form::label('Usuario', 'Usuario') }}
      {!! Form::select('idusuario',$usuarios,$usu, $attributes = array('class'=>'form-control','id'=>'Provincia')) !!}
    </div>
</div>
<div class="row">
    <div class="form-group col-md-4">
        {{ Form::label('activo', 'Activo?') }}
      @if($anuncioP->activo==1)
          {{Form::checkbox('activo', '1',true)}}
      @else
          {{Form::checkbox('activo', '0',false)}}
      @endif
    </div>
</div>
{{ Form::button('Actualizar Anuncio', array('type' => 'submit', 'class' => 'btn btn-primary')) }}

{{ Form::close() }}
<div id="cuerpoapls">
</div>
<button class="btn btn-warning" data-id="{{$anuncioP->idanuncio_programado}}" id="btnAddAnunProLocal" name="AnunProLoca">
    Nuevo
</button>
                            </div>
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
    function getLocalidadesAP()
        {
            var url="{{URL::to('/admin/getAnunciosProLocal')}}"+"/"+"{{$anuncioP->idanuncio_programado}}";
            $.ajax({
                type : 'get',
                url  : url,
            }).done(function(data){
                $('#cuerpoapls').html(data);
            })
        }

  $(document).ready(function() {
        $("#widget-box-3").fadeIn();
        TweenMax.from("#widget-box-3", 0.4, { scale: 0, ease: Sine.easeInOut });
        TweenMax.to("#widget-box-3", 0.4, { scale: 1, ease: Sine.easeInOut });
        $('.modal').appendTo("body");
        getLocalidadesAP();
        });

          $('#btnAddAnunProLocal').on('click',function(){

            var url="{{URL::to('/admin/createAnunProLoca')}}" + "/" + $(this).data('id') ;
            $.ajax({
                type:'get',
                url: url,
                async: true,
                dataType: 'json',
                headers: {
                       'X-CSRF-TOKEN': '{{ csrf_token() }}',
                   },
                success:function(data){
                    $('#AnunProLoca').html(data);

                    $('#AnunProLoca').modal('show');
                }

            }).fail(function(data){

                            })})

      $(document).on('click','.editlocalidadAP',function(){
           var url="{{URL::to('/admin/getAnuncioProLocal')}}"+"/"+$(this).data('id');
            $.ajax({
                type : 'get',
                url  : url,
            }).done(function(data){
                $('#editAnunProLoca').html(data);
                $('#editAnunProLoca').modal('show');
            })
      });
      $(document).on('click','.deleteAPpre',function(){
           var url="{{URL::to('/admin/deleteAPLpre')}}"+"/"+$(this).data('id');
            $.ajax({
                type : 'get',
                url  : url,
            }).done(function(data){
                $('#deleteAnunProLoca').html(data);
                $('#deleteAnunProLoca').modal('show');
            })
      });
     $(document).on('click','.deleteAPLpost',function(){
           var url="{{URL::to('/admin/deleteAPLpost')}}"+"/"+$(this).data('id');
            $.ajax({
                type : 'get',
                url  : url,
            }).done(function(data){
              getLocalidadesAP();
                $('#deleteAnunProLoca').modal('hide');
            })
      });
      $(document).on('click', '.guardar', function(){
            var form=$('#frmAnunProLoca');
            var formData=form.serialize();
            var url="{{URL::to('/admin/nuevoAnuncioProLocal')}}";
            $.ajax({
                type:'post',
                url: url,
                data: formData,
                async: true,
                dataType: 'json',
                headers: {
                       'X-CSRF-TOKEN': '{{ csrf_token() }}',
                   },
                success:function(data){
                  getLocalidadesAP();
                    $('#AnunProLoca').modal('hide');
                }

            }).fail(function(data){

                            })
        });
     $(document).on('click', '.EditProblacion', function(){
            var form=$('#frmeditAnunProLoca');
            var formData=form.serialize();
            var url="{{URL::to('/admin/UpdateAPL')}}";
            $.ajax({
                type:'post',
                url: url,
                data: formData,
                async: true,
                dataType: 'json',
                headers: {
                       'X-CSRF-TOKEN': '{{ csrf_token() }}',
                   },
                success:function(data){
                  getLocalidadesAP();
                    $('#editAnunProLoca').modal('hide');
                }

            }).fail(function(data){

                            })
        });
</script>
@endsection
