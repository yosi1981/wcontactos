<?php $__env->startSection('barraizda'); ?>
                <?php echo $__env->make('layouts.includes.'.Auth::user()->stringRol->nombre . '.barraizda', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('contenido'); ?>
<div aria-hidden="true" class="modal fade modal-slide-in-right" id="AnunProLoca" role="dialog">
</div>
<div aria-hidden="true" class="modal fade modal-slide-in-right" id="editAnunProLoca" role="dialog">
</div>
<div aria-hidden="true" class="modal fade modal-slide-in-right" id="deleteAnunProLoca" role="dialog">
</div>
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
                    <?php $TituloVentana="Modificar Anuncio Programado" ?>
                    <?php echo $__env->make('layouts.includes.admin.ventanas.CabeceraVentana', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php echo Form::model($anuncioP,['method'=>'PATCH','route'=>['AP.update',$anuncioP->idanuncio_programado]]); ?>

        <?php echo e(Form::token()); ?>

<div class="row">
    <div class="form-group col-md-12">
        <?php echo e(Form::label('titulo', 'Tituloasdf',array('class'=>'col-md-3 control-label no-padding-right'))); ?>

      <?php echo e(Form::text('titulo', $anuncioP->titulo, array('placeholder' => 'Introduce el Titulo', 'class' => 'col-sm-9 form_control'))); ?>

    </div>
</div>
<div class="row">
    <div class="form-group col-md-12">
        <?php echo e(Form::label('descripcion', 'Descripcion',array('class'=>'col-md-3 control-label no-padding-right'))); ?>

      <?php echo e(Form::text('descripcion', $anuncioP->descripcion, array('placeholder' => 'Introduce la descripción', 'class' => 'col-sm-9 form_control'))); ?>

    </div>
</div>
<div class="row">
    <div class="form-group col-md-12">
        <?php echo e(Form::label('Pelo', 'Pelo',array('class'=>'col-md-3 control-label no-padding-right'))); ?>

      <?php echo Form::select('idpelos',$pelos,$anuncioP->idpelos, $attributes = array('class'=>'col-md-9 chosen-single chosen-default','id'=>'idpelos')); ?>

    </div>
</div>
<div class="row">
    <div class="form-group col-md-12">
        <?php echo e(Form::label('Ojos', 'Ojos',array('class'=>'col-md-3 control-label no-padding-right'))); ?>

      <?php echo Form::select('idojos',$ojos,$anuncioP->idojos, $attributes = array('class'=>'col-md-9 chosen-single chosen-default','id'=>'idojos')); ?>

    </div>
</div>
<div class="row">
    <div class="form-group col-md-12">
        <?php echo e(Form::label('Estatura', 'Estatura',array('class'=>'col-md-3 control-label no-padding-right'))); ?>

      <?php echo Form::select('idestatura',$estaturas,$anuncioP->idestatura, $attributes = array('class'=>'col-md-9 chosen-single chosen-default','id'=>'idestatura')); ?>

    </div>
</div>
<div class="row">
    <div class="form-group col-md-12">
        <?php echo e(Form::label('fechainicio', 'Fecha Inicio',array('class'=>'col-md-3 control-label no-padding-right'))); ?>

      <?php echo e(Form::input('date','fechainicio' , $anuncioP->fechainicio, ['class'=>'datepicker col-md-9 ','min'=>'2018-12-20'])); ?>

    </div>
</div>
<div class="row">
    <div class="form-group col-md-12">
        <?php echo e(Form::label('fechafinal', 'Fecha Final',array('class'=>'col-md-3 control-label no-padding-right'))); ?>

     <?php echo e(Form::input('date','fechafinal' , $anuncioP->fechafinal, ['class'=>'datepicker col-md-9 ','min'=>'2018-12-20'])); ?>

    </div>
</div>
<div class="row">
    <div class="form-group col-md-12">
        <?php echo e(Form::label('Usuario', 'Usuario',array('class'=>'col-md-3 control-label no-padding-right'))); ?>

      <?php echo Form::select('idusuario',$usuarios,$usu, $attributes = array('class'=>'col-md-9 chosen-single chosen-default','id'=>'Provincia')); ?>

    </div>
</div>
<div class="row">
    <div class="form-group col-md-12" >
                                    <div class="col-md-3">
                                    </div>
                                    <label class="col-md-9" style="padding-left:  0px;">
        <?php if($anuncioP->activo==0): ?>
          <?php echo e(Form::checkbox('activo', 0,true,array('class'=>'ace'))); ?>

        <?php else: ?>
          <?php echo e(Form::checkbox('activo', 1,false,array('class'=>'ace'))); ?>

        <?php endif; ?>
                                      <span class="lbl " > Mostrar mensaje "ULTIMO DIA"</span>
                                    </label>
    </div>
</div>
<div class="row">
    <div class="form-group col-md-12" >
                                    <div class="col-md-3">
                                    </div>
                                    <label class="col-md-9" style="padding-left:  0px;">
        <?php if($anuncioP->activo==0): ?>
          <?php echo e(Form::checkbox('activo', 0,true,array('class'=>'ace'))); ?>

        <?php else: ?>
          <?php echo e(Form::checkbox('activo', 1,false,array('class'=>'ace'))); ?>

        <?php endif; ?>
                                      <span class="lbl " > Mostrar mensaje "ULTIMO DIA"</span>
                                    </label>
    </div>
</div>


<div class="row">
    <div class="form-group col-md-12">
        <button class="btn btn-warning" data-id="<?php echo e($anuncioP->idanuncio_programado); ?>" id="btnAddAnunProLocal" name="btnAddAnunProLocal">
            Añadir localidad
        </button>
    </div>
</div>
<div class="row">
    <div class="form-group">
      <div class="col-md-12" id="cuerpoapls">
      </div>
    </div>
</div>
</div>
        <div class="modal-footer">        
                <button class="btn btn-primary" type="submit">
                    Guardar
                </button>

                <a href="Promocion">
                    <button class="btn btn-default">
                        Volver
                    </button>
                </a>
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



    function getLocalidadesAP()
        {
            var url="<?php echo e(URL::to('/admin/getAnunciosProLocal')); ?>"+"/"+"<?php echo e($anuncioP->idanuncio_programado); ?>";
            $.ajax({
                type : 'get',
                url  : url,
            }).done(function(data){
                $('#cuerpoapls').html(data);
            })
        }

        $(document).ready(function() {
            $("#widget-box-3").fadeIn();
            TweenMax.from("#widget-box-3", 0.4, { scale: 0, ease: Sine.easeInOut });
            TweenMax.to("#widget-box-3", 0.4, { scale: 1, ease: Sine.easeInOut });
            $('.modal').appendTo("body");
            getLocalidadesAP();
        });

          $('#btnAddAnunProLocal').on('click',function(e){
                    e.preventDefault();
            var url="<?php echo e(URL::to('/admin/createAnunProLoca')); ?>" + "/" + $(this).data('id') ;
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

                            })});

      $(document).on('click','.editlocalidadAP',function(e){
           e.preventDefault();
           var url="<?php echo e(URL::to('/admin/getAnuncioProLocal')); ?>"+"/"+$(this).data('id');
            $.ajax({
                type : 'get',
                url  : url,
            }).done(function(data){
                $('#editAnunProLoca').html(data);
                $('#editAnunProLoca').modal('show');
            })
      });
      $(document).on('click','.deleteAPpre',function(e){
        e.preventDefault();
           var url="<?php echo e(URL::to('/admin/deleteAPLpre')); ?>"+"/"+$(this).data('id');
            $.ajax({
                type : 'get',
                url  : url,
            }).done(function(data){
                $('#deleteAnunProLoca').html(data);
                $('#deleteAnunProLoca').modal('show');
            })
      });
     $(document).on('click','.deleteAPLpost',function(e){
      e.preventDefault();
           var url="<?php echo e(URL::to('/admin/deleteAPLpost')); ?>"+"/"+$(this).data('id');
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
            var url="<?php echo e(URL::to('/admin/nuevoAnuncioProLocal')); ?>";
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
      
     $(document).on('click', '.EditProblacion', function(e){
      e.preventDefault();
            var form=$('#frmeditAnunProLoca');
            var formData=form.serialize();
            var url="<?php echo e(URL::to('/admin/UpdateAPL')); ?>";
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