		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Id Poblacion</th>
					<th>Nombre</th>
					<th>Opciones</th>
				</thead>
<?php if(count($poblaciones)>0): ?>
				<tbody>
					<?php $__currentLoopData = $poblaciones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pobla): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<tr>
						<td><?php echo e($pobla->idlocalidad); ?></td>
						<td><?php echo e($pobla->nombre); ?></td>
						<td>
						<button id="btnEditarPoblacion" name="btnEditarPoblacion" data-id="<?php echo e($pobla->idlocalidad); ?>" class="editlocalidad btn btn-info">Editar</button>
						<button class="delete-modal btn btn-danger" data-id="<?php echo e($pobla->idlocalidad); ?>">Eliminar</button>
						</td>					
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
		</div>
