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
                    <div class="widget-box widget-color-blue ui-sortable-handle" id="widget-box-3">
                        <div class="widget-header widget-header-small">
                            <h5 class="widget-title">
                                <i class="ace-icon fa fa-table">
                                </i>
                                Pagos por lotes
                            </h5>
                        </div>
                        <div class="breadcrumbs ace-save-state" id="breadcrumbs">
                        </div>
                        <div class="widget-body" style="display: block;">
                            <div class="widget-main">
                                <div class="table-responsive" id="cuerpo" name="cuerpo">
                                    <div class="table-responsive">
                                        <table "="" class="table table-striped table-bordered table-condensed table-hover">
                                            <thead>
                                                <th width="5%">
                                                    Id
                                                </th>
                                                <th width="35%">
                                                    batch_id
                                                </th>
                                                <th width="5%">
                                                    Cargado
                                                </th>
                                                <th width="25%">
                                                    Cobrado
                                                </th>
                                                <th width="30%">
                                                    Estado
                                                </th>
                                            </thead>
                                            <?php if(count($pxls)>0): ?>
                                            <tbody>
                                                <?php $__currentLoopData = $pxls; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pxl): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td>
                                                        <?php echo e($pxl->idpagosporlotes); ?>

                                                    </td>
                                                    <td>
                                                        <?php echo e($pxl->payout_batch_id); ?>

                                                    </td>
                                                    <td>
                                                        <?php echo e($pxl->importecargado); ?>

                                                    </td>
                                                    <td>
                                                        <?php echo e($pxl->importecobrado); ?>

                                                    </td>
                                                    <td>
                                                        <?php echo e($pxl->estado); ?>

                                                    </td>
                                                </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </tbody>
                                            <?php else: ?>
                                            <tbody>
                                                <tr>
                                                    <td align="center" colspan="5">
                                                        <b>
                                                            No hay resultados en la búsqueda
                                                        </b>
                                                    </td>
                                                </tr>
                                            </tbody>
                                            <?php endif; ?>
                                        </table>
                                    </div>
                                </div>
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