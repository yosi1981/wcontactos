
<div aria-hidden="true" class="modal fade modal-slide-in-right" id="Provincia" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                    <span aria-hidden="true">
                        x
                    </span>
                </button>
                <h4 class="modal-title">
                    Crear Provincia
                </h4>
            </div>
                <form action="/admin/nuevaProvincia" id="frmProvincia" method="POST">
            <div class="modal-body">
                    <div class="row">
                        <div class="form-group col-md-12">
                            {{ Form::label('nombre', 'Nombre',array('class'=>'col-md-3 control-label no-padding-right')) }}
                            {{ Form::text('nombre',null, array('placeholder' => 'Introduce el nombre', 'class' => 'texto1 col-sm-9 form_control')) }}
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12">
                            {{ Form::label('idadmPro', 'Administrador',array('class'=>'col-md-3 control-label no-padding-right')) }}
                            {!! Form::select('idadmPro',$admPro,null, $attributes = array('class'=>'col-md-9 chosen-single chosen-default','id'=>'idadmPro')) !!}

                        </div>
                    </div>

            </div>
            <div class="modal-footer">
                <button class="btn btn-default" data-dismiss="modal" type="button">
                    Cerrar
                </button>
                <button class=" btn btn-primary" type="submit">
                    Confirmar
                </button>
            </div>
                </form>
        </div>
    </div>
</div>
