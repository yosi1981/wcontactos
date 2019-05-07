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
				<form action="/admin/updatemenuitem" method "post" id="frmEditMenuItem">
                    <div class="widget-main">			
											<!--<label>Id Menu Item</label> -->
											<input type="hidden" name="idmenuitem" class="form-control" value="<?php echo e($menuitem->idmenuitem); ?>"  id="idmenuitem" placeholder="Id MenuItem...">
											<!-- <label >Id Menu </label>  -->
											<input type="hidden" id="idmenu" name="idmenu" class="form-control"  value="<?php echo e($menuitem->idmenu); ?>" placeholder="Id menu...">
											<!-- <label >Id Menu Padre </label>  -->
											<input type="hidden" id="idmenuitem_padre" name="idmenuitem_padre"  class="form-control" value="<?php echo e($menuitem->idmenuitem_padre); ?>" placeholder="Nombre...">
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
										<?php echo e(Form::label('Ruta', 'Ruta')); ?>

										<?php echo Form::select('ruta',$rutas,$ruta, $attributes = array('class'=>'form-control','id'=>'ruta')); ?>

										<input type="hidden" name="ruta2" id="ruta2" />
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
										<?php echo e(Form::label('Imagen', 'Imagen')); ?>

										<?php echo Form::select('imagen',$iconos[1],$icono, $attributes = array('class'=>'form-control','id'=>'imagen')); ?>

										<i id="iconoseleccionado"class="fa <?php echo e($iconos[1][$icono]); ?>"></i>
      									<input type="hidden" name="imagen2" id="imagen2" />
      							</div>
 		 					</div>
        				</div>
					</div>
					<div class="modal-footer">
						<button class="guardarEditmenuitem btn btn-primary" type="submit" >Guardar</button>
					</div>
				</form>
		</div>
	</div>
</div>
<script type="text/javascript">
        $(document).on('click','.guardarEditmenuitem ',function(e){
            $('#imagen2').val($('#imagen option:selected').text());
            $('#ruta2').val($('#ruta option:selected').text());
        });
</script>