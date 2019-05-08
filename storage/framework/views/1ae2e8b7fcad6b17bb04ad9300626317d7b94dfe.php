<?php $__env->startSection('barraizda'); ?>
                <?php echo $__env->make('layouts.includes.'.Auth::user()->stringRol->nombre . '.barraizda', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('contenido'); ?>
<div class="main-content">
    <div class="main-content-inner">
        <div class="breadcrumbs ace-save-state" id="breadcrumbs">
        </div>
        <div class="page-content">
            <div class="row">
                <div class="col-xs-12">
                    <?php if(session()->has('msj')): ?>
                    <div class="alert alert-success">
                        <button aria-hidden="true" class="close" type="button">
                            ×
                        </button>
                        <span>
                            <b>
                                Exito -
                            </b>
                            <?php echo e(session('msj')); ?> ".alert-success"
                        </span>
                    </div>
                    <?php endif; ?>
                    <div class="tableefecto widget-box widget-color-blue ui-sortable-handle" id="widget-box-3">
                        <div class="widget-header widget-header-small">
                            <h6 class="widget-title">
                                <i class="ace-icon fa fa-table">
                                </i>
                                    Mi cuenta
                            </h6>
                        </div>
                        <div class="breadcrumbs ace-save-state" id="breadcrumbs">

                        </div>
                        <div class="widget-body" style="display: block;">
                            <div class="widget-main ">
    <?php echo Form::model($usuario,['method'=>'PATCH','route'=>['UsuarioA.update',$usuario->id]]); ?>

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


<?php echo $__env->make($usuario->stringRol->nombre.'.usuario.editUsuario.includes.edit'.$usuario->stringRol->nombre, array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> 

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin2', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>