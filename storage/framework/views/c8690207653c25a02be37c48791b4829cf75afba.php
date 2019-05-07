                                    <div class="card">
                                        <div class="table-responsive">
                                            <table "="" class="table table-striped table-bordered table-condensed table-hover">
                                                <thead>
                                                    <th width="5%" >
                                                        <div align="center">
                                                                    <input name="todUsu" type="checkbox" value=""/>
                                                        </div>
                                                    </th>
                                                    <th width="5%" >
                                                        Estado
                                                    </th>
                                                    <th>
                                                        Css
                                                    </th>
                                                    <th>
                                                        Tamaño
                                                    </th>
                                                </thead>
                                                <?php if(count($scripts)>0): ?>
                                                <tbody>
                                                    <?php $__currentLoopData = $scripts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $script): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php if($script["file_in_proyect"]==-1): ?>
                                                            <tr style="color:red;font-weight: bold;">
                                                        <?php else: ?>
                                                            <?php if($script["file_in_proyect"]==1): ?>
                                                            <tr style="font-weight: bold;">
                                                            <?php else: ?>
                                                            <tr>
                                                            <?php endif; ?>
                                                        <?php endif; ?>
                                                        <td align="center">
                                                                    <?php if($script["file_in_proyect"]>0): ?>
                                                                        <input name="todUsu" type="checkbox" checked="CHECKED" />
                                                                    <?php else: ?>
                                                                        <?php if($script["file_in_proyect"]==0): ?>
                                                                        <input name="todUsu" type="checkbox" />
                                                                        <?php endif; ?>
                                                                    <?php endif; ?>
                                                        </td>

                                                        <td align="center">
                            </i>
                                                                    <?php if($script["file_in_proyect"]>0): ?>
                                                                        <i style="color:green" class="menu-icon fa fa-check">
                                                                    <?php else: ?>
                                                                        <?php if($script["file_in_proyect"]==-1): ?>
                                                                        <i class="menu-icon fa fa-times">
                                                                        <?php endif; ?>
                                                                    <?php endif; ?>                            
                                                        </td>
                                                        <td>
                                                            <?php echo e($script["stylefile"]); ?>

                                                        </td>
                                                        <td>
                                                            <?php echo e($script["stylefile_size"]); ?>

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