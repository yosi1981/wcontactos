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
<h1>
    Modificar Anuncio PROGRAMADO
</h1>
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
        {{ Form::label('fechainicio', 'Fecha Inicio') }}
      {{ Form::input('date','fechainicio' , $anuncioP->fechainicio, ['class'=>'datepicker form-control']) }}
    </div>
</div>
<div class="row">
    <div class="form-group col-md-4">
        {{ Form::label('fechafinal', 'Fecha Final') }}
     {{ Form::input('date','fechafinal' , $anuncioP->fechafinal, ['class'=>'datepicker form-control']) }}
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
<script>
    function getLocalidadesAP()
        {
            var url="{{URL::to('/anunciante/getAnunciosProLocal')}}"+"/"+"{{$anuncioP->idanuncio_programado}}";
            $.ajax({
                type : 'get',
                url  : url,
            }).done(function(data){
                $('#cuerpoapls').html(data);
            })
        }

  $(document).ready(function() {
        $('.modal').appendTo("body");
        getLocalidadesAP();
        });

          $('#btnAddAnunProLocal').on('click',function(){

            var url="{{URL::to('/anunciante/createAnunProLoca')}}" + "/" + $(this).data('id') ;
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
           var url="{{URL::to('/anunciante/getAnuncioProLocal')}}"+"/"+$(this).data('id');
            $.ajax({
                type : 'get',
                url  : url,
            }).done(function(data){
                $('#editAnunProLoca').html(data);
                $('#editAnunProLoca').modal('show');
            })
      });
      $(document).on('click','.deleteAPpre',function(){
           var url="{{URL::to('/anunciante/deleteAPLpre')}}"+"/"+$(this).data('id');
            $.ajax({
                type : 'get',
                url  : url,
            }).done(function(data){
                $('#deleteAnunProLoca').html(data);
                $('#deleteAnunProLoca').modal('show');
            })
      });
     $(document).on('click','.deleteAPLpost',function(){
           var url="{{URL::to('/anunciante/deleteAPLpost')}}"+"/"+$(this).data('id');
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
            var url="{{URL::to('/anunciante/nuevoAnuncioProLocal')}}";
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
            var url="{{URL::to('/anunciante/UpdateAPL')}}";
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
