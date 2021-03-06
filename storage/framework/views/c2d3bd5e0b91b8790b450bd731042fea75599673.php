<h1>Modificar Usuario <?php echo e($usuario->stringRol->nombre); ?></h1>

<?php echo Form::model($usuario,['method'=>'PATCH','route'=>['Usuario.update',$usuario->id]]); ?>

 <div class="row">
    <div class="form-group col-md-4">
      <?php echo e(Form::label('email', 'Dirección de E-mail')); ?>

      <?php echo e(Form::text('email', $usuario->email, array('placeholder' => 'Introduce tu E-mail', 'class' => 'form-control'))); ?>

    </div>
  </div>
<div class="row">    
    <div class="form-group col-md-4">
      <?php echo e(Form::label('nombre', 'Nombre completo')); ?>

      <?php if($usuario->DatosUsuario!=null): ?>
      <?php echo e(Form::text('nombre',$usuario->DatosUsuario->nombre, array('placeholder' => 'Introduce tu nombre', 'class' => 'form-control'))); ?>        
      <?php else: ?>
      <?php echo e(Form::text('nombre',null, array('placeholder' => 'Introduce tu nombre', 'class' => 'form-control'))); ?>        
      <?php endif; ?>
  </div>
</div>
  <?php echo e(Form::button('Actualizar Usuario', array('type' => 'submit', 'class' => 'btn btn-primary'))); ?>    
  
<?php echo e(Form::close()); ?>