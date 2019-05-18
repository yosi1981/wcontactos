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
                    <?php $TituloVentana="Modificar Anuncio Programado" ?>
                    @include('layouts.includes.admin.ventanas.CabeceraVentana')

{!!Form::model($anuncioP,['method'=>'PATCH','route'=>['AP.update',$anuncioP->idanuncio_programado]])!!}
        {{Form::token()}}
<div class="row">
    <div class="form-group col-md-12">
        {{ Form::label('titulo', 'Tituloasdf',array('class'=>'col-md-3 control-label no-padding-right')) }}
      {{ Form::text('titulo', $anuncioP->titulo, array('placeholder' => 'Introduce el Titulo', 'class' => 'col-sm-9 form_control')) }}
    </div>
</div>
<div class="row">
    <div class="form-group col-md-12">
        {{ Form::label('descripcion', 'Descripcion',array('class'=>'col-md-3 control-label no-padding-right')) }}
      {{ Form::text('descripcion', $anuncioP->descripcion, array('placeholder' => 'Introduce la descripción', 'class' => 'col-sm-9 form_control')) }}
    </div>
</div>
<div class="row">
    <div class="form-group col-md-12">
        {{ Form::label('Pelo', 'Pelo',array('class'=>'col-md-3 control-label no-padding-right')) }}
      {!! Form::select('idpelos',$pelos,$anuncioP->idpelos, $attributes = array('class'=>'col-md-9 chosen-single chosen-default','id'=>'idpelos')) !!}
    </div>
</div>
<div class="row">
    <div class="form-group col-md-12">
        {{ Form::label('Ojos', 'Ojos',array('class'=>'col-md-3 control-label no-padding-right')) }}
      {!! Form::select('idojos',$ojos,$anuncioP->idojos, $attributes = array('class'=>'col-md-9 chosen-single chosen-default','id'=>'idojos')) !!}
    </div>
</div>
<div class="row">
    <div class="form-group col-md-12">
        {{ Form::label('Estatura', 'Estatura',array('class'=>'col-md-3 control-label no-padding-right')) }}
      {!! Form::select('idestatura',$estaturas,$anuncioP->idestatura, $attributes = array('class'=>'col-md-9 chosen-single chosen-default','id'=>'idestatura')) !!}
    </div>
</div>
<div class="row">
    <div class="form-group col-md-12">
        {{ Form::label('fechainicio', 'Fecha Inicio',array('class'=>'col-md-3 control-label no-padding-right')) }}
      {{ Form::input('date','fechainicio' , $anuncioP->fechainicio, ['class'=>'datepicker col-md-9 ','min'=>'2018-12-20']) }}
    </div>
</div>
<div class="row">
    <div class="form-group col-md-12">
        {{ Form::label('fechafinal', 'Fecha Final',array('class'=>'col-md-3 control-label no-padding-right')) }}
     {{ Form::input('date','fechafinal' , $anuncioP->fechafinal, ['class'=>'datepicker col-md-9 ','min'=>'2018-12-20']) }}
    </div>
</div>
<div class="row">
    <div class="form-group col-md-12">
        {{ Form::label('Usuario', 'Usuario',array('class'=>'col-md-3 control-label no-padding-right')) }}
      {!! Form::select('idusuario',$usuarios,$usu, $attributes = array('class'=>'col-md-9 chosen-single chosen-default','id'=>'Provincia')) !!}
    </div>
</div>
<div class="row">
    <div class="form-group col-md-12">
        {{ Form::label('activo', 'Activo?',array('class'=>'col-md-3 control-label no-padding-right')) }}
      @if($anuncioP->activo==1)
          {{Form::checkbox('activo', '1',true)}}
      @else
          {{Form::checkbox('activo', '0',false)}}
      @endif
    </div>
</div>

<div class="row">
    <div class="form-group col-md-12">
        <button class="btn btn-warning" data-id="{{$anuncioP->idanuncio_programado}}" id="btnAddAnunProLocal" name="btnAddAnunProLocal">
            Añadir localidad
        </button>
    </div>
</div>
<div class="row">
    <div class="form-group">
      <div class="col-md-12" id="cuerpoapls">
      </div>
    </div>
</div>
</div>
        <div class="modal-footer">        
                <button class="btn btn-primary" type="submit">
                    Guardar
                </button>

                <a href="Promocion">
                    <button class="btn btn-default">
                        Volver
                    </button>
                </a>
        </div>
{{ Form::close() }}
                    @include('layouts.includes.admin.ventanas.PieVentana')
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

          $('#btnAddAnunProLocal').on('click',function(e){
                    e.preventDefault();
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

                            })});

      $(document).on('click','.editlocalidadAP',function(e){
           e.preventDefault();
           var url="{{URL::to('/admin/getAnuncioProLocal')}}"+"/"+$(this).data('id');
            $.ajax({
                type : 'get',
                url  : url,
            }).done(function(data){
                $('#editAnunProLoca').html(data);
                $('#editAnunProLoca').modal('show');
            })
      });
      $(document).on('click','.deleteAPpre',function(e){
        e.preventDefault();
           var url="{{URL::to('/admin/deleteAPLpre')}}"+"/"+$(this).data('id');
            $.ajax({
                type : 'get',
                url  : url,
            }).done(function(data){
                $('#deleteAnunProLoca').html(data);
                $('#deleteAnunProLoca').modal('show');
            })
      });
     $(document).on('click','.deleteAPLpost',function(e){
      e.preventDefault();
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
      
     $(document).on('click', '.EditProblacion', function(e){
      e.preventDefault();
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
