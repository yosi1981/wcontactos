<?php $__env->startSection('barraizda'); ?>
                <?php echo $__env->make('layouts.includes.barraizda', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('contenido'); ?>
<div aria-hidden="true" class="modal fade modal-slide-in-right" id="AnunProLoca" role="dialog">
</div>
<div aria-hidden="true" class="modal fade modal-slide-in-right" id="editAnunProLoca" role="dialog">
</div>
<div aria-hidden="true" class="modal fade modal-slide-in-right" id="deleteAnunProLoca" role="dialog">
</div>
<h1>
    Modificar Anuncio PROGRAMADO
</h1>
<?php echo Form::model($anuncioP,['method'=>'PATCH','route'=>['AP.update',$anuncioP->idanuncio_programado]]); ?>

<div class="row">
    <div class="form-group col-md-4">
        <?php echo e(Form::label('titulo', 'Tituloasdf')); ?>

      <?php echo e(Form::text('titulo', $anuncioP->titulo, array('placeholder' => 'Introduce el Titulo', 'class' => 'form-control'))); ?>

    </div>
</div>
<div class="row">
    <div class="form-group col-md-4">
        <?php echo e(Form::label('descripcion', 'Descripcion')); ?>

      <?php echo e(Form::text('descripcion', $anuncioP->descripcion, array('placeholder' => 'Introduce la descripción', 'class' => 'form-control'))); ?>

    </div>
</div>
<div class="row">
    <div class="form-group col-md-4">
        <?php echo e(Form::label('fechainicio', 'Fecha Inicio')); ?>

      <?php echo e(Form::input('date','fechainicio' , $anuncioP->fechainicio, ['class'=>'datepicker form-control'])); ?>

    </div>
</div>
<div class="row">
    <div class="form-group col-md-4">
        <?php echo e(Form::label('fechafinal', 'Fecha Final')); ?>

     <?php echo e(Form::input('date','fechafinal' , $anuncioP->fechafinal, ['class'=>'datepicker form-control'])); ?>

    </div>
</div>
<div class="row">
    <div class="form-group col-md-4">
        <?php echo e(Form::label('activo', 'Activo?')); ?>

      <?php if($anuncioP->activo==1): ?>
          <?php echo e(Form::checkbox('activo', '1',true)); ?>

      <?php else: ?>
          <?php echo e(Form::checkbox('activo', '0',false)); ?>

      <?php endif; ?>
    </div>
</div>
<?php echo e(Form::button('Actualizar Anuncio', array('type' => 'submit', 'class' => 'btn btn-primary'))); ?>


<?php echo e(Form::close()); ?>

<div id="cuerpoapls">
</div>
<button class="btn btn-warning" data-id="<?php echo e($anuncioP->idanuncio_programado); ?>" id="btnAddAnunProLocal" name="AnunProLoca">
    Nuevo
</button>
<script>
    function getLocalidadesAP()
        {
            var url="<?php echo e(URL::to('/anunciante/getAnunciosProLocal')); ?>"+"/"+"<?php echo e($anuncioP->idanuncio_programado); ?>";
            $.ajax({
                type : 'get',
                url  : url,
            }).done(function(data){
                $('#cuerpoapls').html(data);
            })
        }

  $(document).ready(function() {
        $('.modal').appendTo("body");
        getLocalidadesAP();
        });

          $('#btnAddAnunProLocal').on('click',function(){

            var url="<?php echo e(URL::to('/anunciante/createAnunProLoca')); ?>" + "/" + $(this).data('id') ;
            $.ajax({
                type:'get',
                url: url,
                async: true,
                dataType: 'json',
                headers: {
                       'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>',
                   },
                success:function(data){
                    $('#AnunProLoca').html(data);

                    $('#AnunProLoca').modal('show');
                }

            }).fail(function(data){

                            })})

      $(document).on('click','.editlocalidadAP',function(){
           var url="<?php echo e(URL::to('/anunciante/getAnuncioProLocal')); ?>"+"/"+$(this).data('id');
            $.ajax({
                type : 'get',
                url  : url,
            }).done(function(data){
                $('#editAnunProLoca').html(data);
                $('#editAnunProLoca').modal('show');
            })
      });
      $(document).on('click','.deleteAPpre',function(){
           var url="<?php echo e(URL::to('/anunciante/deleteAPLpre')); ?>"+"/"+$(this).data('id');
            $.ajax({
                type : 'get',
                url  : url,
            }).done(function(data){
                $('#deleteAnunProLoca').html(data);
                $('#deleteAnunProLoca').modal('show');
            })
      });
     $(document).on('click','.deleteAPLpost',function(){
           var url="<?php echo e(URL::to('/anunciante/deleteAPLpost')); ?>"+"/"+$(this).data('id');
            $.ajax({
                type : 'get',
                url  : url,
            }).done(function(data){
              getLocalidadesAP();
                $('#deleteAnunProLoca').modal('hide');
            })
      });
      $(document).on('click', '.guardar', function(){
            var form=$('#frmAnunProLoca');
            var formData=form.serialize();
            var url="<?php echo e(URL::to('/anunciante/nuevoAnuncioProLocal')); ?>";
            $.ajax({
                type:'post',
                url: url,
                data: formData,
                async: true,
                dataType: 'json',
                headers: {
                       'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>',
                   },
                success:function(data){
                  getLocalidadesAP();
                    $('#AnunProLoca').modal('hide');
                }

            }).fail(function(data){

                            })
        });
     $(document).on('click', '.EditProblacion', function(){
            var form=$('#frmeditAnunProLoca');
            var formData=form.serialize();
            var url="<?php echo e(URL::to('/anunciante/UpdateAPL')); ?>";
            $.ajax({
                type:'post',
                url: url,
                data: formData,
                async: true,
                dataType: 'json',
                headers: {
                       'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>',
                   },
                success:function(data){
                  getLocalidadesAP();
                    $('#editAnunProLoca').modal('hide');
                }

            }).fail(function(data){

                            })
        });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin2', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>