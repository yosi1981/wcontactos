
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">x</span>
					</button>
					<h4 class="modal-title">Nueva Localidad en anuncio</h4>
				</div>

				<div class="modal-body">
					<form action="/admin/createAnunProLoca" method="post" id="frmAnunProLoca">
<div class="row">
    <div class="form-group col-md-12">

      <?php echo e(Form::label('Provincia', 'Provincia',array('class'=>'col-md-6 control-label '))); ?>

      <?php echo e(Form::label('Localidad', 'Localidad',array('class'=>'col-md-6 control-label '))); ?>

	</div>
</div>
<div class="row">
    <div class="form-group col-md-12">

      <?php echo Form::select('Provincia',$provincias,$prodef, $attributes = array('class'=>'col-md-6 chosen-single chosen-default','id'=>'Provincia','multiple'=>'multiple')); ?>

	<input type="hidden" id="idanuncioProgramado" name="idanuncioProgramado" value="<?php echo e($anuncioP); ?>">

      <?php echo Form::select('Localidad',$locadef,$locas, $attributes = array('class'=>'col-md-6 chosen-single chosen-default','id'=>'Localidad','multiple'=>'multiple')); ?>

    </div>
  </div>

				</div>
				<div class="modal-footer">
					<button type="button" value="save" class="btn btn-default" data-dismiss="modal" >Cerrar</button>
					<button   class="guardar btn btn-primary">Confirmar</button>
				</div>
										</form>
			</div>
		</div>


<script>

          $(document).on('change','#Provincia',function(e){
          	e.preventDefault();
            $.get("/admin/getLocalidadesJSON/" + event.target.value + "",function(response){
              $('#Localidad').empty();

              $.each(response, function(i, item) {
                $('#Localidad').append("<option value='" + response[i].idlocalidad+"'>"+response[i].nombre+"</option");
              });
            });
          });
</script>
