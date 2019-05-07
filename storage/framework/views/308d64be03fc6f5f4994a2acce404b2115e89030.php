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

  <?php echo e(Form::button('Actualizar Anuncio', array('type' => 'submit', 'class' => 'btn btn-primary'))); ?>


<?php echo e(Form::close()); ?>

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
    </script>
    <?php $__env->stopSection(); ?>
</div>
<?php echo $__env->make('layouts.admin2', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>