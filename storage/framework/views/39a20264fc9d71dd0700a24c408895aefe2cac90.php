<?php $__env->startSection('contenido'); ?>

<div class="main-content">
    <div class="main-content-inner">
        <div class="breadcrumbs ace-save-state" id="breadcrumbs">
        </div>
        <div class="page-content">
            <div class="page-header">
            </div>

<div class="widget-box widget-color-blue ui-sortable-handle" id="widget-box-3">
    <div class="widget-header widget-header-small">
        <h6 class="widget-title">
            <i class="ace-icon fa fa-sort">
            </i>
            Información de las Promociones Activas
        </h6>
        <div class="widget-toolbar">
            <a data-action="search" href="#">
                <i class="ace-icon fa fa-search">
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
                        Estado
                    </th>

                </thead>
                <tbody>
                    <?php if(count($promociones)>0): ?>
<?php echo e(Form::open(array('url' => '/payment','method'=>'GET'), array('role' => 'form'))); ?>

                <?php $__currentLoopData = $promociones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $promocion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td>
                        	<?php echo e(Form::radio('pro[]', $promocion->id)); ?>

                        </td>
                        <td >
                            <?php echo e($promocion->descripcion); ?>

                        </td>
                        <td >
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
                            <?php echo e($promocion->status); ?>

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
        </div>
    </div>
</div>
<?php echo e(Form::button('Realizar pago', array('type' => 'submit', 'class' => 'btn btn-primary'))); ?>


<?php echo e(Form::close()); ?>


<?php echo $__env->make('anunciante.includes.tablapagos', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</div>
</div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin2', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>