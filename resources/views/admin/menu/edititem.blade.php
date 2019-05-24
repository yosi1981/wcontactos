<div class="widget-box widget-color-blue ui-sortable-handle" id="widget-box-3">
	<div class="widget-header widget-header-small">
		<h5 class="widget-title">
			<i class="ace-icon fa fa-plus">
            </i>
            {{$ruta1}}
        </h5>
    </div>

		<div class="widget-body" style="display: block;">
				<form action="/admin/updatemenuitem" method "post" id="frmEditMenuItem">
                    <div class="widget-main">	
            <div class="row">
                <div class="col-xs-12">		
                		<div class="row">
											<!--<label>Id Menu Item</label> -->
											<input type="hidden" name="idmenuitem" class="form-control" value="{{$menuitem->idmenuitem}}"  id="idmenuitem" placeholder="Id MenuItem...">
											<!-- <label >Id Menu </label>  -->
											<input type="hidden" id="idmenu" name="idmenu" class="form-control"  value="{{$menuitem->idmenu}}" placeholder="Id menu...">
											<!-- <label >Id Menu Padre </label>  -->
											<input type="hidden" id="idmenuitem_padre" name="idmenuitem_padre"  class="form-control" value="{{$menuitem->idmenuitem_padre}}" placeholder="Nombre...">
						</div>
	              		<div class="row">
	                        <div class="form-group col-md-12">
										{{ Form::label('Titulo', 'Titulo',array('class'=>'col-md-3 control-label no-padding-right','for'=>'form-field-1-1')) }}
                                {{ Form::text('Titulo',$menuitem->Titulo, array('placeholder' => 'Introduce el Titulo', 'class' => 'col-sm-9 form_control')) }}
							</div>
						</div>

		                <div class="row">
		                        <div class="form-group col-md-12">
										{{ Form::label('Ruta', 'Ruta',array('class'=>'col-sm-3 control-label no-padding-right','for'=>'form-field-1-1')) }}
										{!! Form::select('ruta',$rutas,$ruta, $attributes = array('class'=>'col-sm-9 form_control','id'=>'ruta')) !!}
										<input type="hidden" name="ruta2" id="ruta2" />
								</div>
        				</div>
		                <div class="row">
		                        <div class="form-group col-md-12">
										<label class="col-md-3">Sesion</label>
										<input type="text" name="session" value="{{$menuitem->session}}" class="col-sm-9 form_control" id="session" placeholder="Sesion...">
								</div>
						</div>
		                <div class="row">
		                        <div class="form-group col-md-12">
										{{ Form::label('Imagen', 'Imagen',array('class'=>'col-sm-3 control-label no-padding-right','for'=>'form-field-1-1')) }}
										{!! Form::select('imagen',$iconos[1],$icono, $attributes = array('class'=>'col-sm-8 form_control','id'=>'imagen')) !!}
										<i id="iconoseleccionado" style="padding-left: 20px; padding-top: 8px" class="fa {{$iconos[1][$icono]}} col-sm-1"></i>

      									<input type="hidden" name="imagen2" id="imagen2" />

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