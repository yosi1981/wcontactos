<?php $__env->startSection('barraizda'); ?>
                <?php echo $__env->make('layouts.includes.barraizda', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('contenido'); ?>
<h1>
    Modificar Usuario
</h1>
<div class="row">
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

      <?php echo e(Form::text('nombre',$usuario->name, array('placeholder' => 'Introduce tu nombre', 'class' => 'form-control'))); ?>

        </div>
    </div>
    <?php echo e(Form::button('Actualizar Usuario', array('type' => 'submit', 'class' => 'btn btn-primary'))); ?>    
  
<?php echo e(Form::close()); ?>


<?php echo $__env->make('admin.usuario.editUsuario.includes.edit'.$usuario->stringRol->nombre, array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> 

<?php $__env->stopSection(); ?>
</div>
<?php echo $__env->make('layouts.admin2', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>