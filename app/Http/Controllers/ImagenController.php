<?php

namespace App\Http\Controllers;

use App\Http\Traits\trait1;
use App\Imagen;
use App\User;
use App\Useranunciante;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class ImagenController extends Controller
{
    use trait1;

    public function index()
    {
        \Session::put('seccion_actual', "imagen");
        switch (Auth::user()->stringRol->nombre) {
            case 'admin':
                $imagenes = Imagen::all();
                $usuarios = Useranunciante::all();
                //->short('titulo', 'asc')
                //->paginate(500);
                return view(Auth::user()->stringRol->nombre . '/imagen.index', compact('imagenes', 'usuarios'));
                break;

            case 'anunciante':
                $imagenes = Imagen::where('idusuario', Auth::user()->id)
                    ->orderBy('titulo', 'asc')
                    ->paginate(500);
                return view(Auth::user()->stringRol->nombre . '/imagen.index', compact('imagenes'));
                break;
        }

    }

    public function getImages()
    {

        switch (Auth::user()->stringRol->nombre) {
            case 'admin':
                $imagenes = Imagen::all();
                //->short('titulo', 'asc')
                //->paginate(500);
                break;

            case 'anunciante':
                $imagenes = Imagen::where('idusuario', Auth::user()->id)
                    ->orderBy('titulo', 'asc')
                    ->paginate(500);
                break;
        }

        return view(Auth::user()->stringRol->nombre . '/imagen.includes.tablaImagenes', compact('imagenes'));
    }

    public function getImagesUser(request $req)
    {

        $imagenes = Imagen::where('idusuario', $req->id)
            ->orderBy('titulo', 'asc')
            ->paginate(500);
        $usuario = User::findorfail($req->id);
        return view(Auth::user()->stringRol->nombre . '/imagen.includes.tablaImagenes', compact('imagenes', 'usuario'));
    }

    public function almacenar(request $request)
    {
        $id    = $request->get('iduserimagen');
        $files = Input::file('filesUpload');

        if (!empty($files)) {
            foreach ($files as $file) {
                $image = \Image::make($file);
                $path  = public_path() . '/imagenes/';

                $image->save($path . $file->getClientOriginalName());
                $image->resize(200, 350);
                $image->save($path . 'thumb_' . $file->getClientOriginalName());

                $newImagen                = new Imagen;
                $newImagen->ficheroimagen = $file->getclientOriginalName();
                $newImagen->titulo        = $file->getClientOriginalName();
                $newImagen->idusuario     = $id;
                //$newImagen->idusuario     = Auth::user()->id;
                $newImagen->save();

            }

        }
    }
    public function eliminar(Request $req)
    {
        $imagen = imagen::findOrFail($req->id);
        if ($imagen->idusuario === Auth::user()->id or Auth::user()->stringRol->nombre = 'admin') {
            $imagen->delete();
            return response()->json();
        }
    }

}
