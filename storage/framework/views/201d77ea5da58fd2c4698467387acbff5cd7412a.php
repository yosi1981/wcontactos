<div class="widget-box widget-color-blue ui-sortable-handle" id="widget-box-3">
    <div class="widget-header widget-header-small">
        <h6 class="widget-title">
            <i class="ace-icon fa fa-sort">
            </i>
            Información de todas las Provincias
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
                        Id Provincia
                    </th>
                    <th class="detail-col">
                        Detalles
                    </th>
                    <th>
                        Nombre
                    </th>
                    <th>
                        Anuncios
                    </th>
                    <th>
                        Ganado
                    </th>
                </thead>
                <tbody>
                    <?php if(count($provincias)>0): ?>
                <?php $__currentLoopData = $provincias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $provincia): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td>
                            <?php echo e($provincia->idprovincia); ?>

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
                            <?php echo e($provincia->nombre); ?>

                        </td>
                        <td>
                            <?php echo e(count($provincia->anunciosHistorial)); ?>

                        </td>
                        <td>
                            <?php echo e($provincia->totalprovincia); ?>

                        </td>
                    </tr>
                    <tr class="detail-row">
                        <td colspan="8">
                            <div class="widget-box widget-color-blue ui-sortable-handle" id="widget-box-3">
                                <div class="widget-header widget-header-small">
                                    <h6 class="widget-title">
                                        <i class="ace-icon fa fa-sort" font-color="#a91414">
                                        </i>
                                        Información de <?php echo e($provincia->nombre); ?>

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
                                                <?php if(count($provincia->anunciosHistorial)>0): ?>

                                <?php $__currentLoopData = $provincia->anunciosHistorial; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $anuncio): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td>
                                                        <?php echo e($anuncio->idanuncioDia); ?>

                                                    </td>
                                                    <td>
                                                        <?php echo e($anuncio->fecha); ?>

                                                    </td>
                                                    <td>
                                                        <?php echo e($anuncio->idanuncio); ?>

                                                    </td>
                                                    <td>
                                                        <?php echo e($anuncio->admin_comision); ?>

                                                    </td>
                                                    <td>
                                                        <?php echo e($anuncio->numvisitas); ?>

                                                    </td>
                                                </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        <?php else: ?>
                                                <tr>
                                                    <td colspan="4">
                                                        No hay anuncios publicados en esta provincia
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
                        <td>
                            NO ADMINISTRAS NINGUNA PROVINCIA
                        </td>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- /.box -->
