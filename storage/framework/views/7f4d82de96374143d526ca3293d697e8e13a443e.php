<?php $__env->startSection('barraizda'); ?>
                <?php echo $__env->make('layouts.includes.barraizda', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('contenido'); ?>
<div class="main-content">
    <div class="main-content-inner">
        <div class="breadcrumbs ace-save-state" id="breadcrumbs">
        </div>
        <div class="page-content">
            <div class="row">
                <div class="col-xs-12">
                    <?php if(session()->has('msj')): ?>
                    <div class="alert alert-success">
                        <button aria-hidden="true" class="close" type="button">
                            ×
                        </button>
                        <span>
                            <b>
                                Exito -
                            </b>
                            <?php echo e(session('msj')); ?> ".alert-success"
                        </span>
                    </div>
                    <?php endif; ?>
                    <div class="widget-box widget-color-blue ui-sortable-handle" id="widget-box-3">
                        <div class="widget-header widget-header-small">
                            <h5 class="widget-title">
                                <i class="ace-icon fa fa-table">
                                </i>
                                Pendiente de Facturar
                            </h5>
                        </div>
                        <div class="widget-body" style="display: block;">
                            <div class="widget-main">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <th width="5%">
                                            <div align="center" class="checkbox">
                                                <label>
                                                    <input name="todUsu" type="checkbox" value=""/>
                                                </label>
                                            </div>
                                        </th>
                                        <th>
                                            Usuario
                                        </th>
                                        <th>
                                            Importe a Facturar
                                        </th>
                                    </thead>
                                    <tbody>
                                        <?php if($usupdt["contenido"]): ?>
                <?php $__currentLoopData = $usupdt["contenido"]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pdt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td>
                                                <div align="center" class="checkbox">
                                                    <label>
                                                        <input class="selec" data-id="<?php echo e($pdt['usuario']['id']); ?>" data-pdte="<?php echo e($pdt['pdte']); ?>" id="selUsu" name="selUsu" type="checkbox" value="<?php echo e($pdt['usuario']['id']); ?>"/>
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <?php echo e($pdt["usuario"]["name"]); ?>

                                            </td>
                                            <td>
                                                <?php echo e($pdt["pdte"]); ?>

                                            </td>
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                                        <tr>
                                            <td colspan="5">
                                                No hay pendiente de facturar.
                                            </td>
                                        </tr>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                                <button class="FacturarUsus btn btn-sm btn-success">
                                    <i class="ace-icon fa fa-pencil bigger-120">
                                    </i>
                                    Facturar
                                </button>
                                <div class="impFacturar widget-header widget-header-small">
                                    <h5 class="widget-title">
                                        <i class="ace-icon fa fa-table">
                                        </i>
                                        0.00
                                    </h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function FacturarSeleccion(){
    var listaCompras = '';
    $("input[name=selUsu]").each(function (index) {
       if($(this).is(':checked')){
          FacturarUsuario($(this).val());
          listaCompras += '*'+$(this).val()+'\n';
       }
    });
    alert( listaCompras);
  }
    function FacturarUsuario(idusuario)
    {
        var url="<?php echo e(URL::to('/admin/facturarUsuario/')); ?>"+"/"+idusuario;
        $.ajax({
            type : 'get',
            url  : url
        }).done(function(data){
        })
    }
    $(document).on('click','.FacturarUsus',function(e){
        e.preventDefault();
         FacturarSeleccion();
    })

$('.selec').click(function () {
         var suma=0;
    $("input[name=selUsu]").each(function (index) {
       if($(this).is(':checked')){
          suma += $(this).data('pdte');
       }
    });
       $('.impFacturar').text(suma);
});
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin2', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>