<?php $__env->startSection('barraizda'); ?>
                <?php echo $__env->make('layouts.includes.'.Auth::user()->stringRol->nombre . '.barraizda', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('contenido'); ?>
<h1>
    Crear Anuncio
</h1>
<div class="row">
    <?php echo e(Form::open(array('url' => '/NuevoAnuncio','method'=>'POST'), array('role' => 'form'))); ?>

    <div class="row">
        <div class="form-group col-md-4">
            <?php echo e(Form::label('titulo', 'Titulo')); ?>

      <?php echo e(Form::text('titulo', null, array('placeholder' => 'Introduce el Titulo', 'class' => 'form-control'))); ?>

        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-4">
            <?php echo e(Form::label('descripcion', 'Descripcion')); ?>

      <?php echo e(Form::text('descripcion',null, array('placeholder' => 'Introduce la descripción', 'class' => 'form-control'))); ?>

        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-4">
            <?php echo e(Form::label('fechainicio', 'Fecha Inicio')); ?>

      <?php echo e(Form::input('date','fechainicio' , '2015-02-22', ['class'=>'datepicker form-control'])); ?>

        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-4">
            <?php echo e(Form::label('fechafinal', 'Fecha Final')); ?>

      <?php echo e(Form::input('date','fechafinal' , '2015-02-22', ['class'=>'datepicker form-control'])); ?>

        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-4">
            <?php echo e(Form::label('activo', 'Activo?')); ?>

      <?php echo e(Form::checkbox('activo', '1',true)); ?>

        </div>
    </div>
    <div class="row" type="hidden">
        <div class="form-group col-md-4">
            <?php echo e(Form::label('idusuario', 'Id Usuario')); ?>

      <?php echo e(Form::label('idusuario', Auth::user()->id )); ?>

        </div>
    </div>
    <?php echo e(Form::button('Crear Anuncio', array('type' => 'submit', 'class' => 'btn btn-primary'))); ?>


<?php echo e(Form::close()); ?>


<?php $__env->stopSection(); ?>
</div>
<?php echo $__env->make('layouts.admin2', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>