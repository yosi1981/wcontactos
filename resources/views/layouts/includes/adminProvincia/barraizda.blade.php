
        <div class= "sidebar" data-color="blue" data-image="{{asset('img/sidebar-1.jpg') }}">
            <div class="sidebar responsive ace-save-state" id="sidebar">
                <script type="text/javascript">
                     try{ace.settings.loadState("sidebar")}catch(e){}
                </script>
                <div class="sidebar-shortcuts" id="sidebar-shortcuts" >
                    <ul class="nav nav-list">
        <?php $seccion = \Session::get('seccion_actual');if ( $seccion === "editmenu") {echo "<li class='active open' style='text-align: left;'>";} else {echo "<li style='text-align: left;'>";}?><a  href="/delegado/dashboard">
    <i class="menu-icon fa fa-500px">
                                </i>
                                <span class="menu-text">
		MI CUENTA
</span>
                            </a>
</li>

                </div>
            </div>
        </div>