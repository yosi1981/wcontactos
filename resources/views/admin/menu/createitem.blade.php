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
									<form action="/admin/guardarmenuitem" method "post" id="frmNewMenuitem">
                            <div class="widget-main">

																<!-- <label>Id Menu</label>  -->
																<input type="hidden" name="idmenu" class="form-control"  value="{{$idmenu}}" id="idmenu" placeholder="idprovincia...">
																<!-- <label >Id Menu Padre</label>  -->
																<input type="hidden" id="idmenuitem_padre" name="idmenuitem_padre"  class="form-control" value="{{$idmenupadre}}" placeholder="Nombre...">
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
					{{ Form::label('Ruta', 'Ruta') }}
					{!! Form::select('Ruta',$rutas,null, $attributes = array('class'=>'form-control','id'=>'ruta')) !!}
					<input type="hidden" name="ruta2" id="ruta2" />
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
            {{ Form::label('Imagen', 'Imagen') }}
      {!! Form::select('imagen',$iconos[1],null, $attributes = array('class'=>'form-control','id'=>'imagen')) !!}
       <i id="iconoseleccionado" class="fa {{$iconos[1][0]}}">
        	</i>
      	<input type="hidden" name="imagen2" id="imagen2" />

        </div>
    </div>
    </div>
					</div>
									<div class="modal-footer">
											<button class="guardarNuevoitem btn btn-primary" type="submit">Guardar</button>
									</div>
										</form>
						</div>
			</div>
</div>


<script type="text/javascript">
        $(document).on('click','.guardarNuevoitem ',function(e){
            $('#imagen2').val($('#imagen option:selected').text());
            $('#ruta2').val($('#ruta option:selected').text());
        });
</script>