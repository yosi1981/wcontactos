<div class="widget-box widget-color-blue ui-sortable-handle" id="widget-box-3">
	<div class="widget-header widget-header-small">
		<h5 class="widget-title">
			<i class="ace-icon fa fa-plus">
            </i>
            <?php echo e($ruta1); ?>

        </h5>
    </div>

		<div class="widget-body" style="display: block;">
				<form action="/admin/updatemenuitem" method "post" id="frmEditMenuItem">
                    <div class="widget-main">	
            <div class="row">
                <div class="col-xs-12">		
                		<div class="row">
											<!--<label>Id Menu Item</label> -->
											<input type="hidden" name="idmenuitem" class="form-control" value="<?php echo e($menuitem->idmenuitem); ?>"  id="idmenuitem" placeholder="Id MenuItem...">
											<!-- <label >Id Menu </label>  -->
											<input type="hidden" id="idmenu" name="idmenu" class="form-control"  value="<?php echo e($menuitem->idmenu); ?>" placeholder="Id menu...">
											<!-- <label >Id Menu Padre </label>  -->
											<input type="hidden" id="idmenuitem_padre" name="idmenuitem_padre"  class="form-control" value="<?php echo e($menuitem->idmenuitem_padre); ?>" placeholder="Nombre...">
						</div>
	              		<div class="row">
	                        <div class="form-group col-md-12">
										<?php echo e(Form::label('Titulo', 'Titulo',array('class'=>'col-md-3 control-label no-padding-right','for'=>'form-field-1-1'))); ?>

                                <?php echo e(Form::text('Titulo',$menuitem->Titulo, array('placeholder' => 'Introduce el Titulo', 'class' => 'col-sm-9 form_control'))); ?>

							</div>
						</div>

		                <div class="row">
		                        <div class="form-group col-md-12">
										<?php echo e(Form::label('Ruta', 'Ruta',array('class'=>'col-sm-3 control-label no-padding-right','for'=>'form-field-1-1'))); ?>

										<?php echo Form::select('ruta',$rutas,$ruta, $attributes = array('class'=>'col-sm-9 form_control','id'=>'ruta')); ?>

										<input type="hidden" name="ruta2" id="ruta2" />
								</div>
        				</div>
		                <div class="row">
		                        <div class="form-group col-md-12">
										<label class="col-md-3">Sesion</label>
										<input type="text" name="session" value="<?php echo e($menuitem->session); ?>" class="col-sm-9 form_control" id="session" placeholder="Sesion...">
								</div>
						</div>
		                <div class="row">
		                        <div class="form-group col-md-12">
										<?php echo e(Form::label('Imagen', 'Imagen',array('class'=>'col-sm-3 control-label no-padding-right','for'=>'form-field-1-1'))); ?>

										<?php echo Form::select('imagen',$iconos[1],$icono, $attributes = array('class'=>'col-sm-8 form_control','id'=>'imagen')); ?>

										<i id="iconoseleccionado" style="padding-left: 20px; padding-top: 8px" class="fa <?php echo e($iconos[1][$icono]); ?> col-sm-1"></i>

      									<input type="hidden" name="imagen2" id="imagen2" />
<div>
															<label for="simple-colorpicker-1">Custom Color Picker</label>

															<select id="simple-colorpicker-1" class="hide">
																<option value="#ac725e">#ac725e</option>
																<option value="#d06b64">#d06b64</option>
																<option value="#f83a22">#f83a22</option>
																<option value="#fa573c">#fa573c</option>
																<option value="#ff7537">#ff7537</option>
																<option value="#ffad46" selected="">#ffad46</option>
																<option value="#42d692">#42d692</option>
																<option value="#16a765">#16a765</option>
																<option value="#7bd148">#7bd148</option>
																<option value="#b3dc6c">#b3dc6c</option>
																<option value="#fbe983">#fbe983</option>
																<option value="#fad165">#fad165</option>
																<option value="#92e1c0">#92e1c0</option>
																<option value="#9fe1e7">#9fe1e7</option>
																<option value="#9fc6e7">#9fc6e7</option>
																<option value="#4986e7">#4986e7</option>
																<option value="#9a9cff">#9a9cff</option>
																<option value="#b99aff">#b99aff</option>
																<option value="#c2c2c2">#c2c2c2</option>
																<option value="#cabdbf">#cabdbf</option>
																<option value="#cca6ac">#cca6ac</option>
																<option value="#f691b2">#f691b2</option>
																<option value="#cd74e6">#cd74e6</option>
																<option value="#a47ae2">#a47ae2</option>
																<option value="#555">#555</option>
															</select><div class="dropdown dropdown-colorpicker dropup">		<a data-toggle="dropdown" class="dropdown-toggle" data-position="auto" aria-expanded="false"><span class="btn-colorpicker" style="background-color: rgb(250, 87, 60);"></span></a><ul class="dropdown-menu dropdown-caret" style=""><li><a class="colorpick-btn" style="background-color:#ac725e;" data-color="#ac725e"></a></li><li><a class="colorpick-btn" style="background-color:#d06b64;" data-color="#d06b64"></a></li><li><a class="colorpick-btn" style="background-color:#f83a22;" data-color="#f83a22"></a></li><li><a class="colorpick-btn selected" style="background-color:#fa573c;" data-color="#fa573c"></a></li><li><a class="colorpick-btn" style="background-color:#ff7537;" data-color="#ff7537"></a></li><li><a class="colorpick-btn" style="background-color:#ffad46;" data-color="#ffad46"></a></li><li><a class="colorpick-btn" style="background-color:#42d692;" data-color="#42d692"></a></li><li><a class="colorpick-btn" style="background-color:#16a765;" data-color="#16a765"></a></li><li><a class="colorpick-btn" style="background-color:#7bd148;" data-color="#7bd148"></a></li><li><a class="colorpick-btn" style="background-color:#b3dc6c;" data-color="#b3dc6c"></a></li><li><a class="colorpick-btn" style="background-color:#fbe983;" data-color="#fbe983"></a></li><li><a class="colorpick-btn" style="background-color:#fad165;" data-color="#fad165"></a></li><li><a class="colorpick-btn" style="background-color:#92e1c0;" data-color="#92e1c0"></a></li><li><a class="colorpick-btn" style="background-color:#9fe1e7;" data-color="#9fe1e7"></a></li><li><a class="colorpick-btn" style="background-color:#9fc6e7;" data-color="#9fc6e7"></a></li><li><a class="colorpick-btn" style="background-color:#4986e7;" data-color="#4986e7"></a></li><li><a class="colorpick-btn" style="background-color:#9a9cff;" data-color="#9a9cff"></a></li><li><a class="colorpick-btn" style="background-color:#b99aff;" data-color="#b99aff"></a></li><li><a class="colorpick-btn" style="background-color:#c2c2c2;" data-color="#c2c2c2"></a></li><li><a class="colorpick-btn" style="background-color:#cabdbf;" data-color="#cabdbf"></a></li><li><a class="colorpick-btn" style="background-color:#cca6ac;" data-color="#cca6ac"></a></li><li><a class="colorpick-btn" style="background-color:#f691b2;" data-color="#f691b2"></a></li><li><a class="colorpick-btn" style="background-color:#cd74e6;" data-color="#cd74e6"></a></li><li><a class="colorpick-btn" style="background-color:#a47ae2;" data-color="#a47ae2"></a></li><li><a class="colorpick-btn" style="background-color:#555;" data-color="#555"></a></li></ul></div>
														</div>
      							</div>
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
<script type="text/javascript">
   $(document).ready(function() {
		$(".selectpicker").selectpicker();
    });	
        $(document).on('click','.guardarEditmenuitem ',function(e){
            $('#imagen2').val($('#imagen option:selected').text());
            $('#ruta2').val($('#ruta option:selected').text());
        });
</script>