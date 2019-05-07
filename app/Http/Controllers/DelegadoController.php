<?php

namespace App\Http\Controllers;

use App\Http\Traits\trait1;

class DelegadoController extends Controller
{
    use trait1;

    public function Dashboard()
    {
        return view("delegado.Dashboard");

    }

}
