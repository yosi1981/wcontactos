@extends ('layouts.admin2')
@section ('barraizda')
                @include('layouts.includes.'.Auth::user()->stringRol->nombre . '.barraizda')
@endsection
@section ('contenido')
    @include('admin.provincia.poblacion.modal-delete')
@include('admin.provincia.poblacion.nuevaPoblacion')
<div class="main-content">
    <div class="main-content-inner">
        <div class="breadcrumbs ace-save-state" id="breadcrumbs">
        </div>
        <div class="page-content">
            <div class="row">
                <div class="col-xs-12">

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
                    <?php $TituloVentana="Modificar Provincia" ?>
                    @include('layouts.includes.admin.ventanas.CabeceraVentana')
        @if (count($errors)>0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>
                    {{$error}}
                </li>
                @endforeach
            </ul>
        </div>
        @endif

    {!!Form::model($provincia,['method'=>'PATCH','route'=>['Provincia.update',$provincia->idprovincia]])!!}
        {{Form::token()}}
        <div class="row">
            <div class="form-group col-md-12">
                {{ Form::label('nombre', 'nombre',array('class'=>'col-md-3 control-label no-padding-right')) }}
                {{ Form::text('nombre',$provincia->nombre, array('placeholder' => 'Introduce el Titulo', 'class' => ' col-sm-9 form_control')) }}
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-12">
                {{ Form::label('idadmPro', 'idadmPro',array('class'=>'col-md-3 control-label no-padding-right')) }}
                {!! Form::select('idadmPro',$admPros,$admPro, $attributes = array('class'=>'col-md-9 chosen-single chosen-default','id'=>'idadmPro'))!!}
            </div>
        </div>
        <div class="row">        
            <div class="form-group  col-md-12">
                <button class="btn btn-warning" data-id="{{$provincia->idprovincia}}" id="btnAddPoblacion" name="btnAddPoblacion">
                    Añadir localidad
                </button>
            </div>
        </div>
       <div class="row">
                <div class="form-group" >
                        <div class="col-md-12"  id="cuerpo">
                            <div class="table-responsive" style="align-content: center;">
                                <table class="table table-striped table-bordered table-condensed table-hover">
                                    <thead>
                                        <th>
                                            Id Poblacion
                                        </th>
                                        <th>
                                            Nombre
                                        </th>
                                        <th>
                                            acciones
                                        </th>
                                    </thead>
                                    @foreach ($poblaciones as $pobla)
                                    <tr>
                                        <td>
                                            {{$pobla->idlocalidad}}
                                        </td>
                                        <td>
                                            {{$pobla->nombre}}
                                        </td>
                                        <td>
                                            <button class="editlocalidad btn btn-info" data-id="{{$pobla->idlocalidad}}" id="btnEditarPoblacion" name="btnEditarPoblacion">
                                                Editar
                                            </button>
                                            <button class="delete-modal btn btn-danger" data-id="{{$pobla->idlocalidad}}">
                                                Eliminar
                                            </button>
                                        </td>
                                    </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                </div>
        </div>
</div>
        <div class="modal-footer">        
                <button class="btn btn-primary" type="submit">
                    Guardar
                </button>

    {!!Form::close()!!}
                <a href="/admin/Provincia">
                    <button class="btn btn-default">
                        Volver
                    </button>
                </a>
        </div>
<div aria-hidden="true" class="modal fade modal-slide-in-right" id="mdlEditarPoblacion" role="dialog">
</div>
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
    function getLocalidades()
        {
            var url="{{URL::to('/admin/getPoblaciones')}}";
            $.ajax({
                type : 'get',
                url  : url+'?id='+{{$provincia->idprovincia}},
            }).done(function(data){
                $('#cuerpo').html(data);
            })
        }
     $(document).ready(function() {
            $("#widget-box-3").fadeIn();
            TweenMax.from("#widget-box-3", 0.4, { scale: 0, ease: Sine.easeInOut });
            TweenMax.to("#widget-box-3", 0.4, { scale: 1, ease: Sine.easeInOut });
            $('.modal').appendTo("body");
        });
        $('#btnAddPoblacion').on('click',function(e){
            e.preventDefault();
            $('#idprovioculto').val($(this).data('id'));
            $('.texto').val('');
            $('#Poblacion').modal('show');
        });
        $('#frmPoblacion').on('submit',function(e){
            e.preventDefault();
            var form=$('#frmPoblacion');
            var formData=form.serialize();
            var url="{{URL::to('/admin/nuevaPoblacion')}}";
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
                    getLocalidades();
                    $('#Poblacion').modal('hide');
                }

            }).fail(function(data){

                            })
        });

        $(document).on('click', '.editlocalidad', function(e){
            e.preventDefault();
            var url="{{URL::to('/admin/editarlocalidad')}}";
            var id=$(this).data('id')
            $.ajax({
                type:'post',
                url: url,
                data: {
                    'id': id
                },
                async: true,
                dataType: 'json',
                headers: {
                       'X-CSRF-TOKEN': '{{ csrf_token() }}',
                   },
                success:function(data){
                    $('#mdlEditarPoblacion').html(data);
                    $('#mdlEditarPoblacion').modal('show');
                }

            }).fail(function(data){

                            })
        });
        $('#mdlEditarPoblacion').on('submit',function(e){
            e.preventDefault();
            var url="{{URL::to('/admin/actualizarlocalidad')}}";
            var form=$('#frmEditPoblacion');
            var formData=form.serialize();
          $.ajax({
            type: 'post',
            url: url,
            data: formData,
            async: true,
            dataType: 'json',
            headers: {
                       'X-CSRF-TOKEN': '{{ csrf_token() }}',
                   },
            success: function(data) {
                getLocalidades();
            $('#mdlEditarPoblacion').modal('hide');
            }
          });
        });

        $(document).on('click', '.delete-modal', function(e){
            e.preventDefault();
            $('.id').text("");
            $('.id').text($(this).data('id'));
            $('#modal-delete').modal('show');
        });
        $('.modal-footer').on('click', '.delete', function(e) {
            e.preventDefault();
            var url="{{URL::to('/admin/eliminarlocalidad')}}";
          $.ajax({
            type: 'post',
            data: {
              'id': $('.id').text()
            },
            url: url,
            headers: {
                       'X-CSRF-TOKEN': '{{ csrf_token() }}',
                   },
            success: function(data) {
                getLocalidades();
            $('#modal-delete').modal('hide');
            }
          });
        });
</script>
@endsection
