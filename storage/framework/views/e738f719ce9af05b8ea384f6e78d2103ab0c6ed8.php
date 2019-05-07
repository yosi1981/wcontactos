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
                                TODAS LAS FACTURAS DEL SISTEMA
                            </h5>
                        </div>
                        <div class="widget-body" style="display: block;">
                            <div class="widget-main">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <th>
                                            Id
                                        </th>
                                        <th>
                                            Usuario
                                        </th>
                                        <th>
                                            Fecha
                                        </th>
                                        <th>
                                            Importe
                                        </th>
                                        <th>
                                            Acciones
                                        </th>
                                        <th>
                                            Acciones
                                        </th>
                                    </thead>
                                    <tbody>
                                        <?php if($facturas): ?>
                <?php $__currentLoopData = $facturas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $factura): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td>
                                                <?php echo e($factura->idfactura); ?>

                                            </td>
                                            <td>
                                                <?php echo e($factura->idusuario); ?>

                                            </td>
                                            <td>
                                                <?php $factura->
                                                fechafactura = date("d/m/Y", strtotime($factura->fechafactura));?>
                            <?php echo e($factura->fechafactura); ?>

                                            </td>
                                            <td>
                                                <?php echo e($factura->importefactura); ?>

                                            </td>
                                            <td>
                                                <?php if($factura->pagada == 0): ?>
                                                <span class="label label-sm label-danger">
                                                    Pdte. de pago
                                                </span>
                                                <?php else: ?>
                                                <span class="label label-sm label-success">
                                                    Pagada
                                                </span>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <a href="<?php echo e(URL::to('admin/VerFactura',$factura->idfactura)); ?>">
                                                    <i class="menu-icon fa fa-file-pdf-o" style="font-size:24px;color:red">
                                                    </i>
                                                </a>
                                            </td>
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                                        <tr>
                                            <td colspan="5">
                                                No hay facturas que mostrar.
                                            </td>
                                        </tr>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin2', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>