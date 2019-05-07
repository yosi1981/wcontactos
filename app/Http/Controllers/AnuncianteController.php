<?php

namespace App\Http\Controllers;

use App\Http\Traits\trait1;

class AnuncianteController extends Controller
{
    use trait1;

    public function Dashboard()
    {
        $menu = $this->MenuIzquierdo(1);
        return view("anunciante.Dashboard", compact('menu'));

    }

}
