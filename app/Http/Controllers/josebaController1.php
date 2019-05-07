<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Traits\trait1;
use Config;
use App\joseba;

class josebaController1 extends Controller
{
	use trait1;

	public function indexjoseba(){
		$menu      = $this->MenuIzquierdo(1);
        $edit=false;
		return view("indexjoseba", ["menu"=>$menu,"edit"=>$edit]);
	}

}

