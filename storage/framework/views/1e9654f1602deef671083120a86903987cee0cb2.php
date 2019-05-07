<?php $__env->startSection('contenido'); ?>
<div class="main-content">
    <div class="main-content-inner">
        <div class="breadcrumbs ace-save-state" id="breadcrumbs">
        </div>
        <div class="page-content">
            <div class="page-header">
                <?php echo $__env->make('includes.admin.tables.infoReferidosTable', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <?php echo $__env->make('includes.admin.tables.infoAnunciosProvincias', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin2', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>