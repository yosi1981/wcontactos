<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Config;
use App\Http\Traits\trait1;
use File;
class editorController extends Controller
{
	Use trait1;


	public function readfileWebRoutes()
	{

		$menu      = $this->MenuIzquierdo(1);
        $edit=false;
        $this->AñadirRutaFile("get","/admin/mas","masController","indexmas");
		return view("admin.Rutas.index", ["menu"=>$menu,"edit"=>$edit]);

	}    
	public function readfileRoutes(){
		$routes_path = base_path();
		if(substr($routes_path, -1) != "/") $routes_path .= "/";
		$routes_path.='routes/web.php'; 

    	$contenido = file_get_contents($routes_path);
    	$coincidencia="/Route::group\(.*'Admin'.*?{(.*?)}\);/s";

		preg_match_all($coincidencia, $contenido, $coincidencias);
    	$todo=$coincidencias[0];
    	$routes=$coincidencias[1];
    	$routes[0]="\n        Route::group(['middleware' => 'Admin'], function () {\n".$routes[0];
    	preg_match_all("/[rR]oute::([gG]et|[pP]ost)\('(\/?.*)?'.*,.*'(.*)@(.*?.*)'\);/",$routes[0],$rutas);
    	$contenido=preg_replace($coincidencia,$routes[0],$contenido);
    	$salida= view("admin.Rutas.include.tablafilerutas", ["rutas"=>$rutas])->render();
    	return response()->json($salida);
	}

	private function AñadirRutaFile($metodo,$ruta,$controlador,$funcion)
	{

		$nuevaRuta="\tRoute::".$metodo."('".$ruta."','".$controlador."1@".$funcion."');";
		//localizamos el fichero 
		$routes_path = base_path();
		if(substr($routes_path, -1) != "/") $routes_path .= "/";
		$routes_path.='routes/web.php'; 


    	$contenido = file_get_contents($routes_path);
    	$coincidencia="/Route::group\(\['middleware'\s?=>\s?'Admin'.*?{(.*?)}\);/s";
		preg_match_all($coincidencia, $contenido, $coincidencias);
    	$todo=$coincidencias[0];
    	$routes=$coincidencias[1];
    	$routes[0]="\t\t".$nuevaRuta.$routes[0];
    	$routes[0]="\tRoute::group(['middleware' => 'Admin'], function () {\n".$routes[0];
    	$routes[0].="\t});";
    	$todo=$routes[0];
    	$contenido=preg_replace($coincidencia,$todo,$contenido);
    	preg_match_all("/[rR]oute::([gG]et|[pP]ost)\('(\/?.*)?'.*,.*'(.*)@(.*?.*)'\);/",$routes[0],$rutas);
    	$fp = fopen($routes_path, "w");
			fputs($fp,$contenido);
		fclose($fp);
		dd($contenido);
		$this->CrearController('mas');
		$this->CrearView('mas');
	}
	public function CrearController($table)
	{
		//localizamos el fichero 
		$controllerbase_path = base_path();
		if(substr($controllerbase_path, -1) != "/") $controllerbase_path .= "/";
		$controllerbase_path.='resources/views/admin/filebase/controllerBase.php';

		$rutanuevocontroller = base_path();
		if(substr($rutanuevocontroller, -1) != "/") $rutanuevocontroller .= "/";
		$rutanuevocontroller.='app/Http/Controllers/'.$table.'Controller1.php';

    	$contenido = file_get_contents($controllerbase_path);
		$coincidencia="/
<tabla>
    /m";
		preg_match_all($coincidencia, $contenido, $coincidencias);
		$contenido=preg_replace("/
    <tabla>
        /m",$table,$contenido);
    	$fp = fopen($rutanuevocontroller, "w");
			fputs($fp,$contenido);
		fclose($fp);
	}
	public function CrearView($table)
	{
		//localizamos el fichero 
		$controllerbase_path = base_path();
		if(substr($controllerbase_path, -1) != "/") $controllerbase_path .= "/";
		$controllerbase_path.='resources/views/admin/filebase/viewBase.php';

		$rutanuevocontroller = base_path();
		if(substr($rutanuevocontroller, -1) != "/") $rutanuevocontroller .= "/";
		$rutanuevocontroller.='resources/views/admin/'.$table. '/';
		File::makeDirectory($rutanuevocontroller, 0775);
		$rutanuevocontroller.='index'.$table.'.blade.php';
    	$contenido = file_get_contents($controllerbase_path);
		$coincidencia="/
        <tabla>
            /m";
		preg_match_all($coincidencia, $contenido, $coincidencias);
		$contenido=preg_replace("/
            <tabla>
                /m",$table,$contenido);
    	$fp = fopen($rutanuevocontroller, "w");
			fputs($fp,$contenido);
		fclose($fp);
	}
	private function getfuncion($contenido){
		$i=0;
		$nofin=false;
		$strstart=0;
		$strend=0;
		$strPrivate="private";
		$strPublic="public";
		$strFunction="function";

		$tamstrbusqueda=0;
		$cadena[]=array();
		$cadena=null;
		while(!$nofin)
		{
			$i=strpos($contenido,$strPublic,$i);
			if($i===false)
			{
				$nofin=true;
			}
			else
			{
				$strstart=$i;
				$i=strpos($contenido,$strPublic,$i+1);
				$strend=$i;
				$cadena[]="\n".substr($contenido,$strstart,$strend-$strstart);
				$i=$i-1;				
			}
		}
		return $cadena;
	}
}
