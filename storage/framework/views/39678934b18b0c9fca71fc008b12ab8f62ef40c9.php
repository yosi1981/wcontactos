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

										<?php echo Form::select('imagen',$iconos[1],$icono, $attributes = array('class'=>'col-sm-7 form_control','id'=>'imagen')); ?>

										<i id="iconoseleccionado" style="padding-left: 20px; padding-top: 8px" class="fa <?php echo e($iconos[1][$icono]); ?> col-sm-1"></i>

      									<input type="hidden" name="imagen2" id="imagen2" />
      									<input type="hidden" name="color" id="color" value="<?php echo e($menuitem->color); ?>" />
<div class="dropdown dropdown-colorpicker dropdown ">		<a data-toggle="dropdown" class="elegircolor dropdown-toggle" data-position="auto" aria-expanded="true"><span class="btn-colorpicker col-sm-1" style="background-color: <?php echo e($menuitem->color); ?>;width:64px;height:30px; border:1px solid;"></span></a><ul class="dropdown-menu dropdown-caret" style=""><li><a class="colorpick-btn" style="background-color:#ac725e;" data-color="#ac725e"></a></li><li><a class="colorpick-btn" style="background-color:#d06b64;" data-color="#d06b64"></a></li><li><a class="colorpick-btn" style="background-color:#f83a22;" data-color="#f83a22"></a></li><li><a class="colorpick-btn" style="background-color:#fa573c;" data-color="#fa573c"></a></li><li><a class="colorpick-btn" style="background-color:#ff7537;" data-color="#ff7537"></a></li><li><a class="colorpick-btn" style="background-color:#ffad46;" data-color="#ffad46"></a></li><li><a class="colorpick-btn selected" style="background-color:#42d692;" data-color="#42d692"></a></li><li><a class="colorpick-btn" style="background-color:#16a765;" data-color="#16a765"></a></li><li><a class="colorpick-btn" style="background-color:#7bd148;" data-color="#7bd148"></a></li><li><a class="colorpick-btn" style="background-color:#b3dc6c;" data-color="#b3dc6c"></a></li><li><a class="colorpick-btn" style="background-color:#fbe983;" data-color="#fbe983"></a></li><li><a class="colorpick-btn" style="background-color:#fad165;" data-color="#fad165"></a></li><li><a class="colorpick-btn" style="background-color:#92e1c0;" data-color="#92e1c0"></a></li><li><a class="colorpick-btn" style="background-color:#9fe1e7;" data-color="#9fe1e7"></a></li><li><a class="colorpick-btn" style="background-color:#9fc6e7;" data-color="#9fc6e7"></a></li><li><a class="colorpick-btn" style="background-color:#4986e7;" data-color="#4986e7"></a></li><li><a class="colorpick-btn" style="background-color:#9a9cff;" data-color="#9a9cff"></a></li><li><a class="colorpick-btn" style="background-color:#b99aff;" data-color="#b99aff"></a></li><li><a class="colorpick-btn" style="background-color:#fff;" data-color="#fff"></a></li><li><a class="colorpick-btn" style="background-color:#cabdbf;" data-color="#cabdbf"></a></li><li><a class="colorpick-btn" style="background-color:#cca6ac;" data-color="#cca6ac"></a></li><li><a class="colorpick-btn" style="background-color:#f691b2;" data-color="#f691b2"></a></li><li><a class="colorpick-btn" style="background-color:#cd74e6;" data-color="#cd74e6"></a></li><li><a class="colorpick-btn" style="background-color:#a47ae2;" data-color="#a47ae2"></a></li><li><a class="colorpick-btn" style="background-color:#555;" data-color="#555"></a></li></ul></div>
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
<style>
.colorpick-btn {
	border: 1px solid;
}
</style>
<script type="text/javascript">
   $(document).ready(function() {

            
    });	
        $(document).on('click','.guardarEditmenuitem ',function(e){
            $('#imagen2').val($('#imagen option:selected').text());
            $('#ruta2').val($('#ruta option:selected').text());
        });
        $(document).on('click','.elegircolor',function(e){
        	$(".elegircolor").attr("aria-expanded","true");
        	var actual=$(this);
        	var aux=$(".elegircolor").closest('div');
        	aux.removeClass();
        	aux.addClass('dropdown dropdown-colorpicker dropdown open');
			$('.colorpick-btn').each(function(){
 							$(this).removeClass('selected');
 							if($(this).attr("data-color")==$('#color').val())
 							{
 								$(this).addClass('selected');
 							}
                        });
        });
        $(document).on('click','.colorpick-btn',function(e){
        	var elegido=$(this);
        	var seleccionado=$('colorpick-btn selected');
        	var mostrar=$(".btn-colorpicker");
                        $('.colorpick-btn').each(function(){
 							$(this).removeClass('selected');
                        });
        	seleccionado.removeClass("selected");
			elegido.addClass('selected');
        	mostrar.attr("style",elegido.attr("style")+"width:64px;height:30px; border:1px solid;");

        	$('#color').val(elegido.attr("data-color"));
        });
</script>