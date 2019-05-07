<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Traits\trait1;
use Config;

class scriptsController extends Controller
{
	use trait1;

	public function editincludescripts(){
     \Session::put('seccion_actual', "editincludescripts");

		return view("admin.scripts.index");
	}

	public function readfileincludesscripts($zona=1){
    switch ($zona) {
      case 1:
        $rutaViewIncludeJs="layouts/scripts/scripts.blade.php";
      break;
      case 2:
        $rutaViewIncludeJs="layouts/scripts/scripts1.blade.php";
      break;      
    }
		$file_include_js=$rutaViewIncludeJs; 
		$view_path = Config::get('view.paths');
		if(substr($view_path[0], -1) != "/") $view_path[0] .= "/";
		$ruta_file_include_js=$view_path[0].$file_include_js;

		$rutaPublicJs = public_path()."/js/";

	    \Session::put('seccion_actual', "scripts");
		 
 $items = null;
 $i=0;
 
   
$items = array();
$dir = opendir($rutaPublicJs); // open the cwd..also do an err check.
while(false != ($file = readdir($dir))) {
        if(($file != ".") and ($file != "..") and (substr($file,0,1)!=".") and (substr($file,-3)==".js")) {
                $items[] = $file; // put in array.
        }   
}

natsort($items); 
    	$contenido = file_get_contents($ruta_file_include_js);
		preg_match_all('/.*<script.*src="{{asset\(\'\/js\/(.*)\'\)}}">\n*.*\n*<\/script>/', $contenido, $coincidencias);
		array_multisort($coincidencias[1], SORT_ASC, SORT_STRING);
  	$lstyles=null;
  	$i=0;
  	foreach($items as $stylefile){
  		$lstyles[$i]=array(
  			"stylefile" => $stylefile,
  			"stylefile_size" =>filesize($rutaPublicJs . $stylefile),
  			"file_in_proyect" => 0,
  		);
  		$i=$i+1;
  	}
  	foreach($coincidencias[1] as $scriptinfile)
  	{
  		$i=-1;
  		$encontrado=false;
  		$indice=-1;
  		while($encontrado==false and $i<count($lstyles)-1)
  		{
  			$i=$i+1;
  			if($lstyles[$i]["stylefile"]==$scriptinfile)
  			{
  				$indice=1;
  				$encontrado=true;
  				$lstyles[$i]["file_in_proyect"]=$indice;
  			}
  		}
  		if(!$encontrado)
  		{
  		$lstyles[]=array(
  			"stylefile" => $scriptinfile,
  			"stylefile_size" =>0,
  			"file_in_proyect" => -1,
  		);
  		}
  	}
    foreach ($lstyles as $key => $row) {
        $aux[$key] = $row['stylefile'];
    }       
    array_multisort($aux, SORT_ASC, $lstyles);
		$salida= view("admin.scripts.include.tablafilesJs", ["scripts" => $lstyles])->render();
                return response()->json($salida);
    }
}
