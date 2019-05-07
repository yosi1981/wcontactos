<?php

namespace App\Http\Controllers;

use App\anuncioProgramadoLocalidad;
use App\Http\Traits\trait1;
use App\Poblacion;
use App\Provincia;
use App\User;
use Auth;
use Illuminate\Http\Request;

class anunciosProgramadosLocalidad extends Controller
{
    use trait1;
    public function createAnunProLoca($id)
    {
        $provincias = Provincia::all();
        $provincias = $provincias->sortBy('nombre');
        $provincias = $provincias->pluck('nombre', 'idprovincia');
        $prodef     = Provincia::all()->sortBy('nombre')->first();
        $locadef    = Poblacion::all()->where('idprovincia', $prodef->idprovincia)->sortBy('nombre')->pluck('nombre', 'idlocalidad');
        $locas      = Poblacion::all()->where('idprovincia', $prodef->idprovincia)->sortBy('nombre')->first();
        //$locadef     = Poblacion::all()->where('idprovincia', $prodef->idprovincia)->sortBy('nombre')->pluck('nombre', 'idlocalidad');
        $usuarios = User::pluck('name', 'id');
        switch (Auth::user()->stringRol->nombre) {
            case 'admin':
                $salida = view(Auth::user()->stringRol->nombre . ".anuncioProgramado.AnuncioProLocalidad.nuevaAnunProLoca", ["anuncioP" => $id, "provincias" => $provincias, "prodef" => $prodef->idprovincia, "locadef" => $locadef, "locas" => $locas->idlocalidad])->render();
                return response()->json($salida);
                break;
            case 'anunciante':
                $salida = view(Auth::user()->stringRol->nombre . ".anuncioProgramado.AnuncioProLocalidad.nuevaAnunProLoca", ["anuncioP" => $id, "provincias" => $provincias, "prodef" => $prodef->idprovincia, "locadef" => $locadef, "locas" => $locas->idlocalidad])->render();
                return response()->json($salida);
                break;
        }
    }
    public function nuevoAnuncioProLocal(Request $request)
    {
        if ($request->ajax()) {
            $apl                      = new anuncioProgramadoLocalidad;
            $apl->idanuncioProgramado = $request->get('idanuncioProgramado');
            $apl->idprovincia         = $request->get('Provincia');
            $apl->idlocalidad         = $request->get('Localidad');
            $apl->save();
            return response()->json($apl);
        }
    }

    public function getAnunciosProLocal($idanuncioProgramado)
    {
        $apls = anuncioProgramadoLocalidad::all()->where('idanuncioProgramado', $idanuncioProgramado);
        if ($apls) {
            switch (Auth::user()->stringRol->nombre) {
                case 'admin':
                    $salida = view(Auth::user()->stringRol->nombre . '.anuncioProgramado.AnuncioProLocalidad.tablaApls', ['apls' => $apls])->render();
                    return response()->json($salida);
                    break;
                case 'anunciante':
                    $salida = view(Auth::user()->stringRol->nombre . '.anuncioProgramado.AnuncioProLocalidad.tablaApls', ['apls' => $apls])->render();
                    return response()->json($salida);
                    break;
            }
        }
    }
    public function getAnuncioProLocal($idanuncioProgramadoLoca)
    {
        $apl        = anuncioProgramadoLocalidad::all()->where('idanuncioProLocalidad', $idanuncioProgramadoLoca)->first();
        $provincias = Provincia::all();
        $provincias = $provincias->sortBy('nombre');
        $provincias = $provincias->pluck('nombre', 'idprovincia');
        $prodef     = $apl->idprovincia;
        $locadef    = Poblacion::all()->where('idprovincia', $prodef)->sortBy('nombre')->pluck('nombre', 'idlocalidad');
        $locas      = $apl->idlocalidad;
        //$locadef     = Poblacion::all()->where('idprovincia', $prodef->idprovincia)->sortBy('nombre')->pluck('nombre', 'idlocalidad');
        $usuarios = User::pluck('name', 'id');
        if ($apl) {

            switch (Auth::user()->stringRol->nombre) {
                case 'admin':
                    $salida = view(Auth::user()->stringRol->nombre . '.anuncioProgramado.AnuncioProLocalidad.edit', ['apl' => $apl, "provincias" => $provincias, "prodef" => $prodef, "locadef" => $locadef, "locas" => $locas])->render();
                    return response()->json($salida);
                case 'anunciante':
                    $salida = view(Auth::user()->stringRol->nombre . '.anuncioProgramado.AnuncioProLocalidad.edit', ['apl' => $apl, "provincias" => $provincias, "prodef" => $prodef, "locadef" => $locadef, "locas" => $locas])->render();
                    return response()->json($salida);
            }
        }
    }
    public function UpdateAPL(Request $request)
    {
        if ($request->ajax()) {
            $apl                      = anuncioProgramadoLocalidad::findOrFail($request->get('idanuncioProLocalidad'));
            $apl->idanuncioProgramado = $request->get('idanuncioProgramado');
            $apl->idprovincia         = $request->get('Provincia1');
            $apl->idlocalidad         = $request->get('Localidad1');
            $apl->update();
            return response()->json($apl);
        }
    }
    public function deleteAPLpre($id)
    {
        $apl = anuncioProgramadoLocalidad::findOrFail($id);
        if ($apl) {
            $salida = view('admin.anuncioProgramado.AnuncioProLocalidad.modaldelete', ['apl' => $apl])->render();
            return response()->json($salida);
        }
    }
    public function deleteAPLpost($id)
    {
        $apl = anuncioProgramadoLocalidad::findOrFail($id);
        $apl->delete();
        return response()->json();
    }
    public function getLocalidadesJSON(Request $request, $id)
    {
        if ($request->ajax()) {

            $poblaciones = Poblacion::all()->where('idprovincia', $id)->sortBy('nombre');
            return response()->json($poblaciones);
        }
    }
}
