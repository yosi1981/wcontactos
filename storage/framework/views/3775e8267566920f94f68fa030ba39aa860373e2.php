
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">x</span>
					</button>
					<h4 class="modal-title">Eliminar Localidad del anuncio</h4>
				</div>
				<div class="modal-body">
					<form class="form-horizontal" role="form">
						<p>Confirme si desea Eliminar la Localidad :</p>
						<span class="hidden id"></span>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
					<button type="button" data-id="<?php echo e($apl->idanuncioProLocalidad); ?>" class="deleteAPLpost btn btn-primary">Confirmar</button>
				</div>
			</div>
		</div>
	</form>
