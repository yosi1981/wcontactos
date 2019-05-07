<?php $__env->startSection('barraizda'); ?>
                <?php echo $__env->make('layouts.includes.barraizda', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('contenido'); ?>
<h1>
    Crear Anuncio
</h1>
<div class="page-content">
    <div class="row">
        <div class="col-xs-12">
            <?php echo e(Form::open(array('url' => 'NuevoAnuncio','method'=>'POST'), array('role' => 'form','class'=>'form-horizontal'))); ?>

            <div class="form-group">
                <?php echo e(Form::label('titulo', 'Titulo',array('class'=>'col-sm-3 control-label no-padding-right','for'=>'form-field-1-1'))); ?>

                <div class="col-sm-9">
                    <?php echo e(Form::text('titulo',null, array('placeholder' => 'Introduce el Titulo', 'class' => 'form_control'))); ?>

                </div>
            </div>
            <div class="form-group">
                <?php echo e(Form::label('descripcion', 'Descripcion',array('class'=>'col-sm-3 control-label no-padding-right','for'=>'form-field-1'))); ?>

                <div class="col-sm-9">
                    <?php echo e(Form::textarea('descripcion',null, array('placeholder' => 'Introduce la descripción', 'class' => 'col-xs-10 col-sm-5 limited','maxlength'=>'50'))); ?>

                </div>
            </div>
            <div class="form-group">
                <?php echo e(Form::label('fechainicio', 'Fecha Inicio',array('class'=>'col-sm-3 control-label no-padding-right'))); ?>

                <div class="col-sm-9">
                    <?php echo e(Form::input('date','fechainicio' , '2015-02-22', ['class'=>'datepicker form-control'])); ?>

                </div>
            </div>
            <div class="form-group">
                <?php echo e(Form::label('fechafinal', 'Fecha Final',array('class'=>'col-sm-3 control-label no-padding-right'))); ?>

                <div class="col-sm-9">
                    <?php echo e(Form::input('date','fechafinal' , '2015-02-22', ['class'=>'datepicker form-control'])); ?>

                </div>
            </div>
            <div class="form-group">
                <?php echo e(Form::label('activo','¿Esta Activo?',array('class'=>'col-sm-3 control-label no-padding-right'))); ?>

                <div class="col-sm-9">
                    <input class="ace ace-switch ace-switch-6" name="activo" type="checkbox">
                        <span class="lbl">
                        </span>
                    </input>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-4">
                    <?php echo e(Form::label('Pelo', 'Pelo')); ?>

      <?php echo Form::select('idpelos',$pelos,null, $attributes = array('class'=>'form-control','id'=>'idpelos')); ?>

                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-4">
                    <?php echo e(Form::label('Ojos', 'Ojos')); ?>

      <?php echo Form::select('idojos',$ojos,null, $attributes = array('class'=>'form-control','id'=>'idojos')); ?>

                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-4">
                    <?php echo e(Form::label('Estatura', 'Estatura')); ?>

      <?php echo Form::select('idestatura',$estaturas,null, $attributes = array('class'=>'form-control','id'=>'idestatura')); ?>

                </div>
            </div>
            <div class="form-group">
                <?php echo e(Form::label('idusuario', 'Id Usuario',array('class'=>'col-sm-3 control-label no-padding-right'))); ?>

                <div class="col-sm-9">
                    <?php echo Form::select('idusuario',$usuarios,null, $attributes = array('class'=>'chosen-single chosen-default')); ?>

                </div>
            </div>
            <div class="form-group">
                <?php echo e(Form::button('Crear Anuncio', array('type' => 'submit', 'class' => 'btn btn-primary'))); ?>

            </div>
            <?php echo e(Form::close()); ?>

        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin2', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>