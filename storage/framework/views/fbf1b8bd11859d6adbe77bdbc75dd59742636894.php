		<div class="table-responsive">
            <table class="table table-bordered table-hover" id="simple-table">
                <thead>
                    <th width="5%">Id</th>
                    <th width="20%">Usuario</th>
                    <th width="20%">Email</th>
                    <th width="10%">Estado</th>
                    <th width="20%">Tipo</th>
                    <th width="25%">Acciones</th>
                </thead>
                     <?php if(count($usuarios)>0): ?>
                <tbody>
                    <?php $__currentLoopData = $usuarios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $usu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($usu->id); ?></td>
                        <td><?php echo e($usu->name); ?></td>
                        <td><?php echo e($usu->email); ?></td>
                       <td>
                                                <?php if($usu->status == 0): ?>
                                                <span class="label label-sm label-danger">
                                                    Inactivo
                                                </span>
                                                <?php else: ?>
                                                <span class="label label-sm label-success">
                                                    Inactivo
                                                </span>
                                                <?php endif; ?>
                        </td>
                        <td><?php echo e($usu->stringRol->nombre); ?></td>
                        <td>
                                                <div class="hidden-sm hidden-xs btn-group">
                                                    <button class="btn btn-sm btn-success">
                                                        <a href="<?php echo e(URL::to('/Usuario/'.$usu->id.'/edit')); ?>">
                                                            <i class="ace-icon fa fa-pencil bigger-120">
                                                            </i>
                                                        </a>
                                                    </button>
                                                    <button class="btn btn-sm btn-danger">
                                                        <i class="ace-icon delete-modal fa fa-trash bigger-120" color=#00c0ef data-toggle="tooltip" data-placement="right" title="Eliminar Usuario" data-id="<?php echo e($usu->id); ?>">
                                                        </i>
                                                    </button>
                                                    <button class="btn btn-sm btn-warning">
                                                        <a href="<?php echo e(URL::action('UsuarioController@IniciarSesion',$usu->id)); ?>" data-toggle="tooltip" data-placement="right" title="Iniciar sesion como ... <?php echo e($usu->name); ?>">
                                                            <i class="ace-icon fa fa-calendar bigger-120">
                                                            </i>
                                                        </a>
                                                    </button>
                                                </div>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>

<?php else: ?>
                <tbody>
                    <tr>
                        <td colspan=6 align="center"><b>No hay resultados en la búsqueda</b></td>

                    </tr>
                </tbody>

<?php endif; ?>
            </table>
			<?php echo e($usuarios->links()); ?>

		</div>
