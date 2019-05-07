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
                                Pendiente de cobrar (REFERIDOS)
                            </h5>
                        </div>
                        <div class="widget-body" style="display: block;">
                            <div class="widget-main">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <th>
                                            Fecha
                                        </th>
                                        <th class="detail-col">
                                            Detalles
                                        </th>
                                        <th>
                                            Anuncios
                                        </th>
                                        <th>
                                            Total
                                        </th>
                                    </thead>
                                    <tbody>
                                        <?php if($pdtRef["contenido"]): ?>
                <?php $__currentLoopData = $pdtRef["contenido"]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fecha): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td>
                                                <?php echo e($fecha["fecha"]); ?>

                                            </td>
                                            <td class="center">
                                                <div class="action-buttons">
                                                    <a class="green bigger-140 show-details-btn" href="#" title="Show Details">
                                                        <i class="ace-icon fa fa-angle-double-down">
                                                        </i>
                                                        <span class="sr-only">
                                                            Details
                                                        </span>
                                                    </a>
                                                </div>
                                            </td>
                                            <td>
                                                <?php echo e($fecha["NumAnuncios"]); ?>

                                            </td>
                                            <td>
                                                <?php echo e($fecha["totalganadodia"]); ?>

                                            </td>
                                        </tr>
                                        <tr class="detail-row">
                                            <td colspan="8">
                                                <div class="widget-box widget-color-blue ui-sortable-handle" id="widget-box-3">
                                                    <div class="widget-header widget-header-small">
                                                        <h6 class="widget-title">
                                                            <i class="ace-icon fa fa-sort">
                                                            </i>
                                                            Detalle de <?php echo e($fecha["fecha"]); ?>

                                                        </h6>
                                                        <div class="widget-toolbar">
                                                            <a data-action="search" href="#">
                                                                <i class="ace-icon fa fa-search" font-color="white">
                                                                </i>
                                                            </a>
                                                            <a data-action="reload" href="#">
                                                                <i class="ace-icon fa fa-refresh">
                                                                </i>
                                                            </a>
                                                            <a data-action="collapse" href="#">
                                                                <i class="ace-icon fa fa-minus" data-icon-hide="fa-minus" data-icon-show="fa-plus">
                                                                </i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="widget-body" style="display: block;">
                                                        <div class="widget-main">
                                                            <table class="table table-bordered table-hover" id="simple-table">
                                                                <thead>
                                                                    <tr>
                                                                        <th>
                                                                            Referido
                                                                        </th>
                                                                        <th>
                                                                            Anuncios
                                                                        </th>
                                                                        <th>
                                                                            Total
                                                                        </th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php if($fecha["referidos"]): ?>

                                                <?php $__currentLoopData = $fecha["referidos"]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $referido): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <tr>
                                                                        <td>
                                                                            <?php echo e($referido["referido"]["name"]); ?>

                                                                        </td>
                                                                        <td>
                                                                            <?php echo e($referido["NumAnuncios"]); ?>

                                                                        </td>
                                                                        <td>
                                                                            <?php echo e($referido["totaldiareferido"]); ?>

                                                                        </td>
                                                                    </tr>
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        <?php else: ?>
                                                                    <tr>
                                                                        <td colspan="4">
                                                                            No hay anuncios publicados en esta fecha
                                                                        </td>
                                                                    </tr>
                                                                    <?php endif; ?>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                                        <tr>
                                            <td colspan="4">
                                                No tienes ganancias generadas de referidos.
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