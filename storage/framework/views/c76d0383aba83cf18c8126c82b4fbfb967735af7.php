<?php $__env->startSection('barraizda'); ?>
                <?php echo $__env->make('layouts.includes.'.Auth::user()->stringRol->nombre . '.barraizda', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('contenido'); ?>
<div class="main-content-inner">
    <div class="breadcrumbs ace-save-state" id="breadcrumbs">
    </div>
    <div class="page-content">
        <div class="page-header">
            <h1>
                Usuario
                <small>
                    <i class="ace-icon fa fa-angle-double-right">
                    </i>
                    crear Nuevo Usuario
                </small>
            </h1>
        </div>
        <!-- /.page-header -->
        <div class="row">
            <div class="col-xs-12">
                <?php echo e(Form::open(array('url' => '/NuevoUsuario','method'=>'POST','class'=>'form-horizontal'), array('role' => 'form'))); ?>

                <div class="form-group ">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-3">
                        Email
                    </label>
                    <div class="col-sm-9">
                        <?php echo e(Form::text('email', null, array( 'class' => 'col-xs-10 col-sm-5'))); ?>

                    </div>
                </div>
                <div class="form-group ">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-3">
                        Nombre
                    </label>
                    <div class="col-sm-9">
                        <?php echo e(Form::text('nombre', null, array( 'class' => 'col-xs-10 col-sm-5'))); ?>

                    </div>
                </div>
                <div class="form-group ">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-3">
                        Contraseña
                    </label>
                    <div class="col-sm-9">
                        <?php echo e(Form::password('password', array('class' => 'col-xs-10 col-sm-5'))); ?>

                    </div>
                </div>
                <div class="form-group ">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-3">
                        Repetir Contraseña
                    </label>
                    <div class="col-sm-9">
                        <?php echo e(Form::password('password_confirmation', array('class' => 'col-xs-10 col-sm-5'))); ?>

                    </div>
                </div>
                <div class="form-group ">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-3">
                        Tipo Usuario
                    </label>
                    <div class="col-sm-9">
                        <?php echo Form::select('idTipousuario',$TiposUsuario,null, $attributes = array('class'=>'col-xs-10 col-sm-5')); ?>

                    </div>
                </div>
            </div>
            <?php echo e(Form::button('Crear usuario', array('type' => 'submit', 'class' => 'btn btn-primary'))); ?>


<?php echo e(Form::close()); ?>

        </div>
        <?php $__env->stopSection(); ?>
    </div>
</div>
<?php echo $__env->make('layouts.admin2', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>