<?php
namespace App\Http\Traits;

use App\menu;
use App\menuitem;
use DB;

trait trait1
{
    public function MenuIzquierdo($idmenu = 1){
        $menus      = Menu::where('idmenu', '=', $idmenu)->first();
        $i     = 0;
        $items = null;
        $menu=null;
        if($menus)
        {
            $menusitems = DB::table('menuitem')
                ->where('idmenu', '=', $menus->idmenu)
                ->where('idmenuitem_padre', '=', 0)
                ->get();
            if(count($menusitems)>0)
            {
                foreach ($menusitems as $mitem) {
                    $i += 1;
                    $menussubitems = DB::table('menuitem')
                        ->where('idmenu', '=', $menus->idmenu)
                        ->where('idmenuitem_padre', '=', $mitem->idmenuitem)
                        ->get();
                    $menu->items[$i] = array(
                        "idmenuitem"=>$mitem->idmenuitem,
                        "idmenu"=>$mitem->idmenu,
                        "idmenuitem_padre"=>$mitem->idmenuitem_padre,
                        "Titulo"   => $mitem->Titulo,
                        "Ruta"     => $mitem->Ruta,
                        "sesion"   => $mitem->session,
                        "imagen"   => $mitem->imagen,
                        "submenus" => $menussubitems,
                        "guardar"  => $mitem->guardar,
                    );

                }            
                $menu->guardar=$menus->guardar;
                $menu->idmenu=$idmenu;
            }
        }
        return ($menu);
    }

    public function MenuMultinivel($idmenu)
    {
        $i     = 0;
        $items = null;
        $menusitems=DB::table('menuitem')
                ->where('idmenuitem_padre', '=', 0)
                ->where('idmenu','=',$idmenu)
                ->orderBy('orden','asc')
                ->get();
        $menu=null;
            if(count($menusitems)>0)
            {
                foreach ($menusitems as $mitem) {

                    $ruta="";
                    $i += 1;
                    $submenu=null;
                    $menu[$i] = array(
                        "idmenuitem"=>$mitem->idmenuitem,
                        "idmenu"=>$mitem->idmenu,
                        "idmenuitem_padre"=>$mitem->idmenuitem_padre,
                        "Titulo"   => $mitem->Titulo,
                        "Ruta"     => $mitem->Ruta,
                        "sesion"   => $mitem->session,
                        "imagen"   => $mitem->imagen,
                        "color"    => $mitem->color,
                        "guardar"  => $mitem->guardar,
                        "path"     => $this->PathMenuItem($mitem->idmenuitem),
                        "seccion"  => $this->RutaCompletaSeccion($mitem->idmenuitem,$ruta),
                        "items"    => $this->SubMenus($submenu,$mitem->idmenuitem),
                    );
                }
                //$menu["subitems"]=$i;
            }        
            else
            {
                //$menu["subitems"]=0;
            }
        return $menu;
    }

    public function SubMenus($menu,$idmenuitem_padre)
    {
        $i     = 0;
        $items = null;
        $menusitems=DB::table('menuitem')
                ->where('idmenuitem_padre', '=', $idmenuitem_padre)
                ->orderBy('orden','asc')
                ->get();
            if(count($menusitems)>0)
            {
                $i=0;
                foreach ($menusitems as $mitem) {
                    $i += 1;
                    $submenu=null;
                    $ruta="";
                    $menu[$i] = array(
                        "idmenuitem"=>$mitem->idmenuitem,
                        "idmenu"=>$mitem->idmenu,
                        "idmenuitem_padre"=>$mitem->idmenuitem_padre,
                        "Titulo"   => $mitem->Titulo,
                        "Ruta"     => $mitem->Ruta,
                        "sesion"   => $mitem->session,
                        "imagen"   => $mitem->imagen,
                        "color"    => $mitem->color,
                        "guardar"  => $mitem->guardar,
                        "path"     => $this->PathMenuItem($mitem->idmenuitem),
                        "seccion"  => $this->RutaCompletaSeccion($mitem->idmenuitem,$ruta),
                    );
                    $menu[$i]["items"]=$this->SubMenus($submenu,$mitem->idmenuitem);
                }            
                //$menu["subitems"]=$i;
                //$menu["guardar"]=$menus->guardar;
            }
            else
            {
                //$menu["subitems"]=0;
            }
        return $menu;
    }
    public function PathMenuItem($idmenuitem)
    {
        $path[]=null;
        $menuitem=DB::table('menuitem')
                ->where('idmenuitem', '=', $idmenuitem)
                ->first();        
        if($menuitem->idmenuitem_padre!=0)       
        {
            $path=$this->PathRecurMenuItem($menuitem->idmenuitem_padre,$path);
        }
        $path[]=$menuitem->Titulo;
        unset($path[0]);
        return $path;
    }

    public function PathRecurMenuItem($idmenuitem,$path)
    {
        $menuitem=DB::table('menuitem')
                ->where('idmenuitem', '=', $idmenuitem)
                ->first();        
        if($menuitem->idmenuitem_padre!=0)
        {
            $path=$this->PathRecurMenuItem($menuitem->idmenuitem_padre,$path);
        }
        $path[]=$menuitem->Titulo;

        return $path;
    }
    public function RutaCompletaSeccion($idmenuitem)
    {
        $ruta="";
        $menusitem=DB::table('menuitem')
                ->where('idmenuitem', '=', $idmenuitem)
                ->first(); 
                $ruta.=$menusitem->session."/";
                $ruta.=$this->rutaSeccion($idmenuitem);
        $carpetas=explode("/",$ruta);
        array_pop($carpetas);
        return $carpetas;
    }
    public function rutaSeccion($idmenuitem)
    {
        $ruta="";
        $menusitems=DB::table('menuitem')
                ->where('idmenuitem_padre', '=', $idmenuitem)
                ->get(); 
                //dd($menusitems);      
           if(count($menusitems)>0)
            {
                foreach ($menusitems as $mitem) {
                 $ruta.= $this->rutaSeccion($mitem->idmenuitem);
                 $ruta.=$mitem->session."/";
                }            
                //$menu["subitems"]=$i;
                //$menu["guardar"]=$menus->guardar;
            //dd($ruta);
            }
        return $ruta;
    }

    public function menuToFile($idmenu)
    {
        switch ($idmenu) {
            case 1:
                $tuser="admin";
                break;
            case 2:
                $tuser="anunciante";
                break;
            case 3:
                $tuser="adminProvincia";
                break;
            case 4:
                $tuser="colaborador";
                break;
        }

        $menuizquierdo_path=base_path().'/resources/views/layouts/includes/'.$tuser.'/barraizda.blade.php';
        $cabecera="
        <div class= \"sidebar\" data-color=\"blue\" data-image=\"{{asset('img/sidebar-1.jpg') }}\">
            <div class=\"sidebar responsive ace-save-state\" id=\"sidebar\">
                <script type=\"text/javascript\">
                     try{ace.settings.loadState(\"sidebar\")}catch(e){}
                </script>
                <div class=\"sidebar-shortcuts\" id=\"sidebar-shortcuts\" >
                    <ul class=\"nav nav-list\">
        ";
        $menu=$this->MenuIzquierdo($idmenu);
        $seccion = \Session::get('seccion_actual');
            $strmitem="";
        if($menu){
            foreach($menu->items as $mitem){
                $cond   = array();
                $cond[] = $mitem['sesion'];
                $mnuli="";
                $mnuitemhref="";
                if(count($mitem['submenus'])>0){
                    foreach($mitem["submenus"] as $submenu){
                        $cond[] = $submenu->session;
                    }
                }

                $mnuli="<?php";
                $mnuli.=" \$seccion = \Session::get('seccion_actual');";
                $primero=true;
                $condicion="";
                foreach($cond as $c)
                {
                    if($primero==false){
                        $condicion.=" or ";
                    }
                    else
                    {
                        $primero=false;
                    }
                        $condicion.=" \$seccion === \"".$c."\"";
                }

                $mnuli.="if (". $condicion . ") {";
//if ($seccion === "paquetes" or $seccion === "promociones" or $seccion === "paquetescontratados") {

                $mnuli.="echo \"<li class='active open' style='text-align: left;'>\";";
                $mnuli.="} else {";
                $mnuli.="echo \"<li style='text-align: left;'>\";";
                $mnuli.="}";
                $mnuli.="?>";

                if(count($mitem["submenus"])>0){
                    $mnuitemhref="<a class=\"dropdown-toggle\" href=\"#\">\n";
                }
                else{
                    $mnuitemhref="<a  href=\"".$mitem["Ruta"]."\">\n";                    
                }
                $strmitem.=$mnuli.$mnuitemhref;
                $strmitem.="    <i class=\"menu-icon fa ".$mitem["imagen"]."\">
                                </i>
                                <span class=\"menu-text\">\n\t\t".$mitem["Titulo"]."\n</span>
                            </a>\n";
                if(count($mitem["submenus"])>0){
                    $strsubitem="<ul class=\"submenu\">\n";
                    foreach($mitem["submenus"] as $submenu){
                            $strsubitem.="<?php";
                            $strsubitem.=" \$seccion = \Session::get('seccion_actual');";
                            $strsubitem.="if (\$seccion === \"". $submenu->session . "\") {";
                            $strsubitem.="echo \"<li class='active open' style='text-align: left;'>\";";
                            $strsubitem.="} else {";
                            $strsubitem.="echo \"<li style='text-align: left;'>\";";
                            $strsubitem.="}";
                            $strsubitem.="?>";
                            $strsubitem.="<a href=\"{{URL::to('".$submenu->Ruta."')}}\">\n
                                        <i class=\"menu-icon fa ".$submenu->imagen."\">
                                        </i>
                                        <span class=\"menu-text\">".$submenu->Titulo."</span>
                                        </a>\n";                        
                        $strsubitem.="</li>\n";
                        $menuitem = menuitem::findOrFail($submenu->idmenuitem);
                        $menuitem->guardar=0;
                        $menuitem->save();                                                
                    }
                    $strsubitem.="</ul>";
                    $strmitem.=$strsubitem;
                }
                $strmitem.="</li>\n";
                $menuitem = menuitem::findOrFail($mitem['idmenuitem']);
                $menuitem->guardar=0;
                $menuitem->save();
            }
        $menu=Menu::findOrFail($idmenu);
        $menu->guardar=0;
        $menu->save();
        }

        $cuerpo=$strmitem;
        $pie="
                </div>
            </div>
        </div>";

        $fichero=$cabecera.$cuerpo.$pie;
        $fp = fopen($menuizquierdo_path, "w");
            fputs($fp,$fichero);
        fclose($fp);
    }
   public function menuToFileNew($idmenu)
    {
        switch ($idmenu) {
            case 1:
                $tuser="admin";
                break;
            case 2:
                $tuser="anunciante";
                break;
            case 3:
                $tuser="adminProvincia";
                break;
            case 4:
                $tuser="colaborador";
                break;
        }

        $menuizquierdo_path=base_path().'/resources/views/layouts/includes/'.$tuser.'/barraizda1.blade.php';
        $menu=$this->MenuMultinivel($idmenu);
        $seccion = \Session::get('seccion_actual');
        $cabecera="
        <div class=\"menu \">
            <ol class=\"menu-list\">";
            $strmitem="";
        if($menu){
                $mnuli="";
            foreach($menu as $mitem){
                $cond   = array();
                array_push($cond,$mitem['seccion']);

                $mnuli.="<?php \$i=0;
                        \$total=count(\$menu);
                        ?>
                        <li class=\"menu-item menu2-item\" >";
                if($mitem["items"]==0)
                {
                    $mnuli.="<a class=\"speciala\" href=\"".$mitem["Ruta"]."\">";
                }
                $mnuli.="     <div class=\"menu-handle menu2-handle\" >
                                <i class=\"normal-icon ace-icon fa ".$mitem['imagen']." bigger-130 sombra\" style=\"color:".$mitem['color']."\"></i>
                            </div>
                            <div class=\"menu2-content\">";
                $mnuli.="<?php \$seccion = \Session::get('seccion_actual');?>";
                if ($mitem["items"]) {
                    $primero=true;
                    $condicion="";
                    for ($ii=0; $ii < count($cond) ; $ii++) { 
                        if($primero==false){
                            $condicion.=" or ";
                        }
                        else
                        {
                            $primero=false;
                        }
                            $condicion.=" \$seccion === \"".$cond[0][$ii]."\"";
                    }
                    $mnuli.="<?php if (". $condicion . ")";
                    $mnuli.="{
                            echo \"<i style='position:relative;left:-5px;' class='plus  fa fa-minus sombra '  aria-hidden='true' ></i>\";
                            }
                            else";
                    $mnuli.="{
                            echo \"<i style='position:relative;left:-5px;' class='plus  fa fa-plus sombra  '  aria-hidden='true' style='text-shadow: 1px 2px 3px #696;'></i>\";
                            }
                            ?>";

                    $mnuli.=$mitem["Titulo"];
                    $mnuli.="</div>";   
                    $mnuli.="<ol class=\"menu-list\" style=\"display:none;\">";
                        foreach($mitem["items"] as $mitem){
                            $cond   = array();
                            array_push($cond,$mitem['seccion']);

                            $mnuli.="<?php \$i=0;
                                    \$total=count(\$menu);
                                    ?>
                                    <li class=\"menu-item menu2-item\" >
                                        <div class=\"menu-handle menu2-handle\" >
                                            <i class=\"normal-icon ace-icon fa ".$mitem['imagen']." bigger-130 sombra\" style=\"color:".$mitem['color']."\"></i>
                                        </div>
                                        <div class=\"menu2-content\">";
                            $mnuli.="<?php \$seccion = \Session::get('seccion_actual');?>";
                            if ($mitem["items"]) {
                                $primero=true;
                                $condicion="";
                                for ($ii=0; $ii < count($cond) ; $ii++) { 
                                    if($primero==false){
                                        $condicion.=" or ";
                                    }
                                    else
                                    {
                                        $primero=false;
                                    }
                                        $condicion.=" \$seccion === \"".$cond[0][$ii]."\"";
                                }
                                $mnuli.="<?php if (". $condicion . ")";
                                $mnuli.="{
                                        echo \"<i style='position:relative;left:-5px;' class='plus  fa fa-minus sombra '  aria-hidden='true' ></i>\";
                                        }
                                        else";
                                $mnuli.="{
                                        echo \"<i style='position:relative;left:-5px;' class='plus  fa fa-plus sombra  '  aria-hidden='true' style='text-shadow: 1px 2px 3px #696;'></i>\";
                                        }
                                        ?>";
                            } 
                            $mnuli.=$mitem["Titulo"];
                            $mnuli.="</div>";
                            $mnuli.="</li>";
                        }
                        $mnuli.="</ol>";
                } 
                else
                {
                   $mnuli.=$mitem["Titulo"];
                    $mnuli.="</div>";  
                    if($mitem["items"]==0)
                    {
                        $mnuli.="</a>";
                    }                    
                }
                $mnuli.="</li>";
            }
                $pie="  </ol>
                        </div>";
                $script="
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
                ";
        $fichero=$cabecera.$mnuli.$pie.$script;
        $fp = fopen($menuizquierdo_path, "w");
            fputs($fp,$fichero);
        fclose($fp);
        }
    }
    public function readIcons(){
        $textoUrlIconst = file_get_contents("https://fontawesome.com/v4.7.0/icons/");
        $coincidencia="/<i\s+class.*=.*\"fas?\s+(fas?-(.*))\"\s+/m";
        preg_match_all($coincidencia, $textoUrlIconst, $coincidencias);
        $todo=$coincidencias[0];
        $coincidencias[0]= array_values(array_unique($coincidencias[0]));
        $coincidencias[1]= array_values(array_unique($coincidencias[1]));
        array_multisort($coincidencias[1], SORT_ASC, SORT_STRING,$coincidencias[0], SORT_ASC, SORT_STRING);
        return $coincidencias;
    }
    public function readRoutes($menu){
        $routes_path = base_path();
        if(substr($routes_path, -1) != "/") $routes_path .= "/";
        $routes_path.='routes/web.php'; 

        switch ($menu) {
            case '1':
                $nomUsuario='[aA]dmin';
                break;
           case '2':
                $nomUsuario='[aA]nunciante';# code...
                break;
           case '3':
                $nomUsuario='[aA]dminProvincia';
                break;
           case '4':
                $nomUsuario='[cC]olaborador';
                # code...
                break;
           case '5':
                $nomUsuario='[dD]elegado';
                break;                            
        }
        $contenido = file_get_contents($routes_path);
        $coincidenciaG="/Route::group\(.*'$nomUsuario'.*?{(.*?)}\);/s";

        preg_match_all($coincidenciaG, $contenido, $coincidencias);
        $routes=$coincidencias[1];
        $coincidenciaD="/[rR]oute::([gG]et|[pP]ost|[rR]esource)\('(\/?.*)?'.*,.*'(.*)@?(.*?.*)?'\);/";
        //$routes[0]="\n        Route::group(['middleware' => 'Admin'], function () {\n".$routes[0];
        preg_match_all($coincidenciaD,$routes[0],$rutas);
        $listaRutas=array_values(array_unique($rutas[2]));
        array_multisort($listaRutas,SORT_ASC,SORT_STRING);
        return  $listaRutas;
    }
}
