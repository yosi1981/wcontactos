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
                    <div class="tableefecto widget-box widget-color-blue ui-sortable-handle" id="widget-box-3">
                        <div class="widget-header widget-header-small">
                            <h6 class="widget-title">
                                <i class="ace-icon fa fa-table">
                                </i>
                                Crear Anuncio
                            </h6>
                        </div>
                        <div class="breadcrumbs ace-save-state" id="breadcrumbs">

                        </div>
                        <div class="widget-body" style="display: block;">
                            <div class="widget-main ">
                    <?php echo e(Form::open(array('url' => '/admin/NuevoAnuncio','method'=>'POST'), array('role' => 'form','class'=>'form-horizontal'))); ?>

                <div class="row">
                        <div class="form-group col-md-12">
                            <?php echo e(Form::label('titulo', 'Titulo',array('class'=>'col-sm-3 control-label no-padding-right','for'=>'form-field-1-1'))); ?>

                                <?php echo e(Form::text('titulo',null, array('placeholder' => 'Introduce el Titulo', 'class' => ' col-sm-9 form_control'))); ?>

             
                        </div>
                </div>
                <div class="row">
                        <div class="form-group col-md-12">
                            <?php echo e(Form::label('descripcion', 'Descripcion',array('class'=>'col-md-3 control-label no-padding-right','for'=>'form-field-1'))); ?>

                                <?php echo e(Form::textarea('descripcion',null, array('placeholder' => 'Introduce la descripción', 'class' => 'col-xs-10 col-sm-9 limited','maxlength'=>'50'))); ?>

                        </div>
                </div>
                <div class="row">
                        <div class="form-group col-md-12">
                            <?php echo e(Form::label('fechainicio', 'Fecha Inicio',array('class'=>'col-md-3 control-label no-padding-right'))); ?>

                                <?php echo e(Form::input('date','fechainicio' , '2015-02-22', ['class'=>' col-md-9 datepicker '])); ?>

                        </div>
                </div>
                <div class="row">
                        <div class="form-group col-md-12">
                            <?php echo e(Form::label('fechafinal', 'Fecha Final',array('class'=>'col-md-3 control-label no-padding-right'))); ?>

                                <?php echo e(Form::input('date','fechafinal' , '2015-02-22', ['class'=>'col-md-9 datepicker '])); ?>

                        </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-12">
                        <?php echo e(Form::label('activo', 'Activo?',array('class'=>'col-md-3 control-label no-padding-right'))); ?>


                      <?php echo e(Form::checkbox('activo', '0',false)); ?>


                    </div>
                </div>    
                <div class="row">
                        <div class="form-group col-md-12">
                                <?php echo e(Form::label('Sexo', 'Sexo',array('class'=>'col-md-3 control-label no-padding-right'))); ?>

                  <?php echo Form::select('idsexo',$sexos,null, $attributes = array('class'=>'col-md-9 chosen-single chosen-default','id'=>'idsexo')); ?>

                        </div>
                </div>
                <div class="row">
                        <div class="form-group col-md-12">
                                <?php echo e(Form::label('Pelo', 'Pelo',array('class'=>'col-md-3 control-label no-padding-right'))); ?>

                  <?php echo Form::select('idpelos',$pelos,null, $attributes = array('class'=>'col-md-9 chosen-single chosen-default','id'=>'idpelos')); ?>

                        </div>
                </div>
                <div class="row">
                        <div class="form-group col-md-12">
                                <?php echo e(Form::label('Ojos', 'Ojos',array('class'=>'col-md-3 control-label no-padding-right'))); ?>

                  <?php echo Form::select('idojos',$ojos,null, $attributes = array('class'=>'col-md-9 chosen-single chosen-default','id'=>'idojos')); ?>

                        </div>
                </div>
                <div class="row">
                        <div class="form-group col-md-12">
                                <?php echo e(Form::label('Estatura', 'Estatura',array('class'=>'col-md-3 control-label no-padding-right'))); ?>

                  <?php echo Form::select('idestatura',$estaturas,null, $attributes = array('class'=>'col-md-9 chosen-single chosen-default','id'=>'idestatura')); ?>

                        </div>
                </div>
                <div class="row">
                        <div class="form-group col-md-12">
                            <?php echo e(Form::label('idusuario', 'Id Usuario',array('class'=>'col-md-3 control-label no-padding-right'))); ?>

                                <?php echo Form::select('idusuario',$usuarios,null, $attributes = array('class'=>'col-md-9 chosen-single chosen-default')); ?>

                        </div>
                </div>
            </div>
            <div class="modal-footer">
                <?php echo e(Form::button('Crear Anuncio', array('type' => 'submit', 'class' => 'btn btn-primary'))); ?>

            </div>
            <?php echo e(Form::close()); ?>

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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin2', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>