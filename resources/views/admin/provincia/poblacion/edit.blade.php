

		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">x</span>
					</button>
					<h4 class="modal-title">Editar {{$poblacion->nombre}} de {{$provincia->nombre}}</h4>
				</div>

				<div class="modal-body">		
				<form action="/admin/actualizarlocalidad" method "post" id="frmEditPoblacion">
						<div class="row">
							<div class="col-lg-4 col-sm-4">
								<div class="form-group">
										<input type="hidden" name="idlocalidad" class="form-control" value="{{$poblacion->idlocalidad}}" id="idlocalidad">
								</div>
							</div>
						</div>
						<div class="row">
								<div class="col-lg-4 col-sm-4">
									<div class="form-group">
										<label >Nombre</label>
										<input type="text" id="nombre" name="nombre" class="form-control" value="{{$poblacion->nombre}}" placeholder="Nombre...">
									</div>
								</div>
						</div>
						<div class="row">
								<div class="col-lg-4 col-sm-4">
									<div class="form-group">
										<input type="hidden" id="idprovincia" name="idprovincia" class="form-control" value="{{$poblacion->idprovincia}}" >
									</div>
								</div>
						</div>
				</div>
				<div class="modal-footer">

						<button type="button" value="save" class="btn btn-default" data-dismiss="modal">Cerrar</button>
						<button class="guardarEditProblacion btn btn-primary" type="submit">Guardar</button>
					</form>
				</div>
			</div>
		</div>
