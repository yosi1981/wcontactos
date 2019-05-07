<div class="sidebar" data-color="blue" data-image="<?php echo e(asset('img/sidebar-1.jpg')); ?>">
    <div class="sidebar responsive ace-save-state" id="sidebar">
        <script type="text/javascript">
            try{ace.settings.loadState('sidebar')}catch(e){}
        </script>
        <div lass="sidebar-shortcuts" id="sidebar-shortcuts" >
            <ul class="nav nav-list">
<?php if($menu): ?>
                <?php $__currentLoopData = $menu->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mnu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
                    <?php if($edit): ?>
                    <?php 
                        if($mnu['guardar']==1){
                            $color= "color: #e8a3a3";
                        }
                        else{
                            $color= "color: #585858";
                        }

                    ?>
                            <div>
                            <i data-idmenuitem="<?php echo e($mnu['idmenuitem']); ?>" class="eliminar menu-icon fa fa-times" style="
    position: absolute;
    z-index:1;
    right: 10px;
    cursor:pointer;
    top:10px;">
                            </i>
                            <i  data-idmenuitem="<?php echo e($mnu['idmenuitem']); ?>" class="editar menu-icon fa fa-pencil" style="
    position: absolute;
    z-index:1;
    right: 30px;
    cursor:pointer;
    top:10px;">
                            </i>
                                <i  data-idmenu="<?php echo e($mnu['idmenu']); ?>" data-idmenuitem="<?php echo e($mnu['idmenuitem']); ?>" class="actualizar menu-icon fa fa-plus" style="
    position: absolute;
    z-index:1;
    right: 50px;
    cursor:pointer;
    top:10px;">
                            </i>
                            </div>
                    <?php if(count($mnu['submenus'])>0): ?>
                    <a class="  dropdown-toggle "  href="#"   >
                        <?php else: ?>
                        <a  href="#"  >
                            <?php endif; ?>
                            <i class="menu-icon fa <?php echo e($mnu['imagen']); ?>">
                            </i>
                            <span style=" <?php echo e($color); ?>" class="menu-text">
                                <?php echo e($mnu["Titulo"]); ?>

                            </span>
                        </a>
                    <?php else: ?>
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

                    <?php endif; ?>
                        <?php if(count($mnu["submenus"])>0): ?>
                        <ul class="submenu">
                            <?php $__currentLoopData = $mnu["submenus"]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $submenu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
$seccion = \Session::get('seccion_actual');
if ($seccion == $submenu->session) {
    echo "
                            <li class='active open'>
                                ";
} else {
    echo "
                                <li>
                                    ";
}

?>
                                <?php if($edit): ?>
                                    <?php 
                                        if($submenu->guardar==1){
                                            $color= "color: #e8a3a3";
                                        }
                                        else{
                                            $color= "color: #585858";
                                        }

                                    ?>                                
                                    <a href="#">
                                        <i class="menu-icon fa <?php echo e($submenu->imagen); ?>">
                                        </i>
                                        <div>
                                            <i data-idmenuitem="<?php echo e($submenu->idmenuitem); ?>" class="eliminar menu-icon fa fa-times" style="position: absolute;
    right: 10px;
    top: 10px;
    z-index: 1;">
                                            </i>
                                            <i  data-idmenuitem="<?php echo e($submenu->idmenuitem); ?>" class="editar menu-icon fa fa-pencil" style="position: absolute;
    right: 30px;
    top: 10px;
    z-index: 1;"></i>
                                            <span style=" <?php echo e($color); ?>" class="menu-text">
                                                <?php echo e($submenu->Titulo); ?>

                                            </span>
                                        </div>
                                    </a>
                                </li>

                                <?php else: ?>
                                    <a href="<?php echo e(asset($submenu->Ruta)); ?>">
                                        <i class="menu-icon fa <?php echo e($submenu->imagen); ?>">
                                        </i>
                                        <?php echo e($submenu->Titulo); ?>

                                    </a>
                                </li>
                                <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php if($edit): ?>
                                <li>
                                    <a href="#" class="actualizar" data-idmenu="<?php echo e($mnu['idmenu']); ?>"  data-idmenuitem="<?php echo e($mnu['idmenuitem']); ?>">
                                        <i class="menu-icon">
                                        </i>
                                        <i class="fa fa-plus">
                                        </i>
                                        Añadir item
                                    </a>

                                </li>
                                <?php endif; ?>
                            </li>
                        </ul>
                        <?php endif; ?>
                    </a>
                </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>
                <?php if($edit): ?>
                <li>
                    <a href="#" class="actualizar"  data-idmenuitem=0>
                        <i class="menu-icon fa fa-plus">
                        </i>
                        Añadir item
                    </a>
                </li>
                <?php if($menu): ?>
                    <li>
                        <?php if($menu->guardar==1): ?>
                            <a href="/admin/SaveToFile/<?php echo e($idmenu); ?>" style="color:#f92b08" >
                        <?php else: ?>
                            <a href="/admin/SaveToFile/<?php echo e($idmenu); ?>" >                
                        <?php endif; ?>
                                <i class="menu-icon fa fa-save">
                                </i>
                                Guardar cambios
                            </a>
                    </li> 
                <?php else: ?>
                    <li>
                            <a href="/admin/SaveToFile/<?php echo e($idmenu); ?>" >                
                                <i class="menu-icon fa fa-save">
                                </i>
                                Guardar cambios
                            </a>
                    </li>
                <?php endif; ?>
                <li>
                    <a href="/admin/dashboard">
                        <i class="menu-icon fa fa-reply">
                        </i>
                        Volver al Dashboard
                    </a>
                </li>

                <?php endif; ?>

            </ul>
        </div>
    </div>
</div>
