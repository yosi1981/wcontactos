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
                                Modificar Anuncio
                            </h6>
                        </div>
                        <div class="breadcrumbs ace-save-state" id="breadcrumbs">

                        </div>
                        <div class="widget-body" style="display: block;">
                            <div class="widget-main ">
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
    <div class="row">
        <div class="form-group col-md-4">
            <?php echo e(Form::label('Pelo', 'Pelo')); ?>

      <?php echo Form::select('idpelos',$pelos,$anuncio->idpelo, $attributes = array('class'=>'form-control','id'=>'idpelos')); ?>

        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-4">
            <?php echo e(Form::label('Ojos', 'Ojos')); ?>

      <?php echo Form::select('idojos',$ojos,$anuncio->idojos, $attributes = array('class'=>'form-control','id'=>'idojos')); ?>

        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-4">
            <?php echo e(Form::label('Estatura', 'Estatura')); ?>

      <?php echo Form::select('idestatura',$estaturas,$anuncio->idestatura, $attributes = array('class'=>'form-control','id'=>'idestatura')); ?>

        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-4">
            <?php echo e(Form::label('Usuario', 'Usuario')); ?>

      <?php echo Form::select('idusuario',$usuarios,$usu, $attributes = array('class'=>'form-control','id'=>'Provincia')); ?>

        </div>
    </div>
    <?php echo $__env->make('admin.anuncio.includes.ImagenesUsuarioAnuncio', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                            </div>
                                    <div class="modal-footer">
  <?php echo e(Form::button('Actualizar Anuncio', array('type' => 'submit', 'class' => 'btn btn-primary'))); ?>

                                    </div>
<?php echo e(Form::close()); ?>

                        </div>
                    </div>
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