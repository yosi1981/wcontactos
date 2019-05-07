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
                    <div id=c1 class="widget-box widget-color-blue ui-sortable-handle " id="widget-box-3">
                        <div class="widget-header widget-header-small ">
                            <h5 class="widget-title">
                                <i class="ace-icon fa fa-table">
                                </i>
                                Tabla
                            </h5>
                            <div class="widget-toolbar">
            <a data-action="guardar" style="color:white;">
                <i class="ace-icon fa fa-floppy-o">
                </i>
            </a>

            <a data-action="reload" class="refrescar" data-ruta="1"  href="#">
                <i class="ace-icon fa fa-refresh">
                </i>
            </a>
            <a data-action="collapse" href="#">
                <i class="ace-icon fa fa-minus" data-icon-hide="fa-minus" data-icon-show="fa-plus">
                </i>
            </a>
        </div>
                        </div>
                        <div class="widget-body" style="display: block;">
                            <div class="widget-main">
                                <div class="table-responsive" id="cuerpo1" name="cuerpo1">

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
       function MostrarInfoTabla(tabla){
            var url="<?php echo e(URL::to('/admin/showCamposInfoTabla')); ?>"+"/"+tabla;
            $.ajax({
                type:'get',
                url: url,
                dataType: 'json',
                headers: {
                       'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>',
                   },
                success:function(data){
                    $('#cuerpo1').html(data);
             }
                }).fail(function(data){
                    alert('algo falla');
                            });

        }
        $(document).ready(function() {
            MostrarInfoTabla("imagenes");
        });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin2', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>