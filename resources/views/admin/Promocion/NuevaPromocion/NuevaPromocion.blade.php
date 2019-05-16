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
                    <?php $TituloVentana="Crear Promocion" ?>
                    @include('layouts.includes.admin.ventanas.CabeceraVentana')

            {{ Form::open(array('url' => '/admin/NuevaPromocion','method'=>'POST'), array('role' => 'form','class'=>'form-horizontal')) }}
                <div class="row">
                        <div class="form-group col-md-12">
                            {{ Form::label('descripcion', 'Descripcion',array('class'=>'col-md-3 control-label no-padding-right','for'=>'form-field-1')) }}
                                {{ Form::textarea('descripcion',null, array('placeholder' => 'Introduce la descripción', 'class' => ' col-sm-9 limited','maxlength'=>'50')) }}
                        </div>
                </div>
               <div class="row">
            <div class="form-group col-md-12">
                {{ Form::label('dias', 'Dias',array('class'=>'col-sm-3 control-label no-padding-right')) }}
                    {{ Form::text('dias',null, array('placeholder' => 'Introduce los dias', 'class' => ' col-sm-9 form_control')) }}
            </div>
                </div>
               <div class="row">
            <div class="form-group col-md-12">
                {{ Form::label('importe', 'Importe',array('class'=>'col-sm-3 control-label no-padding-right')) }}
                    {{ Form::text('importe',null, array('placeholder' => 'Introduce el importe', 'class' => 'col-sm-9 form_control ')) }}
            </div>
                </div>
               <div class="row">
            <div class="form-group col-md-12">
                {{ Form::label('fecha_inicio', 'Fecha Inicio',array('class'=>'col-md-3 control-label no-padding-right')) }}
                    {{ Form::input('date','fecha_inicio' , '2015-02-22', ['class'=>'datepicker  col-md-9 ','min'=>'2018-12-20']) }}
            </div>
                </div>
               <div class="row">
            <div class="form-group col-md-12">
                {{ Form::label('fecha_fin', 'Fecha Final',array('class'=>'col-md-3 control-label no-padding-right')) }}
                    {{ Form::input('date','fecha_fin' , '2015-02-22', ['class'=>'datepicker col-md-9 ','min'=>'2018-12-20']) }}
            </div>
                </div>
                </div>
                        <div class="modal-footer">
                            {{ Form::button('Crear Promocion', array('type' => 'submit', 'class' => 'btn btn-primary')) }}
                        </div>
            {{Form::close()}}
                    @include('layouts.includes.admin.ventanas.PieVentana')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
