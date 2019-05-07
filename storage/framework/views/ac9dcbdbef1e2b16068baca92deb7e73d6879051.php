<div class="sidebar" data-color="blue" data-image="<?php echo e(asset('img/sidebar-1.jpg')); ?>">
    <div class="sidebar responsive ace-save-state" id="sidebar">
        <script type="text/javascript">
            try{ace.settings.loadState('sidebar')}catch(e){}
        </script>
        <div lass="sidebar-shortcuts" id="sidebar-shortcuts">
            <ul class="nav nav-list">
                <?php $__currentLoopData = $menu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mnu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
$cond   = array();
$cond[] = $mnu['sesion'];?>
                <?php if(count($mnu['submenus'])>0): ?>
                            <?php $__currentLoopData = $mnu["submenus"]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $submenu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php $cond[] = $submenu->session?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                <?php

$seccion = \Session::get('seccion_actual');
if (in_array($seccion, $cond) == true) {
    echo "
                <li class='active open'  >
                ";
} else {
    echo "
                <li>
                    ";
}
?>
                    <?php if(count($mnu['submenus'])>0): ?>
                    <a class="dropdown-toggle" href="#">
                        <?php else: ?>
                        <a class="" href="<?php echo e(asset($mnu['Ruta'])); ?>">
                            <?php endif; ?>
                            <i class="menu-icon fa <?php echo e($mnu['imagen']); ?>">
                            </i>
                            <span class="menu-text">
                                <?php echo e($mnu["Titulo"]); ?>

                            </span>
                        </a>
                        <?php if(count($mnu["submenus"])>0): ?>
                        <ul class="submenu">
                            <?php $__currentLoopData = $mnu["submenus"]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $submenu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
$seccion = \Session::get('seccion_actual');
if ($seccion == $submenu->session) {
    echo "
                            <li class='activeopen'>
                                ";
} else {
    echo "
                                <li>
                                    ";
}

?>
                                    <a href="<?php echo e(asset($submenu->Ruta)); ?>">
                                        <i class="menu-icon fa <?php echo e($submenu->imagen); ?>">
                                        </i>
                                        <?php echo e($submenu->Titulo); ?>

                                    </a>
                                </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </li>
                        </ul>
                        <?php endif; ?>
                    </a>
                </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    </div>
</div>
