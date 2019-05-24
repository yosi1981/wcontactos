
        <div class= "sidebar" data-color="blue" data-image="<?php echo e(asset('img/sidebar-1.jpg')); ?>">
            <div class="sidebar responsive ace-save-state" id="sidebar">
                <script type="text/javascript">
                     try{ace.settings.loadState("sidebar")}catch(e){}
                </script>
                <div class="sidebar-shortcuts" id="sidebar-shortcuts" >
                    <ul class="nav nav-list">
        <?php $seccion = \Session::get('seccion_actual');if ( $seccion === "imagen") {echo "<li class='active open' style='text-align: left;'>";} else {echo "<li style='text-align: left;'>";}?><a  href="/admin/Imagen">
    <i class="menu-icon fa fa-hourglass-1">
                                </i>
                                <span class="menu-text">
		IMAGEN
</span>
                            </a>
</li>
<?php $seccion = \Session::get('seccion_actual');if ( $seccion === "provincias") {echo "<li class='active open' style='text-align: left;'>";} else {echo "<li style='text-align: left;'>";}?><a  href="/admin/Provincia">
    <i class="menu-icon fa fa-stop-circle">
                                </i>
                                <span class="menu-text">
		PROVINCIAS
</span>
                            </a>
</li>
<?php $seccion = \Session::get('seccion_actual');if ( $seccion === "paquetes" or  $seccion === "promociones" or  $seccion === "paquetescontratados") {echo "<li class='active open' style='text-align: left;'>";} else {echo "<li style='text-align: left;'>";}?><a class="dropdown-toggle" href="#">
    <i class="menu-icon fa fa-suitcase">
                                </i>
                                <span class="menu-text">
		PAQUETES
</span>
                            </a>
<ul class="submenu">
<?php $seccion = \Session::get('seccion_actual');if ($seccion === "promociones") {echo "<li class='active open' style='text-align: left;'>";} else {echo "<li style='text-align: left;'>";}?><a href="<?php echo e(URL::to('/admin/Promocion')); ?>">

                                        <i class="menu-icon fa fa-arrow-right">
                                        </i>
                                        <span class="menu-text">Promociones</span>
                                        </a>
</li>
<?php $seccion = \Session::get('seccion_actual');if ($seccion === "paquetescontratados") {echo "<li class='active open' style='text-align: left;'>";} else {echo "<li style='text-align: left;'>";}?><a href="<?php echo e(URL::to('/admin/paquete')); ?>">

                                        <i class="menu-icon fa fa-arrow-right">
                                        </i>
                                        <span class="menu-text">Contratados</span>
                                        </a>
</li>
</ul></li>
<?php $seccion = \Session::get('seccion_actual');if ( $seccion === "anuncio" or  $seccion === "Anuncio" or  $seccion === "AnuncioP") {echo "<li class='active open' style='text-align: left;'>";} else {echo "<li style='text-align: left;'>";}?><a class="dropdown-toggle" href="#">
    <i class="menu-icon fa fa-amazon">
                                </i>
                                <span class="menu-text">
		ANUNCIO
</span>
                            </a>
<ul class="submenu">
<?php $seccion = \Session::get('seccion_actual');if ($seccion === "Anuncio") {echo "<li class='active open' style='text-align: left;'>";} else {echo "<li style='text-align: left;'>";}?><a href="<?php echo e(URL::to('/admin/Anuncio')); ?>">

                                        <i class="menu-icon fa fa-arrow-right">
                                        </i>
                                        <span class="menu-text">Modelos</span>
                                        </a>
</li>
<?php $seccion = \Session::get('seccion_actual');if ($seccion === "AnuncioP") {echo "<li class='active open' style='text-align: left;'>";} else {echo "<li style='text-align: left;'>";}?><a href="<?php echo e(URL::to('/admin/listarAnunciosProgramados')); ?>">

                                        <i class="menu-icon fa fa-arrow-right">
                                        </i>
                                        <span class="menu-text">Programados</span>
                                        </a>
</li>
</ul></li>
<?php $seccion = \Session::get('seccion_actual');if ( $seccion === "config" or  $seccion === "editmenu" or  $seccion === "editincludecss" or  $seccion === "editincludescripts" or  $seccion === "asdf") {echo "<li class='active open' style='text-align: left;'>";} else {echo "<li style='text-align: left;'>";}?><a class="dropdown-toggle" href="#">
    <i class="menu-icon fa fa-wheelchair">
                                </i>
                                <span class="menu-text">
		CONFIG.
</span>
                            </a>
<ul class="submenu">
<?php $seccion = \Session::get('seccion_actual');if ($seccion === "editmenu") {echo "<li class='active open' style='text-align: left;'>";} else {echo "<li style='text-align: left;'>";}?><a href="<?php echo e(URL::to('/admin/editmenu/{idmenu?}')); ?>">

                                        <i class="menu-icon fa fa-arrow-right">
                                        </i>
                                        <span class="menu-text">EDITOR MENU</span>
                                        </a>
</li>
<?php $seccion = \Session::get('seccion_actual');if ($seccion === "editincludecss") {echo "<li class='active open' style='text-align: left;'>";} else {echo "<li style='text-align: left;'>";}?><a href="<?php echo e(URL::to('/admin/editincludesstyles')); ?>">

                                        <i class="menu-icon fa fa-arrow-right">
                                        </i>
                                        <span class="menu-text">CSS</span>
                                        </a>
</li>
<?php $seccion = \Session::get('seccion_actual');if ($seccion === "editincludescripts") {echo "<li class='active open' style='text-align: left;'>";} else {echo "<li style='text-align: left;'>";}?><a href="<?php echo e(URL::to('/admin/editincludescripts')); ?>">

                                        <i class="menu-icon fa fa-arrow-right">
                                        </i>
                                        <span class="menu-text">SCRIPTS</span>
                                        </a>
</li>
<?php $seccion = \Session::get('seccion_actual');if ($seccion === "asdf") {echo "<li class='active open' style='text-align: left;'>";} else {echo "<li style='text-align: left;'>";}?><a href="<?php echo e(URL::to('afsdf')); ?>">

                                        <i class="menu-icon fa asdfasdf">
                                        </i>
                                        <span class="menu-text">asdf</span>
                                        </a>
</li>
</ul></li>
<?php $seccion = \Session::get('seccion_actual');if ( $seccion === "Usuario") {echo "<li class='active open' style='text-align: left;'>";} else {echo "<li style='text-align: left;'>";}?><a  href="/Usuario">
    <i class="menu-icon fa fa-user">
                                </i>
                                <span class="menu-text">
		USUARIOS
</span>
                            </a>
</li>

                </div>
            </div>
        </div>