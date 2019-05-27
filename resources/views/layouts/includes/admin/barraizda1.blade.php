
        <div class="menu ">
            <ol class="menu-list"><?php $i=0;
                        $total=count($menu);
                        ?>
                        <li class="menu-item menu2-item" ><a class="speciala" href="/admin/Imagen">     <div class="menu-handle menu2-handle" >
                                <i class="normal-icon ace-icon fa fa-image bigger-130 sombra" style="color:#16a765"></i>
                            </div>
                            <div class="menu2-content"><?php $seccion = \Session::get('seccion_actual');?>estatico</div></a></li><?php $i=0;
                        $total=count($menu);
                        ?>
                        <li class="menu-item menu2-item" ><a class="speciala" href="/ActualizarUsuario/{id}">     <div class="menu-handle menu2-handle" >
                                <i class="normal-icon ace-icon fa fa-binoculars bigger-130 sombra" style="color:#555"></i>
                            </div>
                            <div class="menu2-content"><?php $seccion = \Session::get('seccion_actual');?>a</div></a></li><?php $i=0;
                        $total=count($menu);
                        ?>
                        <li class="menu-item menu2-item" ><a class="speciala" href="/admin/Provincia">     <div class="menu-handle menu2-handle" >
                                <i class="normal-icon ace-icon fa fa-envelope bigger-130 sombra" style="color:#fff"></i>
                            </div>
                            <div class="menu2-content"><?php $seccion = \Session::get('seccion_actual');?>PROVINCIAS</div></a></li><?php $i=0;
                        $total=count($menu);
                        ?>
                        <li class="menu-item menu2-item" >     <div class="menu-handle menu2-handle" >
                                <i class="normal-icon ace-icon fa fa-file-text bigger-130 sombra" style="color:#9fe1e7"></i>
                            </div>
                            <div class="menu2-content"><?php $seccion = \Session::get('seccion_actual');?><?php if ( $seccion === "anuncio"){
                            echo "<i style='position:relative;left:-5px;' class='plus  fa fa-minus sombra '  aria-hidden='true' ></i>";
                            }
                            else{
                            echo "<i style='position:relative;left:-5px;' class='plus  fa fa-plus sombra  '  aria-hidden='true' style='text-shadow: 1px 2px 3px #696;'></i>";
                            }
                            ?>ANUNCIO</div><ol class="menu-list" style="display:none;"><?php $i=0;
                                    $total=count($menu);
                                    ?>
                                    <li class="menu-item menu2-item" >
                                        <div class="menu-handle menu2-handle" >
                                            <i class="normal-icon ace-icon fa fa-clock-o bigger-130 sombra" style="color:#555"></i>
                                        </div>
                                        <div class="menu2-content"><?php $seccion = \Session::get('seccion_actual');?>Programados</div></li><?php $i=0;
                                    $total=count($menu);
                                    ?>
                                    <li class="menu-item menu2-item" >
                                        <div class="menu-handle menu2-handle" >
                                            <i class="normal-icon ace-icon fa fa-file bigger-130 sombra" style="color:#4986e7"></i>
                                        </div>
                                        <div class="menu2-content"><?php $seccion = \Session::get('seccion_actual');?>Modelos</div></li></ol></li><?php $i=0;
                        $total=count($menu);
                        ?>
                        <li class="menu-item menu2-item" ><a class="speciala" href="/ActualizarUsuario/{id}">     <div class="menu-handle menu2-handle" >
                                <i class="normal-icon ace-icon fa fa-edit bigger-130 sombra" style="color:#fa573c"></i>
                            </div>
                            <div class="menu2-content"><?php $seccion = \Session::get('seccion_actual');?>EDITOR MENU</div></a></li><?php $i=0;
                        $total=count($menu);
                        ?>
                        <li class="menu-item menu2-item" ><a class="speciala" href="/ActualizarUsuario/{id}">     <div class="menu-handle menu2-handle" >
                                <i class="normal-icon ace-icon fa fa-paypal bigger-130 sombra" style="color:#4986e7"></i>
                            </div>
                            <div class="menu2-content"><?php $seccion = \Session::get('seccion_actual');?>PROMOCIONES</div></a></li><?php $i=0;
                        $total=count($menu);
                        ?>
                        <li class="menu-item menu2-item" ><a class="speciala" href="/Usuario">     <div class="menu-handle menu2-handle" >
                                <i class="normal-icon ace-icon fa fa-user bigger-130 sombra" style="color:#555"></i>
                            </div>
                            <div class="menu2-content"><?php $seccion = \Session::get('seccion_actual');?>USUARIOS</div></a></li><?php $i=0;
                        $total=count($menu);
                        ?>
                        <li class="menu-item menu2-item" >     <div class="menu-handle menu2-handle" >
                                <i class="normal-icon ace-icon fa fa-wheelchair bigger-130 sombra" style="color:#4986e7"></i>
                            </div>
                            <div class="menu2-content"><?php $seccion = \Session::get('seccion_actual');?><?php if ( $seccion === "config"){
                            echo "<i style='position:relative;left:-5px;' class='plus  fa fa-minus sombra '  aria-hidden='true' ></i>";
                            }
                            else{
                            echo "<i style='position:relative;left:-5px;' class='plus  fa fa-plus sombra  '  aria-hidden='true' style='text-shadow: 1px 2px 3px #696;'></i>";
                            }
                            ?>CONFIG.</div><ol class="menu-list" style="display:none;"><?php $i=0;
                                    $total=count($menu);
                                    ?>
                                    <li class="menu-item menu2-item" >
                                        <div class="menu-handle menu2-handle" >
                                            <i class="normal-icon ace-icon fa fa-tasks bigger-130 sombra" style="color:#fa573c"></i>
                                        </div>
                                        <div class="menu2-content"><?php $seccion = \Session::get('seccion_actual');?>EDITOR MENU</div></li><?php $i=0;
                                    $total=count($menu);
                                    ?>
                                    <li class="menu-item menu2-item" >
                                        <div class="menu-handle menu2-handle" >
                                            <i class="normal-icon ace-icon fa fa-arrow-right bigger-130 sombra" style="color:#4986e7"></i>
                                        </div>
                                        <div class="menu2-content"><?php $seccion = \Session::get('seccion_actual');?><?php if ( $seccion === "editincludescripts"){
                                        echo "<i style='position:relative;left:-5px;' class='plus  fa fa-minus sombra '  aria-hidden='true' ></i>";
                                        }
                                        else{
                                        echo "<i style='position:relative;left:-5px;' class='plus  fa fa-plus sombra  '  aria-hidden='true' style='text-shadow: 1px 2px 3px #696;'></i>";
                                        }
                                        ?>SCRIPTS</div></li><?php $i=0;
                                    $total=count($menu);
                                    ?>
                                    <li class="menu-item menu2-item" >
                                        <div class="menu-handle menu2-handle" >
                                            <i class="normal-icon ace-icon fa fa-save bigger-130 sombra" style="color:#f83a22"></i>
                                        </div>
                                        <div class="menu2-content"><?php $seccion = \Session::get('seccion_actual');?>CSS</div></li></ol></li>  </ol>
                        </div>
        <script type='text/javascript'>
            jQuery(function($){
                $('.menu2-content ,.menu2-handle').on('mouseenter',function(e){
                    var padre=$(this).parent();
                    padre.find('.opciones').first().attr('style','display:block');
                });
                $('.menu2-content ,.menu2-handle').on('mouseleave',function(e){
                    var padre=$(this).parent();
                    padre.find('.opciones').first().attr('style','display:none');
                });
                $('.plus').on('click',function(e){
                    var actual=$(this).parent('.menu2-content').next('ol');
                    if($(this).hasClass('fa fa-plus')){
                        $(this).removeClass().addClass('plus').addClass('fa fa-minus sombra');
                        actual.removeAttr('style').attr('style','display:block');
                    }
                    else
                    {
                        $(this).removeClass().addClass('plus').addClass('fa fa-plus sombra');
                        actual.removeAttr('style').attr('style','display:none');;                       
                    }
                });

            });
        </script>
                