<?php $__env->startSection('barraizda'); ?>
                <?php echo $__env->make('layouts.includes.'.Auth::user()->stringRol->nombre . '.barraizda', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('contenido'); ?>
    <?php echo $__env->make('admin.provincia.poblacion.modal-delete', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
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
                                Modificar Provincia
                            </h6>
                        </div>
                        <div class="breadcrumbs ace-save-state" id="breadcrumbs">

                        </div>
                        <div class="widget-body" style="display: block;">
                            <div class="widget-main ">
        <?php if(count($errors)>0): ?>
        <div class="alert alert-danger">
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li>
                    <?php echo e($error); ?>

                </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
        <?php endif; ?>
            <?php echo $__env->make('admin.provincia.poblacion.nuevaPoblacion', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

            <?php echo Form::model($provincia,['method'=>'PATCH','route'=>['Provincia.update',$provincia->idprovincia]]); ?>

            <?php echo e(Form::token()); ?>

        <div class="form-group">
            <label for="nombre">
                Nombre
            </label>
            <input class="form-control" name="nombre" placeholder="Nombre..." type="text" value="<?php echo e($provincia->nombre); ?>">
            </input>
        </div>
        <div class="form-group">
            <?php if($provincia->habilitado=='1'): ?>
                    <?php echo Form::checkbox('habilitado', '1',true); ?>

                <?php else: ?>
                    <?php echo Form::checkbox('habilitado', '0',false); ?>

                <?php endif; ?>
        </div>
        <div class="form-group">
            <label for="idresponsable">
                Delegado
            </label>
            <?php echo Form::select('iddelegado',$delegados,$delegado,$attributes = array('class'=>'form-control')); ?>

        </div>
        <div class="form-group">
            <label for="idresponsable">
                Administrador
            </label>
            <?php echo Form::select('idadmPro',$admPros,$admPro,$attributes = array('class'=>'form-control')); ?>

        </div>
        <div class="form-group">
            <button class="btn btn-success" type="submit">
                Guardar
            </button>

            <a href="Provincia">
                <button class="btn btn-info">
                    Volver
                </button>
            </a>
        </div>
        <?php echo Form::close(); ?>

    </div>
</div>
<div class="row">
        <div class="form-group" >
                <div class="col-lg-8 ccol-md-8 col-sm-8 col-xs-8" id="cuerpo">
                    <div class="table-responsive" style="align-content: center;">
                        <table class="table table-striped table-bordered table-condensed table-hover">
                            <thead>
                                <th>
                                    Id Poblacion
                                </th>
                                <th>
                                    Nombre
                                </th>
                                <th>
                                    acciones
                                </th>
                            </thead>
                            <?php $__currentLoopData = $poblaciones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pobla): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td>
                                    <?php echo e($pobla->idlocalidad); ?>

                                </td>
                                <td>
                                    <?php echo e($pobla->nombre); ?>

                                </td>
                                <td>
                                    <button class="editlocalidad btn btn-info" data-id="<?php echo e($pobla->idlocalidad); ?>" id="btnEditarPoblacion" name="btnEditarPoblacion">
                                        Editar
                                    </button>
                                    <button class="delete-modal btn btn-danger" data-id="<?php echo e($pobla->idlocalidad); ?>">
                                        Eliminar
                                    </button>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </table>
                    </div>
                </div>
        </div>
        <div class="form-group" >
                <button class="btn btn-warning" data-id="<?php echo e($provincia->idprovincia); ?>" id="btnAddPoblacion" name="btnAddPoblacion">
                    Nuevo
                </button>
        </div>
</div>
<div aria-hidden="true" class="modal fade modal-slide-in-right" id="mdlEditarPoblacion" role="dialog">
</div>
                            </div>
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
    function getLocalidades()
        {
            var url="<?php echo e(URL::to('/admin/getPoblaciones')); ?>";
            $.ajax({
                type : 'get',
                url  : url+'?id='+<?php echo e($provincia->idprovincia); ?>,
            }).done(function(data){
                $('#cuerpo').html(data);
            })
        }
     $(document).ready(function() {
            $("#widget-box-3").fadeIn();
            TweenMax.from("#widget-box-3", 0.4, { scale: 0, ease: Sine.easeInOut });
            TweenMax.to("#widget-box-3", 0.4, { scale: 1, ease: Sine.easeInOut });
            $('.modal').appendTo("body");
        });
        $('#btnAddPoblacion').on('click',function(){
            $('#idprovioculto').val($(this).data('id'));
            $('#Poblacion').modal('show');
        })
        $('#frmPoblacion').on('submit',function(e){
            e.preventDefault();
            var form=$('#frmPoblacion');
            var formData=form.serialize();
            var url="<?php echo e(URL::to('/admin/nuevaPoblacion')); ?>";
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
                    getLocalidades();
                    $('#Poblacion').modal('hide');
                }

            }).fail(function(data){

                            })
        })

        $(document).on('click', '.editlocalidad', function(){
            var url="<?php echo e(URL::to('/admin/editarlocalidad')); ?>";
            var id=$(this).data('id')
            $.ajax({
                type:'post',
                url: url,
                data: {
                    'id': id
                },
                async: true,
                dataType: 'json',
                headers: {
                       'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>',
                   },
                success:function(data){
                    $('#mdlEditarPoblacion').html(data);
                    $('#mdlEditarPoblacion').modal('show');
                }

            }).fail(function(data){

                            })
        })
        $('#mdlEditarPoblacion').on('submit',function(e){
            e.preventDefault();
            var url="<?php echo e(URL::to('/admin/actualizarlocalidad')); ?>";
            var form=$('#frmEditPoblacion');
            var formData=form.serialize();
          $.ajax({
            type: 'post',
            url: url,
            data: formData,
            async: true,
            dataType: 'json',
            headers: {
                       'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>',
                   },
            success: function(data) {
                getLocalidades();
            $('#mdlEditarPoblacion').modal('hide');
            }
          });
        });

        $(document).on('click', '.delete-modal', function(){
            $('.id').text("");
            $('.id').text($(this).data('id'));
            $('#modal-delete').modal('show');
        })
        $('.modal-footer').on('click', '.delete', function(e) {
            e.preventDefault();
            var url="<?php echo e(URL::to('/admin/eliminarlocalidad')); ?>";
          $.ajax({
            type: 'post',
            data: {
              'id': $('.id').text()
            },
            url: url,
            headers: {
                       'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>',
                   },
            success: function(data) {
                getLocalidades();
            $('#modal-delete').modal('hide');
            }
          });
        });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin2', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>