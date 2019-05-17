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
                    <?php $TituloVentana="Crear Anuncio" ?>
                    @include('layouts.includes.admin.ventanas.CabeceraVentana')

                    {{ Form::open(array('url' => '/admin/NuevoAnuncio','method'=>'POST'), array('role' => 'form','class'=>'form-horizontal')) }}
                <div class="row">
                        <div class="form-group col-md-12">
                            {{ Form::label('titulo', 'Titulo',array('class'=>'col-sm-3 control-label no-padding-right','for'=>'form-field-1-1')) }}
                                {{ Form::text('titulo',null, array('placeholder' => 'Introduce el Titulo', 'class' => ' col-sm-9 form_control')) }}
             
                        </div>
                </div>
                <div class="row">
                        <div class="form-group col-md-12">
                            {{ Form::label('descripcion', 'Descripcion',array('class'=>'col-md-3 control-label no-padding-right','for'=>'form-field-1')) }}
                                {{ Form::textarea('descripcion',null, array('placeholder' => 'Introduce la descripción', 'class' => 'col-xs-10 col-sm-9 limited','maxlength'=>'50')) }}
                        </div>
                </div>
                <div class="row">
                        <div class="form-group col-md-12">
                            {{ Form::label('fechainicio', 'Fecha Inicio',array('class'=>'col-md-3 control-label no-padding-right')) }}
                                {{ Form::input('date','fechainicio' , '2015-02-22', ['class'=>' col-md-9 datepicker ']) }}
                        </div>
                </div>
                <div class="row">
                        <div class="form-group col-md-12">
                            {{ Form::label('fechafinal', 'Fecha Final',array('class'=>'col-md-3 control-label no-padding-right')) }}
                                {{ Form::input('date','fechafinal' , '2015-02-22', ['class'=>'col-md-9 datepicker ']) }}
                        </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-12">
                        {{ Form::label('activo', 'Activo?',array('class'=>'col-md-3 control-label no-padding-right')) }}

                      {{Form::checkbox('activo', '0',false)}}

                    </div>
                </div>    
                <div class="row">
                        <div class="form-group col-md-12">
                                {{ Form::label('Sexo', 'Sexo',array('class'=>'col-md-3 control-label no-padding-right')) }}
                  {!! Form::select('idsexo',$sexos,null, $attributes = array('class'=>'col-md-9 chosen-single chosen-default','id'=>'idsexo')) !!}
                        </div>
                </div>
                <div class="row">
                        <div class="form-group col-md-12">
                                {{ Form::label('Pelo', 'Pelo',array('class'=>'col-md-3 control-label no-padding-right')) }}
                  {!! Form::select('idpelos',$pelos,null, $attributes = array('class'=>'col-md-9 chosen-single chosen-default','id'=>'idpelos')) !!}
                        </div>
                </div>
                <div class="row">
                        <div class="form-group col-md-12">
                                {{ Form::label('Ojos', 'Ojos',array('class'=>'col-md-3 control-label no-padding-right')) }}
                  {!! Form::select('idojos',$ojos,null, $attributes = array('class'=>'col-md-9 chosen-single chosen-default','id'=>'idojos')) !!}
                        </div>
                </div>
                <div class="row">
                        <div class="form-group col-md-12">
                                {{ Form::label('Estatura', 'Estatura',array('class'=>'col-md-3 control-label no-padding-right')) }}
                  {!! Form::select('idestatura',$estaturas,null, $attributes = array('class'=>'col-md-9 chosen-single chosen-default','id'=>'idestatura')) !!}
                        </div>
                </div>
                <div class="row">
                        <div class="form-group col-md-12">
                            {{ Form::label('idusuario', 'Id Usuario',array('class'=>'col-md-3 control-label no-padding-right')) }}
                                {!! Form::select('idusuario',$usuarios,null, $attributes = array('class'=>'col-md-9 chosen-single chosen-default')) !!}
                        </div>
                </div>
            </div>
            <div class="modal-footer">
                {{ Form::button('Crear Anuncio', array('type' => 'submit', 'class' => 'btn btn-primary')) }}
            </div>
            {{Form::close()}}
                    @include('layouts.includes.admin.ventanas.PieVentana')
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


    $(document).ready(function() {
        $("#widget-box-3").fadeIn();
        TweenMax.from("#widget-box-3", 0.4, { scale: 0, ease: Sine.easeInOut });
        TweenMax.to("#widget-box-3", 0.4, { scale: 1, ease: Sine.easeInOut });
        $('.modal').appendTo("body");

    });
    </script>
@endsection
