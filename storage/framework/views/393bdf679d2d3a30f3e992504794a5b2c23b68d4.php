<?php $__env->startSection('barraizda'); ?>
                <?php echo $__env->make('layouts.includes.'.Auth::user()->stringRol->nombre . '.barraizda', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('contenido'); ?>
<div class="main-content">
    <div class="main-content-inner">
        <div class="breadcrumbs ace-save-state" id="breadcrumbs">
        </div>
        <div class="page-content">
            <div class="row">
                <div class="col-xs-12">
                    <div  class="tableefecto widget-box widget-color-blue ui-sortable-handle " id="c1">
                        <div class="widget-header widget-header-small ">
                            <h5 class="widget-title">
                                <i class="ace-icon fa fa-table">
                                </i>
                                Listado de Scripts ZONA PUBLICA
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
            <div class="row">
                <div class="col-xs-12">
                    <div class="tableefecto widget-box widget-color-blue ui-sortable-handle" id="c2">
                        <div class="widget-header widget-header-small">
                            <h5 class="widget-title">
                                <i class="ace-icon fa fa-table">
                                </i>
                                Listado de Scripts ZONA ADMIN
                            </h5>
<div class="widget-toolbar">
            <a data-action="guardar" style="color:white;">
                <i class="ace-icon fa fa-floppy-o">
                </i>
            </a>
            <a data-action="reload" class="refrescar" data-ruta="2"  href="#">
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
                                <div class="table-responsive" id="cuerpo2" name="cuerpo2">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<style>
.tableefecto{
  box-shadow: 1px 1px 20px #000;
}
</style>
<script>
        function MostrarIncludesZona(ruta,destino){
            var url="<?php echo e(URL::to('/admin/readfileincludesscripts')); ?>"+"/"+ruta;
            $.ajax({
                type:'get',
                url: url,
                dataType: 'json',
                headers: {
                       'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>',
                   },
                success:function(data){
                    $("#"+destino).html(data);
             }
                }).fail(function(data){
                    alert('algo falla');
                            });

        }
        $(document).ready(function() {
            MostrarIncludesZona(1,"cuerpo1");

            $("#c1").fadeIn();
            TweenMax.from("#c1", 0.4, { scale: 0, ease: Sine.easeInOut });
            TweenMax.to("#c1", 0.4, { scale: 1, ease: Sine.easeInOut });
            MostrarIncludesZona(2,"cuerpo2");
            $("#c2").fadeIn();
            TweenMax.from("#c2", 0.4, { scale: 0, ease: Sine.easeInOut });
            TweenMax.to("#c2", 0.4, { scale: 1, ease: Sine.easeInOut });
        });
        $(document).on('click','.refrescar',function(e){
            e.preventDefault();
            ruta=$(this).data('ruta');
            destino="cuerpo"+ruta;
            MostrarIncludesZona(ruta,destino);
        })

</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin2', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>