<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
    use App\Http\Traits\trait1;
use App\menuitem;
use App\menu;
use DB;
use Illuminate\Support\Facades\Redirect;
class menuController extends Controller
{
	use trait1;

    public function editmenu($idmenu=1)
    {
    	$tmenu=menu::all()->sortby('idmenu')
    				->pluck('descripcion','idmenu');
    	$tmenudef=menu::findOrFail($idmenu);

        return view('admin.menu.editmenu', ["tmenu" => $tmenu,"tmenudef"=>$idmenu,"edit"=>true]);
    }
    public function newmenuitem($idmenu,$idmenupadre){
         $iconos=$this->readIcons();
         $rutas=$this->readRoutes($idmenu);
    	 $salida = view('admin.menu.createitem',["idmenu"=>$idmenu,"idmenupadre"=>$idmenupadre,"iconos"=>$iconos,"rutas"=>$rutas])->render();
        return response()->json($salida);
    }
    public function editmenuitem($idmenuitem){
        $iconos=$this->readIcons();
        $menuitem = menuitem::findOrFail($idmenuitem);
        \Session::put('seccion_actual', $menuitem->session);
        $rutas=$this->readRoutes($menuitem->idmenu);
        $icono= array_search($menuitem->imagen,$iconos[1]);
        $ruta=array_search($menuitem->Ruta,$rutas);
        $salida    = view('admin.menu.edititem', compact('menuitem','iconos','icono','rutas','ruta'))->render();
        return response()->json($salida);
    }

    public function saveToFile($idmenu){
         $this->menuToFile($idmenu);
        
        return Redirect::to('/admin/editmenu/'.$idmenu);        
    }
    public function savemenuitem(request $request)
    {
    	$mnuitem = new menuitem;
    	$mnuitem->idmenu=$request->get('idmenu');
    	$mnuitem->idmenuitem_padre=$request->get('idmenuitem_padre');
    	$mnuitem->Titulo=$request->get('Titulo');
    	$mnuitem->Ruta=$request->get('ruta2');
    	$mnuitem->session=$request->get('session');
    	$mnuitem->imagen=$request->get('imagen2');
        $mnuitem->guardar=1;
    	$mnuitem->save();
        $menu = menu::findOrFail($mnuitem->idmenu);
        $menu->guardar=1;
        $menu->save();
        \Session::put('seccion_actual', $mnuitem->session);
    	return Redirect::to('/admin/editmenu/'.$mnuitem->idmenu);
    }
    public function updatemenuitem(request $request)
    {
    	$mnuitem = new menuitem;
    	$mnuitem=menuitem::findOrFail($request->get('idmenuitem'));
    	$mnuitem->idmenu=$request->get('idmenu');
    	$mnuitem->idmenuitem_padre=$request->get('idmenuitem_padre');
    	$mnuitem->Titulo=$request->get('Titulo');
    	$mnuitem->Ruta=$request->get('ruta2');
    	$mnuitem->session=$request->get('session');
    	$mnuitem->imagen=$request->get('imagen2');
        $mnuitem->guardar=1;
    	$mnuitem->save();
        $menu = menu::findOrFail($mnuitem->idmenu);
        $menu->guardar=1;
        $menu->save();
        \Session::put('seccion_actual', $mnuitem->session);
    	return Redirect::to('/admin/editmenu/'.$mnuitem->idmenu);
    }

    public function eliminarmenuitem($id){
    	DB::table('menuitem')->where('idmenuitem_padre', '=', $id)->delete();
    	$mnuitem=new menuitem;
    	$mnuitem=menuitem::findOrFail($id);
        if($mnuitem->idmenuitem_padre!=0){
            $mnitem=menuitem::findOrFail($mnuitem->idmenuitem_padre);
            \Session::put('seccion_actual',$mnitem->session);
        }
        $menu=menu::findOrFail($mnuitem->idmenu);
        $menu->guardar=1;
        $menu->save();
    	$mnuitem->delete();
    	return $id;
    }

    public function showmenu($idmenu,$edit){
    	$menu      = $this->MenuIzquierdo($idmenu);
    	 $salida = view('layouts.includes.barraizda',["menu"=>$menu,"idmenu"=>$idmenu,"edit"=>true])->render();
        return response()->json($salida);    		
    }
}
