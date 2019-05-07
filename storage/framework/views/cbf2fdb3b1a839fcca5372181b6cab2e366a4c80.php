<?php $__env->startSection('barraizda'); ?>
                <?php echo $__env->make('layouts.includes.barraizda', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
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
                    <div class="widget-box widget-color-blue ui-sortable-handle" id="widget-box-3">
                        <div class="widget-header widget-header-small">
                            <h5 class="widget-title">
                                <i class="ace-icon fa fa-table">
                                </i>
                                Facturas Pendientes de Pago
                            </h5>
                        </div>
                        <div class="widget-body" style="display: block;">
                            <div class="widget-main">
                                <form id="facturasAPagar" method="POST" name="facturasAPagar">
                                    <table class="table table-striped table-bordered table-hover">
                                        <thead>
                                            <th width="5%">
                                                <div align="center" class="checkbox">
                                                    <label>
                                                        <input name="todUsu" type="checkbox" value=""/>
                                                    </label>
                                                </div>
                                            </th>
                                            <th>
                                                Factura
                                            </th>
                                            <th>
                                                Importe a Facturar
                                            </th>
                                        </thead>
                                        <tbody>
                                            <?php if($facturas): ?>
                <?php $__currentLoopData = $facturas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $factura): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td>
                                                    <div align="center" class="checkbox">
                                                        <label>
                                                            <input name="selUsu[]" type="checkbox" value="<?php echo e($factura->idfactura); ?>"/>
                                                        </label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <?php echo e($factura->idusuario); ?>

                                                </td>
                                                <td>
                                                    <?php echo e($factura->importefactura); ?>

                                                </td>
                                            </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                                            <tr>
                                                <td colspan="5">
                                                    No hay pendiente de facturar.
                                                </td>
                                            </tr>
                                            <?php endif; ?>
                                        </tbody>
                                    </table>
                                </form>
                                <button class="PagarFactus btn btn-sm btn-success">
                                    <i class="ace-icon fa fa-pencil bigger-120">
                                    </i>
                                    Pagar
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function PagarFacturas()
    {
        var url="<?php echo e(URL::to('/admin/PxL/')); ?>";
            var form=$('#facturasAPagar');
            var formData=form.serialize();
        $.ajax({
                type:'post',
                url: url,
                data: formData,
                dataType: 'json',
                headers: {
                       'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>',
                   }
        }).done(function(data){

        })
    }
    $(document).on('click','.PagarFactus',function(e){
        e.preventDefault();
         PagarFacturas();
    })
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin2', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>