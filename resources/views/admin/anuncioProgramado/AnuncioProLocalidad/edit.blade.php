		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">x</span>
					</button>
					<h4 class="modal-title">Editar Localidad de anuncio programado</h4>
				</div>

				<form action="/admin/getAnuncioProLocal" method "post" id="frmeditAnunProLoca">
				<div class="modal-body">
					<div class="row">
					    <div class="form-group col-md-12">

					      {{ Form::label('Provincia', 'Provincia',array('class'=>'col-md-6 control-label ')) }}
					      {{ Form::label('Localidad', 'Localidad',array('class'=>'col-md-6 control-label ')) }}
						</div>
					</div>
					<div class="row">
					    <div class="form-group col-md-12">

					      {!! Form::select('Provincia',$provincias,$prodef, $attributes = array('class'=>'col-md-6 chosen-single chosen-default','id'=>'Provincia','multiple'=>'multiple')) !!}
							<input type="hidden" id="idanuncioProLocalidad" name="idanuncioProLocalidad" value="{{$apl->idanuncioProLocalidad}}">
							<input type="hidden" id="idanuncioProgramado" name="idanuncioProgramado" value="{{$apl->idanuncioProgramado}}">

					      {!! Form::select('Localidad',$locadef,$locas, $attributes = array('class'=>'col-md-6 chosen-single chosen-default','id'=>'Localidad','multiple'=>'multiple')) !!}
					    </div>
					</div>
				</div>
				<div class="modal-footer">
						<button class="EditProblacion btn btn-primary" type="button">Guardar</button>
						<button type="button" value="save" class="btn btn-default" data-dismiss="modal">Cancelar</button>
				</div>
				</form>
			</div>
		</div>

<script>
         $(document).on('change','#Provincia',function(e){
            e.preventDefault();
            $.get("/admin/getLocalidadesJSON/" + event.target.value + "",function(response){
              $('#Localidad1').empty();

              $.each(response, function(i, item) {
                $('#Localidad1').append("<option value='" + response[i].idlocalidad+"'>"+response[i].nombre+"</option");
              });
            });
          });
</script>
