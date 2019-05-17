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
                    <?php $TituloVentana="Modificar Promocion" ?>
                    @include('layouts.includes.admin.ventanas.CabeceraVentana')
    {!!Form::model($promocion,['method'=>'PATCH','route'=>['Promocion.update',$promocion->id]])!!}

   
                <div class="row">
                        <div class="form-group col-md-12">
                            {{ Form::label('descripcion', 'Descripcion',array('class'=>'col-md-3 control-label no-padding-right','for'=>'form-field-1')) }}
                                {{ Form::textarea('descripcion',$promocion->descripcion, array('placeholder' => 'Introduce la descripción', 'class' => ' col-sm-9 limited','maxlength'=>'50')) }}
                        </div>
                </div>
               <div class="row">
            <div class="form-group col-md-12">
                {{ Form::label('dias', 'Dias',array('class'=>'col-sm-3 control-label no-padding-right')) }}
                    {{ Form::text('dias',$promocion->dias, array('placeholder' => 'Introduce los dias', 'class' => ' col-sm-9 form_control')) }}
            </div>
                </div>
               <div class="row">
            <div class="form-group col-md-12">
                {{ Form::label('importe', 'Importe',array('class'=>'col-sm-3 control-label no-padding-right')) }}
                    {{ Form::text('importe',$promocion->importe, array('placeholder' => 'Introduce el importe', 'class' => 'col-sm-9 form_control ')) }}
            </div>
                </div>
               <div class="row">
            <div class="form-group col-md-12">
                <?php 
                    $arr = explode(" ", $promocion->fecha_inicio); // creamos un array donde cada 'palabra' es un token 
                ?>
                {{ Form::label('fecha_inicio', 'Fecha Inicio',array('class'=>'col-md-3 control-label no-padding-right')) }}
                    {{ Form::input('date','fecha_inicio' , $arr[0], ['class'=>'datepicker  col-md-9 ','min'=>'2018-12-20']) }}
            </div>
                </div>
               <div class="row">
            <div class="form-group col-md-12">
                <?php 
                    $arr = explode(" ", $promocion->fecha_fin); // creamos un array donde cada 'palabra' es un token 
                ?>
                {{ Form::label('fecha_fin', 'Fecha Final',array('class'=>'col-md-3 control-label no-padding-right')) }}
                    {{ Form::input('date','fecha_fin' , $arr[0], ['class'=>'datepicker col-md-9 ','min'=>'2018-12-20']) }}
            </div>
                </div>
                </div>
                        <div class="modal-footer">
                            {{ Form::button('Guardar', array('type' => 'submit', 'class' => 'btn btn-primary')) }}
                        </div>
            {{Form::close()}}
                    @include('layouts.includes.admin.ventanas.PieVentana')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
