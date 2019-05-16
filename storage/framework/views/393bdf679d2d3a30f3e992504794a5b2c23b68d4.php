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
                           
                        </div>
                        <div class="widget-body" style="display: block;">
                            <div class="widget-main">
                                <div class="table-responsive" id="cuerpo1" name="cuerpo1">
<div class="card">
    <div class="table-responsive">
        <table  class="table table-striped table-bordered table-condensed table-hover">
            <thead>
                <th width="5%">
                    <div align="center">
                    </div>
                </th>
                <th width="5%" style="text-align: center">
                    Estado
                </th>
                <th>
                    Css
                </th>
                <th style="text-align: right">
                    Tamaño (kb)
                </th>
            </thead>
            <?php if(count($scripts)>0): ?>
            <tbody>
                <form action="/admin/writefileincludescripts"  method="get">
                    <?php $__currentLoopData = $scripts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $script): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($script["file_in_proyect"]==-1): ?>
                            <tr style="color:red;font-weight: bold;">
                        <?php else: ?>
                            <?php if($script["file_in_proyect"]==1): ?>
                                <tr style="font-weight: bold;">
                            <?php else: ?>
                                <tr>
                            <?php endif; ?>
                        <?php endif; ?>
                                <td align="center">
                                    <?php if($script["file_in_proyect"]>0): ?>
                                    <input checked="CHECKED" id="selfile[]" name="selfile[]" type="checkbox" value="<?php echo e($script['stylefile']); ?>"/>
                                    <?php else: ?>
                                                                        <?php if($script["file_in_proyect"]==0): ?>
                                    <input id="selfile[]" name="selfile[]" type="checkbox" value="<?php echo e($script['stylefile']); ?>"/>
                                    <?php endif; ?>
                                                                    <?php endif; ?>
                                </td>
                                <td align="center">
                                    <?php if($script["file_in_proyect"]>0): ?>
                                    <i class="menu-icon fa fa-check" style="color:green">
                                    </i>
                                    <?php else: ?>
                                                                        <?php if($script["file_in_proyect"]==-1): ?>
                                    <i class="menu-icon fa fa-times">
                                    </i>
                                    <?php endif; ?>
                                                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php echo e($script["stylefile"]); ?>

                                </td>
                                <td align="right">
                                    <?php echo e($script["stylefile_size"]); ?>

                                </td>

                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <button class="btn btn-primary" type="submit">
                        Confirmar
                    </button>
                </form>
            </tbody>
            <?php else: ?>
            <tbody>
                <tr>
                    <td align="center" colspan="5">
                        <b>
                            No hay resultados en la búsqueda
                        </b>
                    </td>
                </tr>
            </tbody>
            <?php endif; ?>
        </table>
    </div>
</div>
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
        $(document).ready(function() {

            $("#c1").fadeIn();
            TweenMax.from("#c1", 0.4, { scale: 0, ease: Sine.easeInOut });
            TweenMax.to("#c1", 0.4, { scale: 1, ease: Sine.easeInOut });

        });

</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin2', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>