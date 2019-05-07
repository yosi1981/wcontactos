
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Nueva Localidad en anuncio</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">x</span>
					</button>
				</div>
			<div class="alert alert-danger" id="mosError">

			</div>
				<div class="modal-body">
					<form action="/admin/createAnunProLoca" method="post" id="frmAnunProLoca">
<div class="row">
    <div class="form-group col-md-8">

      {{ Form::label('Provincia', 'Provincia') }}
      {!! Form::select('Provincia',$provincias,$prodef, $attributes = array('class'=>'form-control','id'=>'Provincia','multiple'=>'multiple')) !!}
	<input type="hidden" id="idanuncioProgramado" name="idanuncioProgramado" value="{{$anuncioP}}">

      {{ Form::label('Localidad', 'Localidad') }}
      {!! Form::select('Localidad',$locadef,$locas, $attributes = array('class'=>'form-control','id'=>'Localidad','multiple'=>'multiple')) !!}
    </div>
  </div>

				</div>
				<div class="modal-footer">
					<button type="button" value="save" class="btn btn-default" data-dismiss="modal" >Cerrar</button>
					<button   class="guardar btn btn-primary">Confirmar</button>
										</form>
				</div>
			</div>
		</div>


<script>

         $('#Provincia').change(function(event) {
            event.preventDefault();
            $.get("/anunciante/getLocalidadesJSON/" + event.target.value + "",function(response){
              $('#Localidad').empty();

              $.each(response, function(i, item) {
                $('#Localidad').append("<option value='" + response[i].idlocalidad+"'>"+response[i].nombre+"</option");
              });
            });
          });
</script>
