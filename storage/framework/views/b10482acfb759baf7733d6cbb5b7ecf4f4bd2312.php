<div aria-hidden="true" class="modal fade modal-slide-in-right" id="Provincia" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">
                    Nueva Provincia
                </h4>
                <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                    <span aria-hidden="true">
                        x
                    </span>
                </button>
            </div>
            <div class="alert alert-danger" id="mosError">
            </div>
            <div class="modal-body">
                <form "post"="" action="/admin/nuevaProvincia" id="frmProvincia" method="">
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
                                <?php echo Form::checkbox('habilitado', '1',true); ?>

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-sm-4">
                            Id Responsable
                            <div class="form-group">
                                <?php echo Form::select('iddelegado',$delegados,null, $attributes = array('class'=>'form-control')); ?>

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-sm-4">
                            Id Responsable
                            <div class="form-group">
                                <?php echo Form::select('idadmPro',$admPro,null, $attributes = array('class'=>'form-control')); ?>

                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-default" data-dismiss="modal" type="button" value="save">
                    Cerrar
                </button>
                <button class="btn btn-primary" type="submit">
                    Confirmar
                </button>
            </div>
        </div>
    </div>
</div>
