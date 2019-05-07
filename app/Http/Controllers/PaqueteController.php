<?php
namespace App\Http\Controllers;

use App\Http\Traits\trait1;
use App\Paquete;
use Auth;
use DB;

class PaqueteController extends Controller
{
    use trait1;
    public function getPaquetes()
    {
        \Session::put('seccion_actual', 'paquetescontratados');

        switch (Auth::user()->stringRol->nombre) {
            case 'admin':
                $paquetes = Paquete::all()->sortByDesc("fechaUlt");
                break;

            case 'anunciante':
                $paquetes = Paquete::all()->where('idanunciante', Auth::user()->id);
                break;

        }

        return view(Auth::user()->stringRol->nombre . '.Paquete.index', compact('paquetes'))->render();
    }
}
