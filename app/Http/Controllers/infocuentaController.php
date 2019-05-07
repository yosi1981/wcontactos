<?php

namespace App\Http\Controllers;

use App\Http\Traits\trait1;
use App\Provincia;
use Auth;
use DB;

class infocuentaController extends Controller
{
    use trait1;

    public function InfoReferidos()
    {
        $usuarioActual = Auth::user();
        \Session::put('seccion_actual', 'infocuenta');

        $usuarioActual->Referidos->each(function ($item, $key) {
            $sum = DB::table('anunciosDia')
                ->where('anunciosDia.idanunciante', $item->id)
                ->sum('anunciosDia.partner_comision');
            $item->totalreferido = $sum;
        });

        if ($usuarioActual->stringRol->nombre == 'admin') {
            $provincias = Provincia::all();

            $provincias->each(function ($item, $key) {
                $sum = DB::table('anunciosDia')
                    ->where('anunciosDia.idprovincia', $item->idprovincia)
                    ->sum('anunciosDia.partner_comision');
                $item->totalprovincia = $sum;
            });
            return view($usuarioActual->stringRol->nombre . '.InfoCuenta.infocuenta', ["usuario" => $usuarioActual, "provincias" => $provincias]);
        } else {
            return view($usuarioActual->stringRol->nombre . '.InfoCuenta.infocuenta', ["usuario" => $usuarioActual]);
        }
    }
}
