<?php

namespace App\Http\Controllers;

use App\Http\Traits\trait1;

class ColaboradorController extends Controller
{
    use trait1;

    public function Dashboard()
    {
        return view("colaborador.Dashboard");

    }
}
