<h1>Modificar Usuario <?php echo e($usuario->stringRol->nombre); ?></h1>

<?php echo Form::model($usuario,['method'=>'PATCH','route'=>['Usuario.update',$usuario->id]]); ?>


            <div class="row">
    <div class="form-group col-md-12">
      <?php echo e(Form::label('email', 'Dirección de E-mail',array('class'=>'col-md-3 control-label no-padding-right'))); ?>

      <?php echo e(Form::text('email', $usuario->email, array('placeholder' => 'Introduce tu E-mail', 'class' => ' col-sm-9 form_control'))); ?>

    </div>
  </div>
<div class="row">    
    <div class="form-group col-md-12">
      <?php echo e(Form::label('nombre', 'Nombre completo',array('class'=>'col-md-3 control-label no-padding-right'))); ?>

      <?php if($usuario->DatosUsuario!=null): ?>
      <?php echo e(Form::text('nombre',$usuario->DatosUsuario->nombre, array('placeholder' => 'Introduce tu nombre', 'class' => ' col-sm-9 form_control'))); ?>        
      <?php else: ?>
      <?php echo e(Form::text('nombre',null, array('placeholder' => 'Introduce tu nombre', 'class' => 'form-control'))); ?>        
      <?php endif; ?>
</div>
</div>
</div>
</div>
                                    <div class="modal-footer">
  <?php echo e(Form::button('Actualizar Anuncio', array('type' => 'submit', 'class' => 'btn btn-primary'))); ?>

                                    </div> 
<?php echo e(Form::close()); ?>