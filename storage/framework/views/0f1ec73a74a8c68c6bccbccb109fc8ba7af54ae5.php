<div class="sidebar" data-color="blue" data-image="<?php echo e(asset('img/sidebar-1.jpg')); ?>">
    <!--
            Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

            Tip 2: you can also add an image using data-image tag
        -->
    <div class="sidebar responsive ace-save-state" id="sidebar">
        <script type="text/javascript">
            try{ace.settings.loadState('sidebar')}catch(e){}
        </script>
        <div id="sidebar-shortcuts" lass="sidebar-shortcuts">
            <ul class="nav nav-list">
                <?php
$seccion = \Session::get('seccion_actual');
if ($seccion === "provincias") {
    echo "<li class='active'>
                ";
} else {
    echo "
                <li>
                    ";
}
?>
                    <a class="" href="<?php echo e(asset('/admin/Provincia')); ?>">
                        <i class="menu-icon fa fa-file-pdf-o" style="font-size:24px;color:red">
                        </i>
                        <span class="menu-text">
                            Provincias
                        </span>
                    </a>
                </li>
                <?php
$seccion = \Session::get('seccion_actual');
if ($seccion === "paquetes" or $seccion === "promociones" or $seccion === "paquetescontratados") {
    echo "<li class='active open'>
                ";
} else {
    echo "
                <li>
                    ";
}
?>
                    <a class="dropdown-toggle" href="#">
                        <i class="menu-icon fa fa-tachometer">
                        </i>
                        <span class="menu-text">
                            Paquetes
                        </span>
                    </a>
                    <ul class="submenu">
                        <?php
$seccion = \Session::get('seccion_actual');
if ($seccion === "promociones") {
    echo "<li class='active open'>
                        ";
} else {
    echo "
                        <li>
                            ";
}
?>
                            <a href="<?php echo e(asset('Promocion')); ?>">
                                <i class="menu-icon fa fa-caret-right">
                                </i>
                                Promociones
                            </a>
                        </li>
                        <?php
$seccion = \Session::get('seccion_actual');
if ($seccion === "paquetescontratados") {
    echo "<li class='active open'>
                        ";
} else {
    echo "
                        <li>
                            ";
}
?>
                            <a href="<?php echo e(asset('/admin/paquete')); ?>">
                                <i class="menu-icon fa fa-caret-right">
                                </i>
                                Contratados
                            </a>
                        </li>
                    </ul>
                </li>
                <?php
$seccion = \Session::get('seccion_actual');
if ($seccion === "Imagen") {
    echo "<li class='active'>
                ";
} else {
    echo "
                <li>
                    ";
}
?>
                    <a class="" href="<?php echo e(asset('/admin/Imagen')); ?>">
                        <i class="menu-icon fa fa-tachometer">
                        </i>
                        <span class="menu-text">
                            Imagen
                        </span>
                    </a>
                </li>
                <?php
$seccion = \Session::get('seccion_actual');
if ($seccion === "Anuncio" or $seccion === "AnuncioP") {
    echo "<li class='active open'>
                ";
} else {
    echo "
                <li>
                    ";
}
?>
                    <a class="dropdown-toggle" href="#">
                        <i class="menu-icon fa fa-tachometer">
                        </i>
                        <span class="menu-text">
                            Anuncios
                        </span>
                    </a>
                    <ul class="submenu">
                        <?php
$seccion = \Session::get('seccion_actual');
if ($seccion === "Anuncio") {
    echo "<li class='active open'>
                        ";
} else {
    echo "
                        <li>
                            ";
}
?>
                            <a href="<?php echo e(asset('Anuncio')); ?>">
                                <i class="menu-icon fa fa-caret-right">
                                </i>
                                Anuncios Modelo
                            </a>
                        </li>
                        <?php
$seccion = \Session::get('seccion_actual');
if ($seccion === "AnuncioP") {
    echo "<li class='active open'>
                        ";
} else {
    echo "
                        <li>
                            ";
}
?>
                            <a href="<?php echo e(asset('/admin/listarAnunciosProgramados')); ?>">
                                <i class="menu-icon fa fa-caret-right">
                                </i>
                                Anuncios Programados
                            </a>
                        </li>
                    </ul>
                </li>
                <?php
$seccion = \Session::get('seccion_actual');
if ($seccion === "Usuario") {
    echo "<li class='active'>
                ";
} else {
    echo "
                <li>
                    ";
}
?>
                    <a class="" href="<?php echo e(asset('/Usuario')); ?>">
                        <i class="menu-icon fa fa-tachometer">
                        </i>
                        <span class="menu-text">
                            Usuario
                        </span>
                    </a>
                </li>
                <?php
$seccion = \Session::get('seccion_actual');
if ($seccion === "InfoCuenta") {
    echo "<li class='active'>
                ";
} else {
    echo "
                <li>
                    ";
}
?>
                    <a class="" href="<?php echo e(asset('/admin/infocuenta')); ?>">
                        <i class="menu-icon fa fa-tachometer">
                        </i>
                        <span class="menu-text">
                            Info Cuenta
                        </span>
                    </a>
                </li>
                <?php
$seccion = \Session::get('seccion_actual');
if ($seccion === "MiCuentaPendiente" or $seccion === "MisFacturas") {
    echo "<li class='active open'>
                ";
} else {
    echo "
                <li>
                    ";
}
?>
                    <a class="dropdown-toggle" href="#">
                        <i class="menu-icon fa fa-tachometer">
                        </i>
                        <span class="menu-text">
                            Mi cuenta
                        </span>
                    </a>
                    <ul class="submenu">
                        <?php
$seccion = \Session::get('seccion_actual');
if ($seccion === "MiCuentaPendiente") {
    echo "<li class='active open'>
                        ";
} else {
    echo "
                        <li>
                            ";
}
?>
                            <a href="<?php echo e(asset('/admin/listarPendienteReferidos')); ?>">
                                <i class="menu-icon fa fa-caret-right">
                                </i>
                                Pendiente de cobro
                            </a>
                        </li>
                        <?php
$seccion = \Session::get('seccion_actual');
if ($seccion === "MisFacturas") {
    echo "<li class='active open'>
                        ";
} else {
    echo "
                        <li>
                            ";
}
?>
                            <a href="<?php echo e(asset('/admin/getUserFacturas')); ?>">
                                <i class="menu-icon fa fa-caret-right">
                                </i>
                                Facturas
                            </a>
                        </li>
                    </ul>
                </li>
                <?php
$seccion = \Session::get('seccion_actual');
if ($seccion === "pagosxlotes" or $seccion === "facturacion" or $seccion === "listarpagos" or $seccion === "infoweb" or $seccion === "ListadoFacturas") {
    echo "<li class='active open'>
                ";
} else {
    echo "
                <li>
                    ";
}
?>
                    <a class="dropdown-toggle" href="#">
                        <i class="menu-icon fa fa-tachometer">
                        </i>
                        <span class="menu-text">
                            Administracion
                        </span>
                    </a>
                    <ul class="submenu">
                        <?php
$seccion = \Session::get('seccion_actual');
if ($seccion === "infoweb") {
    echo "<li class='active open'>
                        ";
} else {
    echo "
                        <li>
                            ";
}
?>
                            <a href="<?php echo e(asset('admin/infoweb')); ?>">
                                <i class="menu-icon fa fa-caret-right">
                                </i>
                                Info Web
                            </a>
                        </li>
                        <?php
$seccion = \Session::get('seccion_actual');
if ($seccion === "facturacion") {
    echo "<li class='active open'>
                        ";
} else {
    echo "
                        <li>
                            ";
}
?>
                            <a href="<?php echo e(asset('admin/PendienteFacturar')); ?>">
                                <i class="menu-icon fa fa-caret-right">
                                </i>
                                Facturacion
                            </a>
                        </li>
                        <?php
$seccion = \Session::get('seccion_actual');
if ($seccion === "ListadoFacturas") {
    echo "<li class='active open'>
                        ";
} else {
    echo "
                        <li>
                            ";
}
?>
                            <a href="<?php echo e(asset('admin/getAllFacturas')); ?>">
                                <i class="menu-icon fa fa-caret-right">
                                </i>
                                Listado Facturas
                            </a>
                        </li>
                        <?php
$seccion = \Session::get('seccion_actual');
if ($seccion === "pagosxlotes") {
    echo "<li class='active open'>
                        ";
} else {
    echo "
                        <li>
                            ";
}
?>
                            <a href="<?php echo e(asset('/admin/GetFacturasPagar')); ?>">
                                <i class="menu-icon fa fa-caret-right">
                                </i>
                                Realizar Pagos
                            </a>
                        </li>
                        <?php
$seccion = \Session::get('seccion_actual');
if ($seccion === "listarpagos") {
    echo "<li class='active open'>
                        ";
} else {
    echo "
                        <li>
                            ";
}
?>
                            <a href="<?php echo e(asset('/admin/listarPxL')); ?>">
                                <i class="menu-icon fa fa-caret-right">
                                </i>
                                Listado Pagos
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>
