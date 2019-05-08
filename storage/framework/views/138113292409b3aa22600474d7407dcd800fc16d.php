<div class="widget-box widget-color-blue ui-sortable-handle" id="widget-box-3">
    <div class="widget-header widget-header-small">
        <h6 class="widget-title">
            <i class="ace-icon fa fa-sort">
            </i>
            Información de los Pagos realizados
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
            <table class="table table-striped table-bordered table-condensed table-hover" ">
                <thead>
                    <th>Id</th>
                    <th>Id Pagador</th>
                    <th>Id Pago</th>
                    <th>Fecha</th>
                    <th>Dias</th>
                    <th>Precio</th>
                    <th>Total</th>

                </thead>
<?php if(count($pagos)>0): ?>
                <tbody>
                    <?php $__currentLoopData = $pagos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($pag->id); ?></td>
                        <td><?php echo e($pag->payerID); ?></td>
                        <td><?php echo e($pag->paymentID); ?></td>
                        <td><?php echo e($pag->fecha_pago); ?></td>
                        <td><?php echo e($pag->dias); ?></td>
                        <td><?php echo e($pag->precio); ?></td>
                        <td><?php echo e($pag->total); ?></td>

                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>

<?php else: ?>
                <tbody>
                    <tr>
                        <td colspan=5 align="center"><b>No hay resultados en la búsqueda</b></td>

                    </tr>
                </tbody>

<?php endif; ?>
            </table>
            <?php echo e($pagos->links()); ?>

        </div>
    </div>
</div>
