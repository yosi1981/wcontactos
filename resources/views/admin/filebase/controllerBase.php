<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Traits\trait1;
use Config;
use App\<tabla>;

class <tabla>Controller1 extends Controller
{
	use trait1;

	public function index<tabla>(){
		$menu      = $this->MenuIzquierdo(1);
        $edit=false;
		return view("admin.index<tabla>", ["menu"=>$menu,"edit"=>$edit]);
	}

}

