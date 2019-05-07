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
<div id="footer1">
    <p>
        <?php echo e($provincia->nombre); ?>

    </p>
</div>
<?php if(count($anuncios)>0): ?>
    <?php $__currentLoopData = $anuncios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $anu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="tarjeta-wrap">
    <div class="tarjeta">
        <div class="adelante " style="  background-image: url('<?php echo e(asset('imagenes/thumb_'.$anu->imagen)); ?>');
    background-size: cover;">
            <p>
                <?php echo e($anu->titulo); ?>

            </p>
        </div>
        <div class="atras">
            <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa ex velit beatae. Illum, suscipit, aspernatur!
            </p>
        </div>
    </div>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php else: ?>
<div class="product_box">
    <img alt="" class="prod_image" src="<?php echo e(asset('img/p1.gif')); ?>" title=""/>
    <div class="product_details">
        <div class="prod_title">
            xxxxxx
        </div>
        <p>
            xxxxxx
        </p>
        <p class="price">
            <span class="price">
                xxxxx
            </span>
        </p>
        <a class="details" href="details.html">
            <img alt="" border="0" src="<?php echo e(asset('img/details.gif')); ?>" title=""/>
        </a>
    </div>
</div>
<?php endif; ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>