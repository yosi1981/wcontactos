<?php

namespace App\Http\Controllers;

use App\Anuncio;
use App\AnuncioDia;
use App\AnuncioProgramado;
use App\Http\Traits\trait1;
use App\Paquete;
use App\Poblacion;
use App\Provincia;
use App\User;
use App\Useranunciante;
use DB;

class PrincipalController extends Controller
{
    use trait1;

    public function __construct()
    {

    }
    public function pruebavue()
    {
        return view('pruebas.prueba1');
    }

    public function index()
    {
        $provincias = DB::table('provincias')
            ->select('idprovincia', 'nombre', 'habilitado', 'coordenadas')
            ->get();
        return view('publico.index', ["provincias" => $provincias]);
    }
    public function mostrarAnuncios($id = 1)
    {

        try {
            $provincia = Provincia::findOrFail($id);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            $provincia = Provincia::first();
        }
        $fechaact    = getdate();
        $fechaactual = $fechaact['year'] . "-" . substr("0" . $fechaact['mon'], -2) . "-" . substr("0" . $fechaact['mday'], -2);

        $preanuncios = DB::table('anuncios_programados')
            ->join('anunciosProLocalidad', 'anuncios_programados.idanuncio_programado', '=', 'anunciosProLocalidad.idanuncioProgramado')
            ->join('localidades', 'anunciosProLocalidad.idlocalidad', '=', 'localidades.idlocalidad')
            ->select('anuncios_programados.idanuncio_programado', 'anuncios_programados.titulo', 'anuncios_programados.descripcion', 'anuncios_programados.fechainicio', 'anuncios_programados.fechafinal', 'anuncios_programados.activo', 'anunciosProLocalidad.idlocalidad', 'localidades.nombre as NombreLocalidad', 'anuncios_programados.idusuario', 'localidades.idprovincia')
            ->where('localidades.idprovincia', '=', $provincia->idprovincia) //filtramos la localidad
            ->where(function ($query) use ($fechaactual) {
                $query->where('anuncios_programados.activo', '=', '1')
                    ->orwhere('anuncios_programados.fechainicio', "=", $fechaactual);
            })
            ->get();

        //$preanuncios=Anuncio::all();
        $ayer = date("Y-m-d", strtotime("$fechaactual - 1 day"));
        $i    = -1;
        foreach ($preanuncios as $anu) {
            $i       = $i + 1;
            $anuncio = new AnuncioProgramado();
            $anuncio = AnuncioProgramado::findorfail($anu->idanuncio_programado);

            if ($anu->activo == 0) {
                $anuncio->activo = 1;
                $anuncio->save();

            } else {

                if ($anu->fechafinal == $ayer) //si sigue activo, pero el final era ayer, lo desactivamos y no lo mostramos
                {

                    $anuncio->activo = 0;
                    $anuncio->save();
                    unset($preanuncios[$i]);
                }
                if ($anu->activo == 1) {
                    if ($anuncio->ult_muestra != $fechaactual) {
                        $usuarioAnuncio = Useranunciante::findorfail($anu->idusuario);

                        if ($usuarioAnuncio->dias_disponibles == 0) {
                            $anuncio->activo = 0;
                            $anuncio->save();
                            unset($preanuncios[$i]);
                        }
                    }

                }

            }
        }
        $i = -1;
        foreach ($preanuncios as $an) {
            $i     = $i + 1;
            $anDia = AnuncioDia::all()
                ->where('fecha', '=', $fechaactual)
                ->where('idanuncio', '=', $an->idanuncio_programado) //este ya activado
                ->where('idlocalidad', '=', $an->idlocalidad) //filtramos la localidad
                ->first();
            $poblacion      = Poblacion::findorfail($an->idlocalidad);
            $provincia      = Provincia::findorfail($poblacion->idprovincia);
            $anuncio        = AnuncioProgramado::findOrFail($an->idanuncio_programado);
            $usuarioAnuncio = Useranunciante::findorfail($anuncio->UserAnunciante->id);

            if ($anDia) {
                $newandia             = new AnuncioDia();
                $newandia             = AnuncioDia::findorfail($anDia->idanuncioDia);
                $newandia->numvisitas = $newandia->numvisitas + 1;

                $newandia->update();
            } else {
                if ($usuarioAnuncio->dias_disponibles > 0) {
                    $newandia               = new AnuncioDia();
                    $an1                    = new AnuncioProgramado();
                    $an1                    = AnuncioProgramado::findorfail($an->idanuncio_programado);
                    $newandia->idanuncio    = $an1->idanuncio_programado;
                    $newandia->idanunciante = $an1->UserAnunciante->id;
                    $newandia->fecha        = $fechaactual;
                    $newandia->idlocalidad  = $poblacion->idlocalidad;
                    $newandia->idprovincia  = $provincia->idprovincia;
                    $newandia->idadminPro   = $provincia->adminPro->id;
                    $newandia->idpartner    = $an1->UserAnunciante->Partner->id;
                    $newandia->numvisitas   = 1;
                    //$usuarioAnuncio                   = Useranunciante::findorfail($an1->UserAnunciante->id);
                    $usuarioAnuncio->dias_disponibles = $usuarioAnuncio->dias_disponibles - 1;
                    //localizamos el paquete del que descontar el dia
                    //para realizar los pagos...
                    $auxpaquete = Paquete::all()
                        ->where('idanunciante', $usuarioAnuncio->id)
                        ->where('estado', 'EN VIGOR')
                        ->sortBy('fechaReg')
                        ->first();
                    $auxpaquete->drestantes = $auxpaquete->drestantes - 1;
                    if ($auxpaquete->drestantes == 0) {
                        $auxpaquete->estado = 'AGOTADO';
                    }
                    $newandia->idpaquete = $auxpaquete->idpaquete;
                    $newandia            = $this->RepartirAnuncioColaboradores($newandia, $auxpaquete);
                    $auxpaquete->fechaUlt       = $fechaactual;
                    $auxpaquete->save();

                    $usuarioAnuncio->save();
                    $an1->ult_muestra = $fechaactual;
                    $an1->save();
                    $newandia->save();
                } else {

                    $anuncio->activo = 0;
                    $anuncio->save();
                    unset($preanuncios[$i]);
                }
            }
        }
        $provincias = DB::table('provincias')
            ->select('idprovincia', 'nombre', 'habilitado', 'coordenadas')
            ->get();

        foreach ($preanuncios as $pran) {
            $anP = AnuncioProgramado::findorfail($pran->idanuncio_programado);
            //esto hay que cambiar cogiendo las imagenes del anuncio_programado no del anuncio_modelo
            $ainp = Anuncio::findOrFail($anP->idanuncio);
            if (count($ainp->ImagenesAnuncio) > 0) {
                $imganP       = $ainp->ImagenesAnuncio;
                $imganP       = $imganP->first();
                $pran->imagen = $imganP->ficheroimagen;
            } else {
                $pran->imagen = "p1.gif";
            }

            if ($anP->ColorPelo != null) {
                $pran->pelo = $anP->ColorPelo->pelo;

            } else {
                $pran->pelo = "";
            }
            if ($anP->ColorOjos != null) {
                $pran->ojos = $anP->ColorOjos->ojos;

            } else {
                $pran->ojos = "";
            }

            if ($anP->Estatura != null) {
                $pran->estatura = $anP->Estatura->estatura;

            } else {
                $pran->estatura = "";
            }

        }
        return view('publico.mostrarAnunciosProvincia', ["anuncios" => $preanuncios, "provincias" => $provincias, "provincia" => $provincia]);
    }

    private function RepartirAnuncioColaboradores(AnuncioDia $AnuncioDia, Paquete $paquete)
    {
        $AnuncioDia->partner_comision  = $paquete->parte_partner;
        $AnuncioDia->adminpro_comision = $paquete->parte_adminpro;
        $AnuncioDia->admin_comision    = $paquete->parte_admin;

        return $AnuncioDia;
    }

    public function ActivarUsuario($email, $verifytoken)
    {
        $usuario = User::where(['email' => $email, 'token' => $verifytoken])->first();
        if ($usuario) {
            $usuario->status            = 1;
            $usuario->token             = null;
            $newpaquete                 = new Paquete;
            $newpaquete->tipo           = 'GRATIS';
            $newpaquete->idanunciante   = $usuario->id;
            $newpaquete->total          = 30;
            $newpaquete->dcontratados   = 30;
            $newpaquete->drestantes     = 30;
            $newpaquete->parte_partner  = 0;
            $newpaquete->parte_adminpro = 0;
            $newpaquete->parte_admin    = 0;
            $fechaact                   = getdate();
            $fechaactual                = $fechaact['year'] . "/" . substr("0" . $fechaact['mon'], -2) . "/" . substr("0" . $fechaact['mday'], -2);
            $newpaquete->fechaReg       = $fechaactual;
            $newpaquete->fechaUlt       = $fechaactual;
            $newpaquete->estado         = 'EN VIGOR';
            $newpaquete->save();
            $usuario->dias_disponibles = $newpaquete->dcontratados;
            $usuario->update();
            return $usuario->name . " Activado";
        } else {
            return $usuario->name . " No existe";
        }
    }
}
