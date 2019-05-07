<?php

namespace App\Http\Controllers;

use App\Http\Traits\trait1;

class AdminController extends Controller
{
    use trait1;

    public function Dashboard()
    {
        $menu = $this->MenuIzquierdo(1);
        $edit=false;
        return view("admin.Dashboard", compact('menu','edit'));

    }

}
