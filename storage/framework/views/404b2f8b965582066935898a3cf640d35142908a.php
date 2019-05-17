    <table class="table table-bordered table-hover" id="simple-table">
        <thead>
            <tr>
                                            <th width="5%">
                                                Id
                                            </th>
                                            <th width="10%">
                                                Titulo
                                            </th>
                                            <th width="10%">
                                                <i class="ace-icon fa fa-users-o bigger-110 hidden-480">
                                                </i>
                                                Usuario
                                            </th>
                                            <th width="10%">
                                                Estado
                                            </th>
                                            <th width="30%">
                                                Acciones
                                            </th>

            </tr>
        </thead>
        <?php if(count($anuncios)>0): ?>
        <tbody>
            <?php $__currentLoopData = $anuncios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $anu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td>
                    <?php echo e($anu->idanuncio); ?>

                </td>
                <td>
                    <?php echo e($anu->titulo); ?>

                </td>

                <td>
                    <a href="<?php echo e(URL::to('/Usuario/'.$anu->idusuario.'/edit')); ?>">
                        <?php echo e($anu->NombreUsuario); ?>

                    </a>
                </td>

                <td class="hidden-480">
                    <?php if($anu->activo == 0): ?>
                    <span class="label label-sm label-danger">
                        Inactivo
                    </span>
                    <?php else: ?>
                    <span class="label label-sm label-success">
                        Activo
                    </span>
                    <?php endif; ?>
                </td>
                <td>
                    <div class="hidden-sm hidden-xs btn-group">
                        <button class="btn btn-sm btn-success">
                            <a href="<?php echo e(URL::to('/admin/Anuncio/'.$anu->idanuncio.'/edit')); ?>">
                                <i class="ace-icon fa fa-pencil bigger-120">
                                </i>
                            </a>
                        </button>
                        <?php if($anu->activo == 0): ?>
                        <button class="btn btn-sm btn-danger">
                            <i class="ace-icon delete-modal fa fa-trash bigger-120" color="white" data-id="<?php echo e($anu->idanuncio); ?>">
                            </i>
                        </button>
                        <?php endif; ?>
                        <!--
                        <?php if($anu->activo == 1): ?>
                        <button class="btn btn-sm btn-warning">
                            <a href="<?php echo e(URL::to('/admin/listadoCitas/'.$anu->idanuncio)); ?>">
                                <i class="ace-icon fa fa-calendar bigger-120">
                                </i>
                            </a>
                        </button>
                        <?php endif; ?>
                        -->
                         <button class="btn btn-sm btn-warning">
                            <a href="<?php echo e(URL::to('/admin/createAP/'.$anu->idanuncio)); ?>">
                                <i class="ace-icon fa fa-calendar bigger-120">
                                </i>
                            </a>
                        </button>
                    </div>
                    <div class="hidden-md hidden-lg">
                        <div class="inline pos-rel">
                            <button class="btn btn-minier btn-primary dropdown-toggle" data-position="auto" data-toggle="dropdown">
                                <i class="ace-icon fa fa-cog icon-only bigger-110">
                                </i>
                            </button>
                            <ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
                                <li>
                                    <a class="tooltip-info" data-original-title="View" data-rel="tooltip" href="#" title="">
                                        <span class="blue">
                                            <i class="ace-icon fa fa-search-plus bigger-120">
                                            </i>
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a class="tooltip-success" data-original-title="Edit" data-rel="tooltip" href="#" title="">
                                        <span class="green">
                                            <i class="ace-icon fa fa-pencil-square-o bigger-120">
                                            </i>
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a class="tooltip-error" data-original-title="Delete" data-rel="tooltip" href="#" title="">
                                        <span class="red">
                                            <i class="ace-icon fa fa-trash-o bigger-120">
                                            </i>
                                        </span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>

<?php else: ?>
                <tbody>
                    <tr>
                        <td colspan=9 align="center"><b>No hay resultados en la búsqueda</b></td>

                    </tr>
                </tbody>

<?php endif; ?>
    </table>
    <?php echo e($anuncios->links()); ?>

