<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Traits\trait1;
use Config;
use Illuminate\Support\Facades\Redirect;
class stylesController extends Controller
{
	use trait1;

    public function readfileincludesstyles(){
	    \Session::put('seccion_actual', "editincludecss");
		$view_path = Config::get('view.paths'); 
$directorio = public_path()."/css/";
 $items = null;
 $i=0;
 if(substr($directorio, -1) != "/") $directorio .= "/";
 
$items = array();
$dir = opendir($directorio); // open the cwd..also do an err check.
while(false != ($file = readdir($dir))) {
        if(($file != ".") and ($file != "..") and (substr($file,0,1)!=".")  and (substr($file,-4)==".css")) {
                $items[] = $file; // put in array.
        }   
}

//natsort($items); 

 
    	$contenido = file_get_contents($view_path[0]."/layouts/styles/styles.blade.php");
		preg_match_all('/.*<link.*href="{{asset\(\'\/css\/(.*)\'\)}}".*\/>/', $contenido, $coincidencias);
		//array_multisort($coincidencias[1], SORT_ASC, SORT_STRING);
  	$lstyles=null;
  	$i=0;
  	foreach($items as $stylefile){
  		$lstyles[$i]=array(
  			"stylefile" => $stylefile,
  			"stylefile_size" =>filesize($directorio . $stylefile),
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

    /* podemos ordenar por nombre
    foreach ($lstyles as $key => $row) {
        $aux[$key] = $row['stylefile'];
    }  			
    array_multisort($aux, SORT_ASC, $lstyles);
    */
    foreach ($lstyles as $key => $row) {
        $aux[$key] = $row['file_in_proyect'];
    }       
    array_multisort($aux, SORT_DESC, $lstyles);
 //dd($items);
		return view("admin.styles.index", ["styles" => $lstyles]);
    }

    public function writefileincludecss(request $request){
    	$files                 = $request->get('selfile');
      dd($files);
    	$view_path = Config::get('view.paths');
    	$ficheroinclude = $view_path[0]."/layouts/styles/styles.blade.php";
    	$fp = fopen($ficheroinclude, "w");
    	foreach ($files as $file){
    		$salida="<link href=\""."{{asset('/css/".$file."')}}\""." rel=\""."stylesheet\""."/>\n";
			fputs($fp, $salida);
    	}
fputs($fp,"<link href=\"{{asset('/font-awesome/4.5.0/css/font-awesome.min.css')}}\" rel=\"stylesheet\"/>\n");
fputs($fp,"<link class=\"ace-main-stylesheet\" href=\"{{asset('/css/ace.min.css')}}\"  rel=\"stylesheet\"/>\n");
fputs($fp,"<link class=\ace-main-stylesheet\" href=\"{{asset('/css/ace-part2.min.css')}}\" rel=\"stylesheet\"/>\n");
		fclose($fp);
		return Redirect::to('/admin/editincludesstyles');
    }
}


 