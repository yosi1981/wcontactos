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
                    <?php echo $__env->make('admin.anuncio.includes.modalDelete', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                    <?php $TituloVentana="Modificar Anuncio" ?>
                    <?php echo $__env->make('layouts.includes.admin.ventanas.CabeceraVentana', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <?php echo Form::model($anuncio,['method'=>'PATCH','route'=>['Anuncio.update',$anuncio->idanuncio]]); ?>

               <div class="row">
                        <div class="form-group col-md-12">
                            <?php echo e(Form::label('titulo', 'Titulo',array('class'=>'col-sm-3 control-label no-padding-right','for'=>'form-field-1-1'))); ?>

                                <?php echo e(Form::text('titulo',$anuncio->titulo, array('placeholder' => 'Introduce el Titulo', 'class' => ' col-sm-9 form_control'))); ?>

             
                        </div>
                </div>
                <div class="row">
                        <div class="form-group col-md-12">
                            <?php echo e(Form::label('descripcion', 'Descripcion',array('class'=>'col-md-3 control-label no-padding-right','for'=>'form-field-1'))); ?>

                                <?php echo e(Form::textarea('descripcion',$anuncio->descripcion, array('placeholder' => 'Introduce la descripción', 'class' => 'col-xs-10 col-sm-9 limited','maxlength'=>'50'))); ?>

                        </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-12">
                        <?php echo e(Form::label('activo', 'Activo?',array('class'=>'col-md-3 control-label no-padding-right'))); ?>

                        <?php if($anuncio->activo==1): ?>
                              <?php echo e(Form::checkbox('activo', '1',true)); ?>

                        <?php else: ?>
                              <?php echo e(Form::checkbox('activo', '0',false)); ?>

                        <?php endif; ?>
                    </div>
                </div>    
                <div class="row">
                        <div class="form-group col-md-12">
                                <?php echo e(Form::label('Sexo', 'Sexo',array('class'=>'col-md-3 control-label no-padding-right'))); ?>

                  <?php echo Form::select('idsexo',$sexos,$anuncio->idsexo, $attributes = array('class'=>'col-md-9 chosen-single chosen-default','id'=>'idsexo')); ?>

                        </div>
                </div>
                <div class="row">
                        <div class="form-group col-md-12">
                                <?php echo e(Form::label('Pelo', 'Pelo',array('class'=>'col-md-3 control-label no-padding-right'))); ?>

                  <?php echo Form::select('idpelos',$pelos,$anuncio->idpelo, $attributes = array('class'=>'col-md-9 chosen-single chosen-default','id'=>'idpelos')); ?>

                        </div>
                </div>
                <div class="row">
                        <div class="form-group col-md-12">
                                <?php echo e(Form::label('Ojos', 'Ojos',array('class'=>'col-md-3 control-label no-padding-right'))); ?>

                  <?php echo Form::select('idojos',$ojos,$anuncio->idojos, $attributes = array('class'=>'col-md-9 chosen-single chosen-default','id'=>'idojos')); ?>

                        </div>
                </div>
                <div class="row">
                        <div class="form-group col-md-12">
                                <?php echo e(Form::label('Estatura', 'Estatura',array('class'=>'col-md-3 control-label no-padding-right'))); ?>

                  <?php echo Form::select('idestatura',$estaturas,$anuncio->idestatura, $attributes = array('class'=>'col-md-9 chosen-single chosen-default','id'=>'idestatura')); ?>

                        </div>
                </div>
               <div class="row">
                        <div class="form-group col-md-12">
                            <?php echo e(Form::label('idusuario', 'Id Usuario',array('class'=>'col-md-3 control-label no-padding-right'))); ?>

                                <?php echo Form::select('idusuario',$usuarios,$usu, $attributes = array('class'=>'col-md-9 chosen-single chosen-default')); ?>

                        </div>
                </div>
    <?php echo $__env->make('admin.anuncio.includes.ImagenesUsuarioAnuncio', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                            </div>
                                    <div class="modal-footer">
  <?php echo e(Form::button('Actualizar Anuncio', array('type' => 'submit', 'class' => 'btn btn-primary'))); ?>

                                    </div>
<?php echo e(Form::close()); ?>

                    <?php echo $__env->make('layouts.includes.admin.ventanas.PieVentana', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                </div>
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
        $('#Provincia').change(function(event) {
            event.preventDefault();
            $.get("/admin/getLocalidadesJSON/" + event.target.value + "",function(response){
              $('#Localidad').empty();

              $.each(response, function(i, item) {
                $('#Localidad').append("<option value='" + response[i].idlocalidad+"'>"+response[i].nombre+"</option");
              });

            });
          });
    $(document).ready(function() {
        $("#widget-box-3").fadeIn();
        TweenMax.from("#widget-box-3", 0.4, { scale: 0, ease: Sine.easeInOut });
        TweenMax.to("#widget-box-3", 0.4, { scale: 1, ease: Sine.easeInOut });
        $('.modal').appendTo("body");

    });
    </script>
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin2', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>