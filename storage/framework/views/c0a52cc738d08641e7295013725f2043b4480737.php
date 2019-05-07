
 <div class="sidebar" data-color="blue" data-image="<?php echo e(asset('img/sidebar-1.jpg')); ?>">
      <!--
            Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

            Tip 2: you can also add an image using data-image tag
        -->

<div class="sidebar responsive ace-save-state" id="sidebar">
                <script type="text/javascript">
                    try{ace.settings.loadState('sidebar')}catch(e){}
                </script>
        <div lass="sidebar-shortcuts" id="sidebar-shortcuts">
              <ul class="nav nav-list">

              <?php
$seccion = \Session::get('seccion_actual');
if ($seccion === "paquetes" or $seccion === "paquetescontratados") {
    echo "<li class='active open'>";
} else {
    echo "<li>";
}
?>
                      <a class="dropdown-toggle" href="#">
                          <i class="menu-icon fa fa-tachometer">
                          </i>
                          <span class ="menu-text">
                          Paquetes
                        </span>
                      </a>
                        <b class="arrow">
                        </b>
                        <ul class="submenu">

                                <?php
$seccion = \Session::get('seccion_actual');
if ($seccion === "paquetescontratados") {
    echo "<li class='active open'>";
} else {
    echo "<li>";
}
?>
                                <a href="<?php echo e(asset('/anunciante/paquete')); ?>">
                                    <i class="menu-icon fa fa-caret-right">
                                    </i>
                                    Contratados
                                </a>
                                <b class="arrow">
                                </b>
                            </li>
                        </ul>
                  </li>

              <?php
$seccion = \Session::get('seccion_actual');
if ($seccion === "Imagen") {
    echo "<li class='active'>";
} else {
    echo "<li>";
}
?>
                      <a class="" href="<?php echo e(asset('/anunciante/Imagen')); ?>">
                          <i class="menu-icon fa fa-tachometer">
                          </i>
                          <span class ="menu-text">
                          Imagen
                        </span>
                      </a>
                  </li>
              <?php
$seccion = \Session::get('seccion_actual');
if ($seccion === "Anuncio" or $seccion === "AnuncioP") {
    echo "<li class='active open'>";
} else {
    echo "<li>";
}
?>
                      <a class="dropdown-toggle" href="#">
                          <i class="menu-icon fa fa-tachometer">
                          </i>
                          <span class ="menu-text">
                          Anuncios
                        </span>
                      </a>
                        <b class="arrow">
                        </b>
                        <ul class="submenu">
<?php
$seccion = \Session::get('seccion_actual');
if ($seccion === "Anuncio") {
    echo "<li class='active open'>";
} else {
    echo "<li>";
}
?>

                                <a href="<?php echo e(asset('Anuncio')); ?>">
                                    <i class="menu-icon fa fa-caret-right">
                                    </i>
                                    Anuncios Modelo
                                </a>
                                <b class="arrow">
                                </b>
                            </li>
                                <?php
$seccion = \Session::get('seccion_actual');
if ($seccion === "AnuncioP") {
    echo "<li class='active open'>";
} else {
    echo "<li>";
}
?>
                                <a href="<?php echo e(asset('/anunciante/listarAnunciosProgramados')); ?>">
                                    <i class="menu-icon fa fa-caret-right">
                                    </i>
                                    Anuncios Programados
                                </a>
                                <b class="arrow">
                                </b>
                            </li>
                        </ul>
                  </li>

<?php
$seccion = \Session::get('seccion_actual');
if ($seccion === "InfoCuenta") {
    echo "<li class='active'>";
} else {
    echo "<li>";
}
?>
                      <a class="" href="<?php echo e(asset('/anunciante/infocuenta')); ?>">
                          <i class="menu-icon fa fa-tachometer">
                          </i>
                          <span class ="menu-text">
                          Info Cuenta
                        </span>
                      </a>
                  </li>
<?php
$seccion = \Session::get('seccion_actual');
if ($seccion === "ContratarDias") {
    echo "<li class='active'>";
} else {
    echo "<li>";
}
?>
                      <a class="" href="<?php echo e(asset('/anunciante/ContratarDias')); ?>">
                          <i class="menu-icon fa fa-tachometer">
                          </i>
                          <span class ="menu-text">
                          Contratar dias
                        </span>
                      </a>
                  </li>
              <?php
$seccion = \Session::get('seccion_actual');
if ($seccion === "MiCuentaPendiente" or $seccion === "MisFacturas") {
    echo "<li class='active open'>";
} else {
    echo "<li>";
}
?>
                      <a class="dropdown-toggle" href="#">
                          <i class="menu-icon fa fa-tachometer">
                          </i>
                          <span class ="menu-text">
                          Mi cuenta
                        </span>
                      </a>
                        <b class="arrow">
                        </b>
                        <ul class="submenu">
<?php
$seccion = \Session::get('seccion_actual');
if ($seccion === "MiCuentaPendiente") {
    echo "<li class='active open'>";
} else {
    echo "<li>";
}
?>

                                <a href="<?php echo e(asset('/anunciante/listarPendienteReferidos')); ?>">
                                    <i class="menu-icon fa fa-caret-right">
                                    </i>
                                    Pendiente de cobro
                                </a>
                                <b class="arrow">
                                </b>
                            </li>
                                <?php
$seccion = \Session::get('seccion_actual');
if ($seccion === "MisFacturas") {
    echo "<li class='active open'>";
} else {
    echo "<li>";
}
?>
                                <a href="<?php echo e(asset('/anunciante/getUserFacturas')); ?>">
                                    <i class="menu-icon fa fa-caret-right">
                                    </i>
                                    Facturas
                                </a>
                                <b class="arrow">
                                </b>
                            </li>
                        </ul>
                  </li>


        </ul>
        </div>

</div>
      </div>