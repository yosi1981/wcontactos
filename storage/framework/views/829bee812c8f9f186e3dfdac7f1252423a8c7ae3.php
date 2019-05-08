
        <div class= "sidebar" data-color="blue" data-image="<?php echo e(asset('img/sidebar-1.jpg')); ?>">
            <div class="sidebar responsive ace-save-state" id="sidebar">
                <script type="text/javascript">
                     try{ace.settings.loadState("sidebar")}catch(e){}
                </script>
                <div class="sidebar-shortcuts" id="sidebar-shortcuts" >
                    <ul class="nav nav-list">
        <?php $seccion = \Session::get('seccion_actual');if ( $seccion === "anuncio" or  $seccion === "Anuncio" or  $seccion === "AnuncioP") {echo "<li class='active open' style='text-align: left;'>";} else {echo "<li style='text-align: left;'>";}?><a class="dropdown-toggle" href="#">
    <i class="menu-icon fa fa-amazon">
                                </i>
                                <span class="menu-text">
		ANUNCIO
</span>
                            </a>
<ul class="submenu">
<?php $seccion = \Session::get('seccion_actual');if ($seccion === "Anuncio") {echo "<li class='active open' style='text-align: left;'>";} else {echo "<li style='text-align: left;'>";}?><a href="<?php echo e(URL::to('/anunciante/AnuncioA')); ?>">

                                        <i class="menu-icon fa fa-arrow-right">
                                        </i>
                                        <span class="menu-text">Modelos</span>
                                        </a>
</li>
<?php $seccion = \Session::get('seccion_actual');if ($seccion === "AnuncioP") {echo "<li class='active open' style='text-align: left;'>";} else {echo "<li style='text-align: left;'>";}?><a href="<?php echo e(URL::to('/anunciante/listarAnunciosProgramados')); ?>">

                                        <i class="menu-icon fa fa-arrow-right">
                                        </i>
                                        <span class="menu-text">Programados</span>
                                        </a>
</li>
</ul></li>
<?php $seccion = \Session::get('seccion_actual');if ( $seccion === "ContratarDias") {echo "<li class='active open' style='text-align: left;'>";} else {echo "<li style='text-align: left;'>";}?><a  href="/anunciante/ContratarDias">
    <i class="menu-icon fa fa-paypal">
                                </i>
                                <span class="menu-text">
		COMPRA DIAS
</span>
                            </a>
</li>
<?php $seccion = \Session::get('seccion_actual');if ( $seccion === "imagen") {echo "<li class='active open' style='text-align: left;'>";} else {echo "<li style='text-align: left;'>";}?><a  href="/anunciante/Imagen">
    <i class="menu-icon fa fa-image">
                                </i>
                                <span class="menu-text">
		IMAGEN
</span>
                            </a>
</li>

                </div>
            </div>
        </div>