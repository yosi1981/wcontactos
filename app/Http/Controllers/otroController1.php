<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Traits\trait1;
use Config;
use App\otro;

class otroController1 extends Controller
{
	use trait1;

	public function indexotro(){
		$menu      = $this->MenuIzquierdo(1);
        $edit=false;
		return view("admin.indexotro", ["menu"=>$menu,"edit"=>$edit]);
	}

}

