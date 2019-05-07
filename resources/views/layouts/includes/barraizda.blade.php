<div class="sidebar" data-color="blue" data-image="{{asset('img/sidebar-1.jpg') }}">
    <div class="sidebar responsive ace-save-state" id="sidebar">
        <script type="text/javascript">
            try{ace.settings.loadState('sidebar')}catch(e){}
        </script>
        <div lass="sidebar-shortcuts" id="sidebar-shortcuts" >
            <ul class="nav nav-list">
@if($menu)
                @foreach($menu->items as $mnu)
                <?php
$cond   = array();
$cond[] = $mnu['sesion'];?>
                @if(count($mnu['submenus'])>0)
                            @foreach($mnu["submenus"] as $submenu)
                <?php $cond[] = $submenu->session?>
                            @endforeach
                        @endif
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
                    @if($edit)
                    <?php 
                        if($mnu['guardar']==1){
                            $color= "color: #e8a3a3";
                        }
                        else{
                            $color= "color: #585858";
                        }

                    ?>
                            <div>
                            <i data-idmenuitem="{{$mnu['idmenuitem']}}" class="eliminar menu-icon fa fa-times" style="
    position: absolute;
    z-index:1;
    right: 10px;
    cursor:pointer;
    top:10px;">
                            </i>
                            <i  data-idmenuitem="{{$mnu['idmenuitem']}}" class="editar menu-icon fa fa-pencil" style="
    position: absolute;
    z-index:1;
    right: 30px;
    cursor:pointer;
    top:10px;">
                            </i>
                                <i  data-idmenu="{{$mnu['idmenu']}}" data-idmenuitem="{{$mnu['idmenuitem']}}" class="actualizar menu-icon fa fa-plus" style="
    position: absolute;
    z-index:1;
    right: 50px;
    cursor:pointer;
    top:10px;">
                            </i>
                            </div>
                    @if(count($mnu['submenus'])>0)
                    <a class="  dropdown-toggle "  href="#"   >
                        @else
                        <a  href="#"  >
                            @endif
                            <i class="menu-icon fa {{$mnu['imagen']}}">
                            </i>
                            <span style=" {{ $color }}" class="menu-text">
                                {{$mnu["Titulo"]}}
                            </span>
                        </a>
                    @else
                    @if(count($mnu['submenus'])>0)
                    <a class="dropdown-toggle" href="#">
                        @else
                        <a class="" href="{{asset($mnu['Ruta'])}}">
                            @endif
                            <i class="menu-icon fa {{$mnu['imagen']}}">
                            </i>

                            <span class="menu-text">
                                {{$mnu["Titulo"]}}
                            </span>
                        </a>

                    @endif
                        @if(count($mnu["submenus"])>0)
                        <ul class="submenu">
                            @foreach($mnu["submenus"] as $submenu)
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
                                @if($edit)
                                    <?php 
                                        if($submenu->guardar==1){
                                            $color= "color: #e8a3a3";
                                        }
                                        else{
                                            $color= "color: #585858";
                                        }

                                    ?>                                
                                    <a href="#">
                                        <i class="menu-icon fa {{$submenu->imagen}}">
                                        </i>
                                        <div>
                                            <i data-idmenuitem="{{$submenu->idmenuitem}}" class="eliminar menu-icon fa fa-times" style="position: absolute;
    right: 10px;
    top: 10px;
    z-index: 1;">
                                            </i>
                                            <i  data-idmenuitem="{{$submenu->idmenuitem}}" class="editar menu-icon fa fa-pencil" style="position: absolute;
    right: 30px;
    top: 10px;
    z-index: 1;"></i>
                                            <span style=" {{ $color }}" class="menu-text">
                                                {{$submenu->Titulo}}
                                            </span>
                                        </div>
                                    </a>
                                </li>

                                @else
                                    <a href="{{ asset($submenu->Ruta)}}">
                                        <i class="menu-icon fa {{$submenu->imagen}}">
                                        </i>
                                        {{$submenu->Titulo}}
                                    </a>
                                </li>
                                @endif
                                @endforeach
                                @if($edit)
                                <li>
                                    <a href="#" class="actualizar" data-idmenu="{{$mnu['idmenu']}}"  data-idmenuitem="{{$mnu['idmenuitem']}}">
                                        <i class="menu-icon">
                                        </i>
                                        <i class="fa fa-plus">
                                        </i>
                                        Añadir item
                                    </a>

                                </li>
                                @endif
                            </li>
                        </ul>
                        @endif
                    </a>
                </li>
                @endforeach
@endif
                @if($edit)
                <li>
                    <a href="#" class="actualizar"  data-idmenuitem=0>
                        <i class="menu-icon fa fa-plus">
                        </i>
                        Añadir item
                    </a>
                </li>
                @if($menu)
                    <li>
                        @if($menu->guardar==1)
                            <a href="/admin/SaveToFile/{{$idmenu}}" style="color:#f92b08" >
                        @else
                            <a href="/admin/SaveToFile/{{$idmenu}}" >                
                        @endif
                                <i class="menu-icon fa fa-save">
                                </i>
                                Guardar cambios
                            </a>
                    </li> 
                @else
                    <li>
                            <a href="/admin/SaveToFile/{{$idmenu}}" >                
                                <i class="menu-icon fa fa-save">
                                </i>
                                Guardar cambios
                            </a>
                    </li>
                @endif
                <li>
                    <a href="/admin/dashboard">
                        <i class="menu-icon fa fa-reply">
                        </i>
                        Volver al Dashboard
                    </a>
                </li>

                @endif

            </ul>
        </div>
    </div>
</div>
