                                    <div class="card">
                                        <div class="table-responsive">
                                            <table "="" class="table table-striped table-bordered table-condensed table-hover">
                                                <thead>
                                                    <th width="5%" >
                                                        Método
                                                    </th>
                                                    <th>
                                                        Ruta
                                                    </th>
                                                    <th>
                                                        Controlador
                                                    </th>
                                                    <th>
                                                        Funcion
                                                    </th>

                                                </thead>
                                                <?php if($infocampos): ?>
                                                <tbody>

                                                    <?php $__currentLoopData = $infocampos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $info): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <tr style="font-weight: bold;">
                                                        <td>
                                                            <?php echo e($info->name); ?>

                                                        </td>
                                                        <td>
                                                            <?php echo e($info->flags); ?>

                                                        </td>
                                                        <td>
                                                            <?php echo e($info->type); ?>

                                                        </td>
                                                        <td>
                                                            <?php echo e($info->def); ?>

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