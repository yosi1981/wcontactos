<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Traits\trait1;
use Config;
use App\mas;

class masController1 extends Controller
{
	use trait1;

	public function indexmas(){
		$menu      = $this->MenuIzquierdo(1);
        $edit=false;
		return view("admin.mas.indexmas", ["menu"=>$menu,"edit"=>$edit]);
	}

}

