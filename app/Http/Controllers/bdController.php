<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Traits\funcionesBd;
use App\Http\Traits\trait1;

class bdController extends Controller
{
    use funcionesBd;
    use trait1;

    public function showescritoriotablas()
    {
 		$menu      = $this->MenuIzquierdo(1);
        $edit=false;
		return view("admin.tablas.index", ["menu"=>$menu,"edit"=>$edit]);   	
    }

    public function showCamposInfoTabla($tabla){
    	$infocampos= 		$this->GetCamposBd($tabla);
    	$salida= view("admin.tablas.include.tablaCamposBdTable",["infocampos"=>$infocampos])->render();
    	return response()->json($salida);
    }

}
