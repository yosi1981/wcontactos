<?php

namespace App\Http\Controllers;

use App\Anuncio;
use App\caracteristica;
use App\Http\Requests\AnuncioFormRequest;
use App\Http\Traits\trait1;
use App\User;
use App\Useranunciante;
use Auth;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class AnuncioController extends Controller
{
    use trait1;

    public function CrearAnuncio()
    {
        \Session::put('seccion_actual', "Anuncio");
        $pelos     = caracteristica::where('pelo', '!=', '')->pluck('pelo', 'idcaracteristicas');
        $ojos      = caracteristica::where('ojos', '!=', '')->pluck('ojos', 'idcaracteristicas');
        $estaturas = caracteristica::where('estatura', '!=', '')->pluck('estatura', 'idcaracteristicas');
        $usuarios  = User::all()->where('tipo_usuario', '=', 1)->pluck('name', 'id');

        switch (Auth::user()->stringRol->nombre) {
            case 'admin':
                return view("admin.anuncio.nuevoAnuncio.NuevoAnuncio", ["usuarios" => $usuarios, "pelos" => $pelos, "ojos" => $ojos, "estaturas" => $estaturas]);
                break;
            case 'anunciante':
                $menu = $this->MenuIzquierdo(1);
                return view("anunciante.anuncio.nuevoAnuncio.NuevoAnuncio", ["pelos" => $pelos, "ojos" => $ojos, "estaturas" => $estaturas]);
                break;
        }

    }

    public function AnunciosAnunciante()
    {

        $user = Useranunciante::findorfail(Auth::user()->id);

        $anuncios = $user->anuncios;
        $data     = array(); //declaramos un array principal que va contener los datos
        $i        = 0;

        //hacemos un ciclo para anidar los valores obtenidos a nuestro array principal $data
        foreach ($anuncios as $anu) {

            $anuncio = Anuncio::findOrFail($anu->idanuncio);

            $fechafinal = $anuncio->fechafinal;
            $ultimodia  = date("Y-m-d", strtotime("$fechafinal + 1 day"));
            $data[$i]   = array(
                "title" => $anuncio->titulo, //obligatoriamente "title", "start" y "url" son campos requeridos
                "start" => $anuncio->fechainicio, //por el plugin asi que asignamos a cada uno el valor correspondiente
                "end"   => $ultimodia,
                //en el campo "url" concatenamos el el URL con el id del evento para luego
                //en el evento onclick de JS hacer referencia a este y usar el método show
                //para mostrar los datos completos de un evento
            );
            $i += 1;
        }

        return response()->json($data); //para luego retornarlo y estar listo para consumirlo

    }

    public function NuevoAnuncio(AnuncioFormRequest $request)
    {
        \Session::put('seccion_actual', "Anuncio");
        $data                 = $request->get('ch');
        $anuncio              = new anuncio;
        $anuncio->titulo      = $request->get('titulo');
        $anuncio->descripcion = $request->get('descripcion');
        $anuncio->idpelos     = $request->get('idpelos');
        $anuncio->idojos      = $request->get('idojos');
        $anuncio->idestatura  = $request->get('idestatura');
        $anuncio->activo      = 1;
        switch (Auth::user()->stringRol->nombre) {
            case 'admin':
                $anuncio->idusuario = $request->get('idusuario');
                break;
            case 'anunciante':
                $anuncio->idusuario = Auth::user()->id;
                break;
        }

        if ($anuncio->save()) {
            //sincronizamos la tabla pivote imagenes_anuncios automaticamente pasandole el array
            //de checkboxes pasados (ids de imagenes pasadas junto al idanuncio)

            $anuncio->ImagenesAnuncio()->sync($data);

            return Redirect::to('Anuncio')->with('msj', 'Guardado');
        }

    }

    public function edit($id)
    {
        \Session::put('seccion_actual', "Anuncio");
        try {
            $anuncio = anuncio::findOrFail($id);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return Redirect::to('/' . Auth::user()->stringRol->nombre . '/Anuncio');
        }
        $pelos     = caracteristica::where('pelo', '!=', '')->pluck('pelo', 'idcaracteristicas');
        $ojos      = caracteristica::where('ojos', '!=', '')->pluck('ojos', 'idcaracteristicas');
        $estaturas = caracteristica::where('estatura', '!=', '')->pluck('estatura', 'idcaracteristicas');
        $usuarios  = User::pluck('name', 'id');
        switch (Auth::user()->stringRol->nombre) {
            case 'admin':
                return view(Auth::user()->stringRol->nombre . ".anuncio.editAnuncio.edit", ["anuncio" => $anuncio, "usuarios" => $usuarios, "usu" => $anuncio->idusuario, "pelos" => $pelos, "ojos" => $ojos, "estaturas" => $estaturas]);

                break;
            case 'anunciante':
                if ($anuncio->idusuario === Auth::user()->id) {
                    return view(Auth::user()->stringRol->nombre . ".anuncio.editAnuncio.edit", ["anuncio" => $anuncio, "pelos" => $pelos, "ojos" => $ojos, "estaturas" => $estaturas]);
                } else {
                    return Redirect::to('Anuncio');
                }

                break;
        }
        //Provincia::findOrFail($id)]);
    }

    public function update(AnuncioFormRequest $request, $id)
    {

        $data                 = $request->get('ch');
        $anuncio              = new anuncio;
        $anuncio              = anuncio::findOrFail($id);
        $anuncio->titulo      = $request->get('titulo');
        $anuncio->descripcion = $request->get('descripcion');
        $anuncio->fechainicio = $request->get('fechainicio');
        $anuncio->fechafinal  = $request->get('fechafinal');
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
                break;

            case 'anunciante':
                if ($anuncio->idusuario === Auth::user()->id) {
                    $anuncio->update();
                } else {
                    return Redirect::to('/Anuncio');
                }
                break;
        }

        $anuncio->ImagenesAnuncio()->sync($data);

        return Redirect::to('/Anuncio');
    }

    public function search(Request $request)
    {
        \Session::put('seccion_actual', "Anuncio");
        if ($request->ajax()) {
            $query = trim($request->get('searchText'));
            switch (Auth::user()->stringRol->nombre) {
                case 'admin':
                    $anuncios = DB::table('anuncios')
                        ->join('users', 'anuncios.idusuario', '=', 'users.id')
                        ->select('anuncios.idanuncio', 'anuncios.titulo', 'anuncios.descripcion', 'anuncios.fechainicio', 'anuncios.fechafinal', 'anuncios.activo', 'anuncios.idusuario', 'users.name as NombreUsuario')
                        ->where('anuncios.titulo', 'LIKE', '%' . $query . '%')
                        ->orderBy('anuncios.titulo', 'asc')
                        ->paginate(5);
                    $salida = view('admin.anuncio.includes.tablaAnuncios', compact('anuncios', 'searchText'))->render();
                    break;

                case 'anunciante':
                    $anuncios = DB::table('anuncios')
                        ->join('users', 'anuncios.idusuario', '=', 'users.id')
                        ->select('anuncios.idanuncio', 'anuncios.titulo', 'anuncios.descripcion', 'anuncios.fechainicio', 'anuncios.fechafinal', 'anuncios.activo', 'anuncios.idlocalidad', 'anuncios.idusuario', 'users.name as NombreUsuario')
                        ->where('anuncios.titulo', 'LIKE', '%' . $query . '%')
                        ->where('anuncios.idusuario', '=', Auth::user()->id)
                        ->orderBy('anuncios.titulo', 'asc')
                        ->paginate(5);
                    $salida = view('anunciante.anuncio.includes.tablaAnuncios', compact('anuncios', 'searchText'))->render();
                    break;

            }

            if ($anuncios) {

                return response()->json($salida);
            }
        }
    }

    public function index(Request $request)
    {
        \Session::put('seccion_actual', "Anuncio");
        if ($request) {
            $query = trim($request->get('searchText'));
/*            $anuncios = DB::table('anuncios')->where('titulo', 'LIKE', '%' . $query . '%')
->orderBy('titulo', 'asc')
->paginate(5);
return view('anuncio.index', ["anuncios" => $anuncios, "searchText" => $query]);
 */
            switch (Auth::user()->stringRol->nombre) {
                case 'admin':
                    $anuncios = DB::table('anuncios')
                        ->join('users', 'anuncios.idusuario', '=', 'users.id')
                        ->select('anuncios.idanuncio', 'anuncios.titulo', 'anuncios.descripcion', 'anuncios.fechainicio', 'anuncios.fechafinal', 'anuncios.activo', 'anuncios.idusuario', 'users.name as NombreUsuario')
                        ->where('anuncios.titulo', 'LIKE', '%' . $query . '%')
                        ->orderBy('anuncios.titulo', 'asc')
                        ->paginate(5);
                    break;

                case 'anunciante':
                    $anuncios = DB::table('anuncios')
                        ->join('users', 'anuncios.idusuario', '=', 'users.id')
                        ->select('anuncios.idanuncio', 'anuncios.titulo', 'anuncios.descripcion', 'anuncios.fechainicio', 'anuncios.fechafinal', 'anuncios.activo', 'anuncios.idusuario', 'users.name as NombreUsuario')
                        ->where('anuncios.titulo', 'LIKE', '%' . $query . '%')
                        ->where('anuncios.idusuario', '=', Auth::user()->id)
                        ->orderBy('anuncios.titulo', 'asc')
                        ->paginate(5);
                    break;

                    break;
            }
            return view(Auth::user()->stringRol->nombre . '.anuncio.index', ["anuncios" => $anuncios, "searchText" => $query]);
        }

    }

    public function destroy($id)
    {
        $anuncio = anuncio::findOrFail($id);
        alert('destroy');
        $anuncio->delete();
        return Redirect::to('Anuncio');
    }
    public function eliminar(Request $req)
    {
        $useractual = User::findorfail(Auth::user()->id);
        $anuncio    = anuncio::findOrFail($req->id);
        alert('eliminar');
        if ($useractual->stringRol->nombre == "anunciante") {
            alert("anunciante");
            if ($anuncio->idusuario == Auth::user()->id) {
                $anuncio->ImagenesAnuncio()->sync(array());
                $anuncio->delete();
                return response()->json();
            } else {
                return response()->json();
            }
        }
        if ($useractual->stringRol->nombre == "admin") {
            alert("admin");
            $anuncio->ImagenesAnuncio()->sync(array());
            $anuncio->delete();
            return response()->json();
        } else {
            return response()->json();
        }
    }
}
