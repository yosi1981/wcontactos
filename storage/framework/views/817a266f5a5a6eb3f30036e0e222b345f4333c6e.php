<?php $__env->startSection('barraizda'); ?>
                <?php echo $__env->make('layouts.includes.'.Auth::user()->stringRol->nombre . '.barraizda', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('contenido'); ?>
<div class="main-content">
    <div class="main-content-inner">
        <div class="breadcrumbs ace-save-state" id="breadcrumbs">
        </div>
        <div class="page-content">
 <?php echo $__env->make('admin.Promocion.includes.modal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>            
            <div class="tableefecto widget-box widget-color-blue ui-sortable-handle" id="widget-box-3">
                <div class="widget-header widget-header-small">
                    <h6 class="widget-title">
                        <i class="ace-icon fa fa-sort">
                        </i>
                        Información de las Promociones
                    </h6>
                </div>
                        <div class="breadcrumbs ace-save-state" id="breadcrumbs">
                            <a href="<?php echo e(URL::to('/admin/CrearPromocion')); ?>" padding-left="15px">
                                <button class="btn btn-xs btn-white btn-default btn-round" id="btnAddProvincia" name="btnAddProvincia">
                                    <i class="ace-icon fa fa-times red2">
                                    </i>
                                    Crear Promocion
                                </button>
 
                            </a>
                        </div>
                <div class="widget-body" style="display: block;">
                                <div class="table-responsive" id="cuerpo" name="cuerpo">
                                    <div class="card">
                                        <div class="table-responsive">
                    <div class="widget-main">
                        <table class="table table-bordered table-hover" id="simple-table">
                            <thead>
                                <th>
                                    Id
                                </th>
                                <th class="detail-col">
                                    Descripcion
                                </th>
                                <th>
                                    Dias
                                </th>
                                <th>
                                    Importe
                                </th>
                                <th>
                                    Fecha Inicio
                                </th>
                                <th>
                                    Fecha Final
                                </th>
                                <th>
                                    Compras
                                </th>
                                <th>
                                    Estado
                                </th>
                                <th>
                                    Opciones
                                </th>
                            </thead>
                            <tbody>
                                <?php if(count($promociones)>0): ?>
                <?php $__currentLoopData = $promociones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $promocion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td>
                                        <?php echo e($promocion->id); ?>

                                    </td>
                                    <td>
                                        <?php echo e($promocion->descripcion); ?>

                                    </td>
                                    <td>
                                        <?php echo e($promocion->dias); ?>

                                    </td>
                                    <td>
                                        <?php echo e($promocion->importe); ?>

                                    </td>
                                    <td>
                                        <?php echo e($promocion->fecha_inicio); ?>

                                    </td>
                                    <td>
                                        <?php echo e($promocion->fecha_fin); ?>

                                    </td>
                                    <td>
                                        <?php echo e($promocion->numcompras); ?>

                                    </td>
                                    <td>
                                        <?php echo e($promocion->status); ?>

                                    </td>
                                    <td>
                        <button class="btn btn-sm btn-success">
                            <a href="<?php echo e(URL::action('PromocionController@edit',$promocion->id)); ?>">
                                <i class="ace-icon fa fa-pencil bigger-120">
                                </i>
                            </a>
                        </button>                                            
                                                            <?php if($promocion->status==1): ?>
                                                            <button class="delete-modal btn btn-sm btn-danger" data-id="<?php echo e($promocion->id); ?>">
                                                                DESHABILITAR
                                                            </button>
                                                            <?php else: ?>
                                                            <button class="delete-modal btn btn-sm btn-success" data-id="<?php echo e($promocion->id); ?>">
                                                                HABILITAR
                                                            </button>
                                                            <?php endif; ?>
                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php else: ?>
                                <tr>
                                    <td colspan="7">
                                        NO hay ninguna promocion que mostrar
                                    </td>
                                </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                        <?php echo e($promociones->links()); ?>

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
<script type="text/javascript">
    $(document).ready(function() {
        $("#widget-box-3").fadeIn();
        TweenMax.from("#widget-box-3", 0.4, { scale: 0, ease: Sine.easeInOut });
        TweenMax.to("#widget-box-3", 0.4, { scale: 1, ease: Sine.easeInOut });
    });

    $(document).on('click','.pagination a',function(e){
        e.preventDefault();
        var page=$(this).attr('href').split('page=')[1];
        getPromociones(page);
    })

    function getPromociones(page)
    {
        var url="<?php echo e(URL::to('/admin/searchPromocion')); ?>";
        $.ajax({
            type : 'get',
            url  : url+'?page='+page,
        }).done(function(data){
            $('#cuerpo').html(data);
        })
    }

        $(document).on('click', '.delete-modal', function(){
            $('.id').text($(this).data('id'));
            var ask=$(this).text();
            if(ask.trim() == "HABILITAR")
            {
                $('.modal-title').text("DESHABILITAR");                
                $('.texto').text("¿Desea Deshabilitar la Promoción?");
            }
            else
            {
                $('.modal-title').text("HABILITAR");                
                $('.texto').text("¿Desea Habilitar la Promoción?");
            }
            $('#modal-delete').modal('show');
        })
        $('.modal-footer').on('click', '.delete', function(e) {
            e.preventDefault();
            var url="<?php echo e(URL::to('/admin/eliminarPromocion')); ?>";
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
            $('#modal-delete').modal('hide');
            getPromociones(1);
            $('.modal-backdrop').removeClass();
            }
          });
        });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin2', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>