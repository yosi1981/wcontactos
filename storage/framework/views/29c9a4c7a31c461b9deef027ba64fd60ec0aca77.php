<?php $__env->startSection('barraizda'); ?>
                <?php echo $__env->make('layouts.includes.barraizda', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('contenido'); ?>
<h1>
    Modificar Anuncio
</h1>
<div class="row">
    <?php echo Form::model($anuncio,['method'=>'PATCH','route'=>['Anuncio.update',$anuncio->idanuncio]]); ?>

    <div class="row">
        <div class="form-group col-md-4">
            <?php echo e(Form::label('titulo', 'Titulo')); ?>

      <?php echo e(Form::text('titulo', $anuncio->titulo, array('placeholder' => 'Introduce el Titulo', 'class' => 'form-control'))); ?>

        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-4">
            <?php echo e(Form::label('descripcion', 'Descripcion')); ?>

      <?php echo e(Form::text('descripcion', $anuncio->descripcion, array('placeholder' => 'Introduce la descripción', 'class' => 'form-control'))); ?>

        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-4">
            <?php echo e(Form::label('activo', 'Activo?')); ?>

      <?php if($anuncio->activo==1): ?>
          <?php echo e(Form::checkbox('activo', '1',true)); ?>

      <?php else: ?>
          <?php echo e(Form::checkbox('activo', '0',false)); ?>

      <?php endif; ?>
        </div>
    </div>
    <?php echo $__env->make('anunciante.anuncio.includes.ImagenesUsuarioAnuncio', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

  <?php echo e(Form::button('Actualizar Anuncio', array('type' => 'submit', 'class' => 'btn btn-primary'))); ?>


<?php echo e(Form::close()); ?>



<?php $__env->stopSection(); ?>
</div>
<?php echo $__env->make('layouts.admin2', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>