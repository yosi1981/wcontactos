
        <div class= "sidebar" data-color="blue" data-image="{{asset('img/sidebar-1.jpg') }}">
            <div class="sidebar responsive ace-save-state" id="sidebar">
                <script type="text/javascript">
                     try{ace.settings.loadState("sidebar")}catch(e){}
                </script>
                <div class="sidebar-shortcuts" id="sidebar-shortcuts" >
                    <ul class="nav nav-list">
        <?php $seccion = \Session::get('seccion_actual');if ( $seccion === "679730431") {echo "<li class='active open' style='text-align: left;'>";} else {echo "<li style='text-align: left;'>";}?><a  href="/colaborador/dashboard">
    <i class="menu-icon fa fa-500px">
                                </i>
                                <span class="menu-text">
		CONFIG.
</span>
                            </a>
</li>
<?php $seccion = \Session::get('seccion_actual');if ( $seccion === "679730431") {echo "<li class='active open' style='text-align: left;'>";} else {echo "<li style='text-align: left;'>";}?><a  href="/colaborador/dashboard">
    <i class="menu-icon fa fa-500px">
                                </i>
                                <span class="menu-text">
		PROMOCIONES
</span>
                            </a>
</li>

                </div>
            </div>
        </div>