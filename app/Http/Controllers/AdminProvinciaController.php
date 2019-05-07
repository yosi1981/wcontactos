<?php

namespace App\Http\Controllers;

use App\Http\Traits\trait1;

class AdminProvinciaController extends Controller
{
    use trait1;

    public function Dashboard()
    {
        $menu = $this->MenuIzquierdo(2);
        return view("adminProvincia.Dashboard", compact('menu'));

    }

}
