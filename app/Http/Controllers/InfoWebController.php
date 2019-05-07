<?php

namespace App\Http\Controllers;

use App\Http\Traits\trait1;
use App\Provincia;
use DB;
use Illuminate\Http\Request;

class InfoWebController extends Controller
{
    use trait1;
    public function index()
    {

        \Session::put('seccion_actual', "infoweb");

        $provincias = Provincia::all();
        $provincias = $provincias->sortBy('nombre');
        $provincias = $provincias->pluck('nombre', 'idprovincia');
        $prodef     = Provincia::all()->sortBy('nombre')->first();
        $menu       = $this->MenuIzquierdo(4);
        return view('includes.admin.infoweb.tablaAnunciosPorProvinciaDia', ["provincias" => $provincias, "prodef" => $prodef, "menu" => $menu]);
    }

    public function chart()
    {
        $salida = view('includes.admin.infoweb.chart')->render();
        return response()->json($salida);
    }
    public function info(Request $request)
    {
        switch ($request->get('opcion')) {
            case 0:
                $aPpD = $this->getAnunciosProvinciaPorDia($request->get('idprovincia'), $request->get('fechainicio'), $request->get('fechafinal'));

                break;
            case 1:
                $aPpD = $this->getAnunciosProvinciaPorMes($request->get('idprovincia'), $request->get('fechainicio'), $request->get('fechafinal'));
                break;
        }

        return ($aPpD);

    }
    public function getAnunciosProvinciaPorDia($idprovincia, $fechaini, $fechafin)
    {
        $fecha1                = new \DateTime($fechaini);
        $fecha2                = new \DateTime($fechafin);
        $diasdif               = $fecha2->diff($fecha1);
        $dias                  = $diasdif->days + 1;
        $anunciosProvinciaPdia = null;
        for ($i = 1; $i <= $dias; $i++) {
            $asumar     = $i - 1;
            $diasasumar = "+" . $asumar . " day";
            $fecha      = date("Y-m-d", strtotime($diasasumar, strtotime($fechaini)));
            $fech       = date("d/m/Y", strtotime($diasasumar, strtotime($fechaini)));
            /*
            $fecha      = date("Y/m/d", strtotime($diasasumar, strtotime($fechaini)));
             */
            $aPpDia = \DB::table('anunciosDia')
                ->where('anunciosDia.idprovincia', '=', $idprovincia)
                ->where('anunciosDia.fecha', '=', $fecha)
                ->count();

            $anunciosProvinciaPdia[$i] = array(
                "fecha"       => $fech,
                "NumAnuncios" => $aPpDia,
            );
        }
        return ($anunciosProvinciaPdia);

    }

    public function getAnunciosProvinciaPorMes($idprovincia, $fechaini, $fechafin)
    {
        $fecha1 = new \DateTime($fechaini);
        $fecha2 = new \DateTime($fechafin);

        $mescomienzo  = DATE_FORMAT($fecha1, 'm');
        $mesfinal     = DATE_FORMAT($fecha2, 'm');
        $aniocomienzo = DATE_FORMAT($fecha1, 'Y');
        $aniofinal    = DATE_FORMAT($fecha2, 'Y');
        $aPpMes       = \DB::table('anunciosDia')
            ->select(
                DB::raw("DATE_FORMAT(fecha,'%m') as mes"),
                DB::raw("DATE_FORMAT(fecha,'%Y') as anio")
            )
            ->where('anunciosDia.idprovincia', '=', $idprovincia)
            ->where('anunciosDia.fecha', '>=', $fechaini)
            ->where('anunciosDia.fecha', '<=', $fechafin)
        //->where('anio', '=', '2017')
            ->get();
        $i                     = 0;
        $anunciosProvinciaPMes = null;
        for ($a = $aniocomienzo; $a <= $aniofinal; $a++) {
            $comienzo = 1;
            $final    = 12;
            if ($a == $aniocomienzo) {
                $comienzo = $mescomienzo;
            }
            if ($a == $aniofinal) {
                $final = $mesfinal;
            }
            for ($m = $comienzo; $m <= $final; $m++) {
                $mes = $aPpMes->where('anio', '=', $a)
                    ->where('mes', '=', $m)
                    ->count();
                if ($mes > 0) {
                    $anunciosProvinciaPMes[$i] = array(
                        "fecha"       => $m . '/' . $a,
                        "NumAnuncios" => $mes,
                    );
                } else {
                    $anunciosProvinciaPMes[$i] = array(
                        "fecha"       => $m . '/' . $a,
                        "NumAnuncios" => 0,
                    );

                }
                $i += 1;
            }
        }

        return ($anunciosProvinciaPMes);
    }
}
