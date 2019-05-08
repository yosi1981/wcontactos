<?php if($anuncio->UserAnunciante): ?>

<select class="image-picker" multiple="multiple" name="ch[]">

  <?php $__currentLoopData = $anuncio->UserAnunciante->Imagenes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $imagen): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

  <?php if($anuncio->ImagenesAnuncio->pluck('idimagen')->search($imagen->idimagen)===false): ?>
        <option data-img-src="<?php echo e(asset('/imagenes/thumb_'.$imagen->ficheroimagen)); ?>" value="<?php echo e($imagen->idimagen); ?>"><?php echo e($imagen->titulo); ?></option>
  <?php else: ?>
        <option data-img-src="<?php echo e(asset('/imagenes/thumb_'.$imagen->ficheroimagen)); ?>" value="<?php echo e($imagen->idimagen); ?>"><?php echo e($imagen->titulo); ?></option>
  <?php endif; ?>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</select>
    <script>
    $(function() {
      $(".image-picker").imagepicker();
      $(".image-picker").val(<?php echo json_encode($anuncio->ImagenesAnuncio->pluck('idimagen')->toArray()); ?>);
      $(".image-picker").data('picker').sync_picker_with_select();
       });


    </script>
<?php endif; ?>
