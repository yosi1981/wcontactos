
        <div class= "sidebar" data-color="blue" data-image="{{asset('img/sidebar-1.jpg') }}">
            <div class="sidebar responsive ace-save-state" id="sidebar">
                <script type="text/javascript">
                     try{ace.settings.loadState("sidebar")}catch(e){}
                </script>
                <div class="sidebar-shortcuts" id="sidebar-shortcuts" >
                    <ul class="nav nav-list">
        <?php $seccion = \Session::get('seccion_actual');if ( $seccion === "imagen") {echo "<li class='active open' style='text-align: left;'>";} else {echo "<li style='text-align: left;'>";}?><a  href="/admin/Imagen">
    <i class="menu-icon fa fa-image">
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
<?php $seccion = \Session::get('seccion_actual');if ($seccion === "promociones") {echo "<li class='active open' style='text-align: left;'>";} else {echo "<li style='text-align: left;'>";}?><a href="/admin/Promocion">

                                        <i class="menu-icon fa fa-arrow-right">
                                        </i>
                                        <span class="menu-text">Promociones</span>
                                        </a>
</li>
<?php $seccion = \Session::get('seccion_actual');if ($seccion === "paquetescontratados") {echo "<li class='active open' style='text-align: left;'>";} else {echo "<li style='text-align: left;'>";}?><a href="/admin/paquete">

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
<?php $seccion = \Session::get('seccion_actual');if ($seccion === "Anuncio") {echo "<li class='active open' style='text-align: left;'>";} else {echo "<li style='text-align: left;'>";}?><a href="/Anuncio">

                                        <i class="menu-icon fa fa-arrow-right">
                                        </i>
                                        <span class="menu-text">Modelos</span>
                                        </a>
</li>
<?php $seccion = \Session::get('seccion_actual');if ($seccion === "AnuncioP") {echo "<li class='active open' style='text-align: left;'>";} else {echo "<li style='text-align: left;'>";}?><a href="/admin/listarAnunciosProgramados">

                                        <i class="menu-icon fa fa-arrow-right">
                                        </i>
                                        <span class="menu-text">Programados</span>
                                        </a>
</li>
</ul></li>
<?php $seccion = \Session::get('seccion_actual');if ( $seccion === "config" or  $seccion === "editmenu") {echo "<li class='active open' style='text-align: left;'>";} else {echo "<li style='text-align: left;'>";}?><a class="dropdown-toggle" href="#">
    <i class="menu-icon fa fa-wheelchair">
                                </i>
                                <span class="menu-text">
		CONFIG.
</span>
                            </a>
<ul class="submenu">
<?php $seccion = \Session::get('seccion_actual');if ($seccion === "editmenu") {echo "<li class='active open' style='text-align: left;'>";} else {echo "<li style='text-align: left;'>";}?><a href="/admin/editmenu">

                                        <i class="menu-icon fa fa-arrow-right">
                                        </i>
                                        <span class="menu-text">EDITOR MENU</span>
                                        </a>
</li>
</ul></li>
<?php $seccion = \Session::get('seccion_actual');if ( $seccion === "editincludescripts") {echo "<li class='active open' style='text-align: left;'>";} else {echo "<li style='text-align: left;'>";}?><a  href="/admin/editincludescripts">
    <i class="menu-icon fa fa-envelope">
                                </i>
                                <span class="menu-text">
		SCRIPTS
</span>
                            </a>
</li>
<?php $seccion = \Session::get('seccion_actual');if ( $seccion === "editincludescss") {echo "<li class='active open' style='text-align: left;'>";} else {echo "<li style='text-align: left;'>";}?><a  href="/admin/editincludesstyles">
    <i class="menu-icon fa fa-arrow-right">
                                </i>
                                <span class="menu-text">
		CSS
</span>
                            </a>
</li>
<?php $seccion = \Session::get('seccion_actual');if ( $seccion === "infocuenta") {echo "<li class='active open' style='text-align: left;'>";} else {echo "<li style='text-align: left;'>";}?><a  href="/admin/infocuenta">
    <i class="menu-icon fa fa-info">
                                </i>
                                <span class="menu-text">
		INFO CUENTA
</span>
                            </a>
</li>
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