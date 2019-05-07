<div class="table-responsive">
    <table class="table table-striped table-bordered table-condensed table-hover">
        <thead>
            <th>
                Id
            </th>
            <th>
                Id A. Programado
            </th>
            <th>
                Id Provincia
            </th>
            <th>
                Id Localidad
            </th>
            <th>
            </th>
        </thead>
        <?php if(count($apls)>0): ?>
        <tbody>
            <?php $__currentLoopData = $apls; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $apl): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td>
                    <?php echo e($apl->idanuncioProLocalidad); ?>

                </td>
                <td>
                    <?php echo e($apl->idanuncioProgramado); ?>

                </td>
                <td>
                    <?php echo e($apl->provincia->nombre); ?>

                </td>
                <td>
                    <?php echo e($apl->localidad->nombre); ?>

                </td>
                        <td>
                        <button id="editlocalidadAP" name="editlocalidadAP" data-id="<?php echo e($apl->idanuncioProLocalidad); ?>" class="editlocalidadAP btn btn-info">Editar</button></a>
                        <button class="deleteAPpre btn btn-danger" data-id="<?php echo e($apl->idanuncioProLocalidad); ?>">Eliminar</button>
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
