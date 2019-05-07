                                    <div class="card">
                                        <div class="table-responsive">
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
                                    Compras
                                </th>
                                <th>
                                    Estado
                                </th>
                                <th>
                                    Opciones
                                </th>
                            </thead>
                            <tbody>
                                <?php if(count($promociones)>0): ?>
                <?php $__currentLoopData = $promociones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $promocion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td>
                                        <?php echo e($promocion->id); ?>

                                    </td>
                                    <td>
                                        <?php echo e($promocion->descripcion); ?>

                                    </td>
                                    <td>
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
                                        <?php echo e($promocion->numcompras); ?>

                                    </td>
                                    <td>
                                        <?php echo e($promocion->status); ?>

                                    </td>
                                    <td>
                                                            <?php if($promocion->status==1): ?>
                                                            <button class="delete-modal btn btn-sm btn-danger" data-id="<?php echo e($promocion->id); ?>">
                                                                DESHABILITAR
                                                            </button>
                                                            <?php else: ?>
                                                            <button class="delete-modal btn btn-sm btn-success" data-id="<?php echo e($promocion->id); ?>">
                                                                HABILITAR
                                                            </button>
                                                            <?php endif; ?>
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
                        <?php echo e($promociones->links()); ?>


                    </div>
                </div>
            </div>
        </div>