<div class="widget-box widget-color-blue ui-sortable-handle" id="widget-box-3">
	<div class="widget-header widget-header-small">
		<h5 class="widget-title">
			<i class="ace-icon fa fa-plus">
            </i>
            Editar item
        </h5>
    </div>
	<div class="breadcrumbs ace-save-state" id="breadcrumbs">
                        <div class="widget-body" style="display: block;">
                            <div class="widget-main">

						
				<form action="/admin/updatemenuitem" method "post" id="frmEditMenuItem">
							<div class="row">
								<div class="col-lg-4 col-sm-4">
									<div class="form-group">
											<label>Id Menu Item</label>
											<input type="text" name="idmenuitem" class="form-control" value="<?php echo e($menuitem->idmenuitem); ?>"  id="idmenuitem" placeholder="Id MenuItem...">
									</div>
								</div>
							</div>
							<div class="row">
									<div class="col-lg-4 col-sm-4">
										<div class="form-group">
											<label >Id Menu </label>
											<input type="text" id="idmenu" name="idmenu" class="form-control"  value="<?php echo e($menuitem->idmenu); ?>" placeholder="Id menu...">
										</div>
									</div>
							</div>
							<div class="row">
									<div class="col-lg-4 col-sm-4">
										<div class="form-group">
											<label >Id Menu Padre </label>
											<input type="text" id="idmenuitem_padre" name="idmenuitem_padre"  class="form-control" value="<?php echo e($menuitem->idmenuitem_padre); ?>" placeholder="Nombre...">
										</div>
									</div>
							</div>							
						<div class="row">
							<div class="col-lg-4 col-sm-4">
								<div class="form-group">
										<label>Titulo</label>
										<input type="text" name="Titulo" class="form-control" value="<?php echo e($menuitem->Titulo); ?>" id="Titulo" placeholder="Titulo...">
								</div>
							</div>
						</div>
						<div class="row">
								<div class="col-lg-4 col-sm-4">
									<div class="form-group">
										<label >Ruta</label>
										<input type="text" id="Ruta" name="Ruta" value="<?php echo e($menuitem->Ruta); ?>" class="form-control" placeholder="Ruta...">
									</div>
								</div>
						</div>
						<div class="row">
							<div class="col-lg-4 col-sm-4">
								<div class="form-group">
										<label>Sesion</label>
										<input type="text" name="session" value="<?php echo e($menuitem->session); ?>" class="form-control" id="session" placeholder="Sesion...">
								</div>
							</div>
						</div>
						<div class="row">
								<div class="col-lg-4 col-sm-4">
									<div class="form-group">
										<label >Imagen</label>
										<input type="text" id="imagen" value="<?php echo e($menuitem->imagen); ?>" name="imagen" class="form-control" placeholder="imagen...">
									</div>
								</div>
						</div>
				<div class="modal-footer">
					<div class="form-group">
						<button class="guardarEditProblacion btn btn-primary" type="submit">Guardar</button>
						<button type="button" value="save" class="btn btn-default" data-dismiss="modal">Cancelar</button>
					</div>
				</div>
					</form>
						</div>
					</div>
			</div>
</div>