		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Editar Localidad de anuncio programado</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">x</span>
					</button>
				</div>
			<div class="alert alert-danger" id="mosError">

			</div>
				<div class="modal-body">
				<form action="/admin/getAnuncioProLocal" method "post" id="frmeditAnunProLoca">
				<div class="row">
    <div class="form-group col-md-8">

      <?php echo e(Form::label('Provincia1', 'Provincia')); ?>

      <?php echo Form::select('Provincia1',$provincias,$prodef, $attributes = array('class'=>'form-control','id'=>'Provincia1','multiple'=>'multiple')); ?>

<input type="hidden" id="idanuncioProLocalidad" name="idanuncioProLocalidad" value="<?php echo e($apl->idanuncioProLocalidad); ?>">
<input type="hidden" id="idanuncioProgramado" name="idanuncioProgramado" value="<?php echo e($apl->idanuncioProgramado); ?>">
      <?php echo e(Form::label('Localidad1', 'Localidad')); ?>

      <?php echo Form::select('Localidad1',$locadef,$locas, $attributes = array('class'=>'form-control','id'=>'Localidad1','multiple'=>'multiple')); ?>

    </div>
  </div>

				</div>
				<div class="modal-footer">
					<div class="form-group">
						<button class="EditProblacion btn btn-primary" type="button">Guardar</button>
						<button type="button" value="save" class="btn btn-default" data-dismiss="modal">Cancelar</button>
					</div>
					</form>
				</div>
			</div>
		</div>

<script>

         $('#Provincia1').change(function(event) {
            event.preventDefault();
            $.get("/anunciante/getLocalidadesJSON/" + event.target.value + "",function(response){
              $('#Localidad1').empty();

              $.each(response, function(i, item) {
                $('#Localidad1').append("<option value='" + response[i].idlocalidad+"'>"+response[i].nombre+"</option");
              });
            });
          });
</script>
