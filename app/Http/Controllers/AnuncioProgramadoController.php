<?php
namespace App\Http\Controllers;

use App\Anuncio;
use App\AnuncioProgramado;
use App\anuncioProgramadoLocalidad;
use App\caracteristica;
use App\Http\Traits\trait1;
use App\User;
use Auth;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class AnuncioProgramadoController extends Controller
{
    use trait1;

    public function CrearAnuncioProgramado($idanuncio)
    {
        $fechaact              = getdate();
        $fechaactual           = $fechaact['year'] . "-" . substr("0" . $fechaact['mon'], -2) . "-" . substr("0" . $fechaact['mday'], -2);
        $anunProg              = new AnuncioProgramado;
        $anuncio               = Anuncio::findorfail($idanuncio);
        $anunProg->idanuncio   = $anuncio->idanuncio;
        $anunProg->titulo      = $anuncio->titulo;
        $anunProg->descripcion = $anuncio->descripcion;
        $anunProg->fechainicio = $fechaactual;
        $anunProg->fechafinal  = $fechaactual;
        $anunProg->activo      = $anuncio->activo;
        $anunProg->idusuario   = $anuncio->idusuario;
        $anunProg->idpelos     = $anuncio->idpelos;
        $anunProg->idojos      = $anuncio->idojos;
        $anunProg->idestatura  = $anuncio->idestatura;
        $anunProg->save();

        return $this->editarAnuncioProgramado($anunProg->idanuncio_programado);
    }

    public function editarAnuncioProgramado($id)
    {
        \Session::put('seccion_actual', "AnuncioP");
        try {
            $anuncioP = AnuncioProgramado::findOrFail($id);

        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return Redirect::to('/' . Auth::user()->stringRol->nombre . '/listarAnunciosProgramados');
        }
        $sexo      = caracteristica::where('sexo','!=','')->pluck('sexo','idcaracteristicas');
        $pelos     = caracteristica::where('pelo', '!=', '')->pluck('pelo', 'idcaracteristicas');
        $ojos      = caracteristica::where('ojos', '!=', '')->pluck('ojos', 'idcaracteristicas');
        $estaturas = caracteristica::where('estatura', '!=', '')->pluck('estatura', 'idcaracteristicas');
        $usuarios  = User::pluck('name', 'id');
        switch (Auth::user()->stringRol->nombre) {
            case 'admin':
                return view(Auth::user()->stringRol->nombre . ".anuncioProgramado.editAnuncio.edit", ["anuncioP" => $anuncioP, "usuarios" => $usuarios, "usu" => $anuncioP->idusuario, "pelos" => $pelos, "ojos" => $ojos, "estaturas" => $estaturas,"sexos"=>$sexos]);

                break;
            case 'anunciante':
                if ($anuncioP->idusuario == Auth::user()->id) {
                    return view(Auth::user()->stringRol->nombre . ".anuncioProgramado.editAnuncio.edit", ["anuncioP" => $anuncioP, "pelos" => $pelos, "ojos" => $ojos, "estaturas" => $estaturas,"sexos"=>$sexos]);
                } else {
                    return Redirect::to('/' . Auth::user()->stringRol->nombre . '/listarAnunciosProgramados');
                }
                break;
/*
if ($anuncio->idusuario === Auth::user()->id) {
return view(Auth::user()->stringRol->nombre . ".anuncio.editAnuncio.edit", ["anuncio" => $anuncio, "localidades" => $localidades]);
} else {
return Redirect::to('Anuncio');
}
 */
                break;
        }
        //Provincia::findOrFail($id)]);
    }
    public function listarAnunciosProgramados(Request $request)
    {
        \Session::put('seccion_actual', "AnuncioP");
        if ($request) {
            $query = trim($request->get('searchText'));
/*            $anuncios = DB::table('anuncios')->where('titulo', 'LIKE', '%' . $query . '%')
->orderBy('titulo', 'asc')
->paginate(5);
return view('anuncio.index', ["anuncios" => $anuncios, "searchText" => $query]);
 */
            switch (Auth::user()->stringRol->nombre) {
                case 'admin':
                    $anunciosP = DB::table('anuncios_programados')
                        ->join('users', 'anuncios_programados.idusuario', '=', 'users.id')
                        ->select('anuncios_programados.idanuncio_programado', 'anuncios_programados.idanuncio', 'anuncios_programados.titulo', 'anuncios_programados.descripcion', 'anuncios_programados.fechainicio', 'anuncios_programados.fechafinal', 'anuncios_programados.activo', 'anuncios_programados.idusuario', 'users.name as NombreUsuario')
                        ->where('anuncios_programados.titulo', 'LIKE', '%' . $query . '%')
                        ->orderBy('anuncios_programados.titulo', 'asc')
                        ->paginate(5);
                    $anunciosP->each(function ($item, $key) {
                        $nlocal = DB::table('anunciosProLocalidad')
                            ->where('anunciosProLocalidad.idanuncioProgramado', $item->idanuncio_programado)
                            ->count();

                        $item->nlocal = $nlocal;
                    });
                    break;

                case 'anunciante':
                    $anunciosP = DB::table('anuncios_programados')
                        ->join('users', 'anuncios_programados.idusuario', '=', 'users.id')
                        ->select('anuncios_programados.idanuncio_programado', 'anuncios_programados.idanuncio', 'anuncios_programados.titulo', 'anuncios_programados.descripcion', 'anuncios_programados.fechainicio', 'anuncios_programados.fechafinal', 'anuncios_programados.activo', 'anuncios_programados.idusuario', 'users.name as NombreUsuario')
                        ->where('anuncios_programados.titulo', 'LIKE', '%' . $query . '%')
                        ->where('anuncios_programados.idusuario', '=', Auth::user()->id)
                        ->orderBy('anuncios_programados.titulo', 'asc')
                        ->paginate(5);
                    $anunciosP->each(function ($item, $key) {
                        $nlocal = DB::table('anunciosProLocalidad')
                            ->where('anunciosProLocalidad.idanuncioProgramado', $item->idanuncio_programado)
                            ->count();

                        $item->nlocal = $nlocal;

                    });
                    break;

            }
            return view(Auth::user()->stringRol->nombre . '.anuncioProgramado.index', ["anunciosP" => $anunciosP, "searchText" => $query]);
        }

    }

    public function ShowAnuncio($id)
    {
        $anuncio    = AnuncioProgramado::findOrFail($id);
        $provincias = DB::table('provincias')
            ->select('idprovincia', 'nombre')
            ->where('habilitado', '=', '1')
            ->get();
        return view("publico.mostrarAnuncio", ["anuncio" => $anuncio, "provincias" => $provincias]);
    }

    public function update(Request $request, $id)
    {

        //$data    = $request->get('ch');
        $anuncio = new AnuncioProgramado;

        $anuncio              = AnuncioProgramado::findOrFail($id);
        $anuncio->titulo      = $request->get('titulo');
        $anuncio->descripcion = $request->get('descripcion');
        $anuncio->fechainicio = $request->get('fechainicio');
        $anuncio->fechafinal  = $request->get('fechafinal');
        $anuncio->idsexo      = $request->get('idsexos');
        $anuncio->idpelos     = $request->get('idpelos');
        $anuncio->idojos      = $request->get('idojos');
        $anuncio->idestatura  = $request->get('idestatura');

        if ($request->get('activo')) {
            $anuncio->activo = 1;
        } else {
            $anuncio->activo = 0;
        }

        switch (Auth::user()->stringRol->nombre) {
            case 'admin':
                $anuncio->idusuario = $request->get('idusuario');
                $anuncio->update();
                return Redirect::to('admin/listarAnunciosProgramados');
                break;

            case 'anunciante':
                if ($anuncio->idusuario === Auth::user()->id) {
                    $anuncio->update();
                    return Redirect::to('anunciante/listarAnunciosProgramados');
                } else {
                    return Redirect::to('anunciante/listarAnunciosProgramados');
                }
                break;
        }

        //$anuncio->ImagenesAnuncio()->sync($data);

    }
    public function search(Request $request)
    {
        \Session::put('seccion_actual', "AnuncioP");
        if ($request) {
            $query = trim($request->get('searchText'));
/*            $anuncios = DB::table('anuncios')->where('titulo', 'LIKE', '%' . $query . '%')
->orderBy('titulo', 'asc')
->paginate(5);
return view('anuncio.index', ["anuncios" => $anuncios, "searchText" => $query]);
 */
            switch (Auth::user()->stringRol->nombre) {
                case 'admin':
                    $anunciosP = DB::table('anuncios_programados')
                        ->join('users', 'anuncios_programados.idusuario', '=', 'users.id')
                        ->select('anuncios_programados.idanuncio_programado', 'anuncios_programados.idanuncio', 'anuncios_programados.titulo', 'anuncios_programados.descripcion', 'anuncios_programados.fechainicio', 'anuncios_programados.fechafinal', 'anuncios_programados.activo', 'anuncios_programados.idusuario', 'users.name as NombreUsuario')
                        ->where('anuncios_programados.titulo', 'LIKE', '%' . $query . '%')
                        ->orderBy('anuncios_programados.titulo', 'asc')
                        ->paginate(5);
                    $anunciosP->each(function ($item, $key) {
                        $nlocal = DB::table('anunciosProLocalidad')
                            ->where('anunciosProLocalidad.idanuncioProgramado', $item->idanuncio_programado)
                            ->count();

                        $item->nlocal = $nlocal;
                    });
                    break;

                case 'anunciante':
                    $anunciosP = DB::table('anuncios_programados')
                        ->join('users', 'anuncios_programados.idusuario', '=', 'users.id')
                        ->select('anuncios_programados.idanuncio_programado', 'anuncios_programados.idanuncio', 'anuncios_programados.titulo', 'anuncios_programados.descripcion', 'anuncios_programados.fechainicio', 'anuncios_programados.fechafinal', 'anuncios_programados.activo', 'anuncios_programados.idusuario', 'users.name as NombreUsuario')
                        ->where('anuncios_programados.titulo', 'LIKE', '%' . $query . '%')
                        ->where('anuncios_programados.idusuario', '=', Auth::user()->id)
                        ->orderBy('anuncios_programados.titulo', 'asc')
                        ->paginate(5);
                    $anunciosP->each(function ($item, $key) {
                        $nlocal = DB::table('anunciosProLocalidad')
                            ->where('anunciosProLocalidad.idanuncioProgramado', $item->idanuncio_programado)
                            ->count();

                        $item->nlocal = $nlocal;
                    });
                    break;
            }
            if ($anunciosP) {
                $salida = view(Auth::user()->stringRol->nombre . '.anuncioProgramado.includes.tablaAnuncios', ["anunciosP" => $anunciosP, "searchText" => $query])->render();
                return response()->json($salida);
            }

        }

    }
    public function eliminarAP(Request $request)
    {
        $id   = $request->get('id');
        $ap   = AnuncioProgramado::findOrFail($id);
        $apls = anuncioProgramadoLocalidad::all()->where('idanuncioProgramado', $id);
        foreach ($apls as $apl) {
            $apl->delete();
        }
        $ap->delete();
        return Redirect::to('/admin/listarAnunciosProgramados');
    }
}
