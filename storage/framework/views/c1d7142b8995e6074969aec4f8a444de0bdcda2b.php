<div class="widget-box widget-color-blue ui-sortable-handle" id="widget-box-3">
	<div class="widget-header widget-header-small">
		<h5 class="widget-title">
			<i class="ace-icon fa fa-plus">
            </i>
            Crear item
        </h5>
    </div>
	<div class="breadcrumbs ace-save-state" id="breadcrumbs">
                        <div class="widget-body" style="display: block;">
                            <div class="widget-main">

									<form action="/admin/guardarmenuitem" method "post" id="frmNewMenuitem">
												<div class="row">
													<div class="col-lg-4 col-sm-4">
														<div class="form-group">
																<label>Id Menu</label>
																<input type="text" name="idmenu" class="form-control"  value="<?php echo e($idmenu); ?>" id="idmenu" placeholder="idprovincia...">
														</div>
													</div>
												</div>
												<div class="row">
														<div class="col-lg-4 col-sm-4">
															<div class="form-group">
																<label >Id Menu Padre</label>
																<input type="text" id="idmenuitem_padre" name="idmenuitem_padre"  class="form-control" value="<?php echo e($idmenupadre); ?>" placeholder="Nombre...">
															</div>
														</div>
												</div>												
											<div class="row">
												<div class="col-lg-4 col-sm-4">
													<div class="form-group">
															<label>Titulo</label>
															<input type="text" name="Titulo" class="form-control"  id="Titulo" placeholder="Titulo...">
													</div>
												</div>
											</div>
											<div class="row">
													<div class="col-lg-4 col-sm-4">
														<div class="form-group">
															<label >Ruta</label>
															<input type="text" id="Ruta" name="Ruta" class="form-control" placeholder="Ruta...">
														</div>
													</div>
											</div>
											<div class="row">
												<div class="col-lg-4 col-sm-4">
													<div class="form-group">
															<label>Sesion</label>
															<input type="text" name="session" class="form-control" id="session" placeholder="Sesion...">
													</div>
												</div>
											</div>
											<div class="row">
													<div class="col-lg-4 col-sm-4">
														<div class="form-group">
															<label >Imagen</label>
															<input type="text" id="imagen" name="imagen" class="form-control" placeholder="imagen...">
														</div>
													</div>
											</div>
									<div class="modal-footer">
										<div class="form-group">
											<button class="guardarEditProblacion btn btn-primary" type="submit">Guardar</button>
										</div>
									</div>
										</form>
						</div>
					</div>
			</div>
</div>