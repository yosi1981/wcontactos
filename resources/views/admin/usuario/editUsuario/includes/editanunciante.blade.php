<h1>Modificar Usuario {{$usuario->stringRol->nombre}}</h1>

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
      @if ($usuario->DatosUsuario!=null)
      {{ Form::text('nombre',$usuario->DatosUsuario->nombre, array('placeholder' => 'Introduce tu nombre', 'class' => ' col-sm-9 form_control')) }}        
      @else
      {{ Form::text('nombre',null, array('placeholder' => 'Introduce tu nombre', 'class' => 'form-control')) }}        
      @endif
</div>
</div>
</div>
</div>
                                    <div class="modal-footer">
  {{ Form::button('Actualizar Anuncio', array('type' => 'submit', 'class' => 'btn btn-primary')) }}
                                    </div> 
{{ Form::close() }}