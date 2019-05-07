
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
                    Eliminar Provincia
                </h4>
            </div>
            <div class="modal-body">
                <form action="/admin/nuevaProvincia" id="frmProvincia" method="POST">
                    <div class="row">
                        <div class="col-lg-4 col-sm-4">
                            Nombre
                            <div class="form-group">
                                <input id="nombre" name="nombre" placeholder="Nombre..." type="text">
                                </input>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-sm-4">
                            Habilitado
                            <div class="form-group">
                                {!! Form::checkbox('habilitado', '1',true) !!}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-sm-4">
                            Id Responsable
                            <div class="form-group">
                                {!! Form::select('iddelegado',$delegados,null, $attributes = array('class'=>'form-control')) !!}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-sm-4">
                            Id Responsable
                            <div class="form-group">
                                {!! Form::select('idadmPro',$admPro,null, $attributes = array('class'=>'form-control')) !!}
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-default" data-dismiss="modal" type="button">
                    Cerrar
                </button>
                <button class=" btn btn-primary" type="submit">
                    Confirmar
                </button>
            </div>
        </div>
    </div>
</div>
