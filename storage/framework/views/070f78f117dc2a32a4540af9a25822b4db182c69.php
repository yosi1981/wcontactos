<div class="widget-box widget-color-blue ui-sortable-handle" id="widget-box-3">
    <div class="widget-header widget-header-small">
        <h6 class="widget-title">
            <i class="ace-icon fa fa-sort">
            </i>
            Información de tus referidos
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
        </h6>
    </div>
    <div class="widget-body" style="display: block;">
        <div class="widget-main">
            <table class="table table-bordered table-hover" id="simple-table">
                <thead>
                    <th>
                        Id Referido
                    </th>
                    <th class="detail-col">
                        Detalles
                    </th>
                    <th>
                        Usuario
                    </th>
                    <th>
                        Total anuncios
                    </th>
                    <th>
                        Ganado
                    </th>
                </thead>
                <tbody>
                    <?php $sum = 0?>
                    <?php if(count($usuario->Referidos)>0): ?>
                <?php $__currentLoopData = $usuario->Referidos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $referido): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td>
                            <?php echo e($referido->id); ?>

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
                            <?php echo e($referido->Usuario->email); ?>

                        </td>
                        <td>
                            <?php echo e(count($referido->HistorialAnuncios)); ?>

                        </td>
                        <td>
                            <?php echo e($referido->totalreferido); ?>

                        </td>
                    </tr>
                    <tr class="detail-row">
                        <td colspan="8">
                            <div class="widget-box widget-color-blue ui-sortable-handle" id="widget-box-3">
                                <div class="widget-header widget-header-small">
                                    <h6 class="widget-title">
                                        <i class="ace-icon fa fa-sort">
                                        </i>
                                        Anuncios de <?php echo e($referido->Usuario->email); ?>

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
                                                <tr>
                                                    <th>
                                                        Id AnuncioDia
                                                    </th>
                                                    <th>
                                                        Fecha
                                                    </th>
                                                    <th>
                                                        Id Anuncio
                                                    </th>
                                                    <th>
                                                        Comision
                                                    </th>
                                                    <th>
                                                        Num. Visitas
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php if(count($referido->HistorialAnuncios)>0): ?>

                                <?php $__currentLoopData = $referido->HistorialAnuncios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $anuncioreferido): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td>
                                                        <?php echo e($anuncioreferido->idanuncioDia); ?>

                                                    </td>
                                                    <td>
                                                        <?php echo e($anuncioreferido->fecha); ?>

                                                    </td>
                                                    <td>
                                                        <?php echo e($anuncioreferido->idanuncio); ?>

                                                    </td>
                                                    <td>
                                                        <?php echo e($anuncioreferido->partner_comision); ?>

                                                        <?php $sum = $sum + $anuncioreferido->
                                                        partner_comision?>
                                                    </td>
                                                    <td>
                                                        <?php echo e($anuncioreferido->numvisitas); ?>

                                                    </td>
                                                </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        <?php else: ?>
                                                <tr>
                                                    <td colspan="4">
                                                        No hay anuncios publicados de este usuario
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
                            NO TIENES NINGUN REFERIDO
                        </td>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="widget-header widget-header-small">
        <h6 class="widget-title">
            Información de tus ganancias <?php echo e($sum); ?>

        </h6>
    </div>
</div>
