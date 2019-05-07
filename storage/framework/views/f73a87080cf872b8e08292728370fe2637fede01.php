<?php $__env->startSection('barraizquierda'); ?>
<?php if(count($provincias)>0): ?>
        <?php $__currentLoopData = $provincias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<li>
    <a href="<?php echo e(URL::action('PrincipalController@mostrarAnuncios',$pro->idprovincia)); ?>">
        <?php echo e($pro->nombre); ?>

    </a>
    <i class="fa fa-2x fa-angle-left pull-right">
    </i>
</li>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('contenido'); ?>
<div class="map" id="map">
    <div>
        <svg version="1.1" viewbox="200 -100 600 600" xmlns="http://www.w3.org/2000/svg" xmlns:amcharts="http://amcharts.com/ammap" xmlns:xlink="http://www.w3.org/1999/xlink">
            <g>
                <?php $__currentLoopData = $provincias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tprovincia): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
       <?php if($tprovincia->habilitado==1): ?>
                <path class="map__image imgprovincia" d="<?php echo e($tprovincia->coordenadas); ?>" data-id="<?php echo e($tprovincia->idprovincia); ?>" id="<?php echo e($tprovincia->idprovincia); ?>" title="<?php echo e($tprovincia->nombre); ?>">
                </path>
                <?php else: ?>
                <path class="map__image1 " d="<?php echo e($tprovincia->coordenadas); ?>" data-id="<?php echo e($tprovincia->idprovincia); ?>" id="<?php echo e($tprovincia->idprovincia); ?>" title="<?php echo e($tprovincia->nombre); ?>">
                </path>
                <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </g>
        </svg>
    </div>
</div>
<style>
    .map__image{
        width:20%;
        float: left;
    }
    .map__image{
        fill:#d4847f;
        width:20%;
        stroke:#FFF;
        stroke-width: 0.5px;
        border-bottom: 1px #da9591 solid;
    }
    .map__image:hover{
        fill:#b5597c;
        width:20%;
        stroke:#fff;
        stroke-width: 1.5px;

    }
    .map__image1{
        fill:#2a0a0d;
        width:20%;
        stroke:#FFF;
        stroke-width: 0.5px;
    }
</style>
<script>
    $(document).on('click','.imgprovincia',function(e){
        e.preventDefault();
        var url="<?php echo e(URL::to('/mostrar/')); ?>"+"/"+$(this).data('id');
        window.location.href = url;
    })
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>