<div class="card">
    <div class="table-responsive">
        <table "="" class="table table-striped table-bordered table-condensed table-hover">
            <thead>
                <th width="5%">
                    Id
                </th>
                <th width="35%">
                    Nombre
                </th>
                <th width="5%">
                    Habilitado
                </th>
                <th width="25%">
                    Responsable
                </th>
                <th width="30%">
                    Opciones
                </th>
            </thead>
            <?php if(count($provincias)>0): ?>
            <tbody>
                <?php $__currentLoopData = $provincias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $provi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td>
                        <?php echo e($provi->idprovincia); ?>

                    </td>
                    <td>
                        <?php echo e($provi->nombre); ?>

                    </td>
                    <td>
                        <?php echo e($provi->habilitado); ?>

                    </td>
                    <td>
                        <a href="<?php echo e(URL::action('UsuarioController@edit',$provi->idresponsable)); ?>">
                            <?php echo e($provi->NombreUsuario); ?>

                        </a>
                    </td>
                    <td>
                        <button class="btn btn-sm btn-success">
                            <a href="<?php echo e(URL::action('ProvinciaController@edit',$provi->idprovincia)); ?>">
                                <i class="ace-icon fa fa-pencil bigger-120">
                                </i>
                            </a>
                        </button>
                        <?php if($provi->habilitado==1): ?>
                        <button class="delete-modal btn btn-sm btn-danger" data-id="<?php echo e($provi->idprovincia); ?>">
                            DESHABILITAR
                        </button>
                        <?php else: ?>
                        <button class="delete-modal btn btn-sm btn-success" data-id="<?php echo e($provi->idprovincia); ?>">
                            HABILITAR
                        </button>
                        <?php endif; ?>
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
        <?php echo e($provincias->links()); ?>

    </div>
</div>