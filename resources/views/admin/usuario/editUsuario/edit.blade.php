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
                    <?php $TituloVentana="Modificar Usuario" ?>
                    @include('layouts.includes.admin.ventanas.CabeceraVentana')
    {!!Form::model($usuario,['method'=>'PATCH','route'=>['Usuario.update',$usuario->id]])!!}
    <div class="row">
        <div class="form-group col-md-12">
            {{ Form::label('email', 'Dirección de E-mail',array('class'=>'col-md-3 control-label no-padding-right')) }}
      {{ Form::text('email', $usuario->email, array('placeholder' => 'Introduce tu E-mail', 'class' => ' col-sm-9 form_control')) }}
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-12">
            {{ Form::label('nombre', 'Nombre completo',array('class'=>'col-md-3 control-label no-padding-right')) }}
      {{ Form::text('nombre',$usuario->name, array('placeholder' => 'Introduce tu nombre', 'class' => ' col-sm-9 form_control')) }}
        </div>
    </div>
    {{ Form::button('Actualizar Usuario', array('type' => 'submit', 'class' => 'btn btn-primary')) }}    
  
{{ Form::close() }}
@include('admin.usuario.editUsuario.includes.edit'.$usuario->stringRol->nombre) 
                   @include('layouts.includes.admin.ventanas.PieVentana')
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

    $(document).ready(function() {
        $("#widget-box-3").fadeIn();
        TweenMax.from("#widget-box-3", 0.4, { scale: 0, ease: Sine.easeInOut });
        TweenMax.to("#widget-box-3", 0.4, { scale: 1, ease: Sine.easeInOut });
        $('.modal').appendTo("body");

    });
    </script>

@endsection
