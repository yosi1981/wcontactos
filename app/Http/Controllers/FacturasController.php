<?php

namespace App\Http\Controllers;

use App;
use App\AnuncioDia;
use App\Factura;
use App\Http\Traits\trait1;
use App\Provincia;
use App\User;
use Auth;
use DB;
use Telegram\Bot\Api;
use Telegram\Bot\Laravel\Facades\Telegram;

class FacturasController extends Controller
{
    use trait1;
    protected $telegram;

    public function __construct()
    {
        $this->telegram = new Api('642406866:AAHMJndO_QhFzliHewOLUvPUtFZOMhjZZtI');
        //dd($this->telegram->getUpdates());
    }

    public function GetFacturasPagar()
    {
        \Session::put('seccion_actual', "pagosxlotes");
        $facturas = Factura::all()->where('pagada', '=', '0')->where('idlotepago', '=', '');
        $menu     = $this->MenuIzquierdo(4);
        return view('admin.PagoxLotes.pago', ['facturas' => $facturas, 'menu' => $menu]);
    }

    public function facturarUsuario($idusuario)
    {
        $usuario = User::findOrFail($idusuario);

        $hayparaFacturar = DB::table('anunciosDia')
            ->where('anunciosDia.idpartner', '=', $idusuario)
            ->where('anunciosDia.factupartner', '=', 0)
            ->count();
        $hayparaFacturarPro   = 0;
        $hayparaFacturarAdmin = 0;
        if ($usuario->tipo_usuario == 2) {
            $hayparaFacturarPro = DB::table('anunciosDia')
                ->where('anunciosDia.idadminPro', '=', $idusuario)
                ->where('anunciosDia.factuadminPro', '=', 0)
                ->count();
        }
        if ($usuario->tipo_usuario == 4) {
            $hayparaFacturarAdmin = DB::table('anunciosDia')
                ->where('anunciosDia.factuadmin', '=', 0)
                ->count();
        }
        if ($hayparaFacturar > 0 or $hayparaFacturarPro > 0 or $hayparaFacturarAdmin > 0) {
            $factura = new Factura;

            $TotalFactura    = 0;
            $TotalFactu      = 0;
            $TotalFactuPro   = 0;
            $TotalFactuAdmin = 0;

            if ($hayparaFacturar > 0) {
                $anunciosFacturar = DB::table('anunciosDia')
                    ->where('anunciosDia.idpartner', '=', $idusuario)
                    ->where('anunciosDia.factupartner', '=', 0)
                    ->get();
                $TotalFactu = DB::table('anunciosDia')
                    ->where('anunciosDia.idpartner', '=', $idusuario)
                    ->where('anunciosDia.factupartner', '=', 0)
                    ->sum('anunciosDia.partner_comision');
            }
            if ($hayparaFacturarPro > 0) {
                $anunciosFacturarPro = DB::table('anunciosDia')
                    ->where('anunciosDia.idadminPro', '=', $idusuario)
                    ->where('anunciosDia.factuadminPro', '=', 0)
                    ->get();
                $TotalFactuPro = DB::table('anunciosDia')
                    ->where('anunciosDia.idadminPro', '=', $idusuario)
                    ->where('anunciosDia.factuadminPro', '=', 0)
                    ->sum('anunciosDia.adminpro_comision');
            }
            if ($hayparaFacturarAdmin > 0) {
                $anunciosFacturarAdmin = DB::table('anunciosDia')
                    ->where('anunciosDia.factuadmin', '=', 0)
                    ->get();
                $TotalFactuAdmin = DB::table('anunciosDia')
                    ->where('anunciosDia.factuadmin', '=', 0)
                    ->sum('anunciosDia.admin_comision');
            }
            $factura->idusuario      = $idusuario;
            $fechaact                = getdate();
            $fechaactual             = $fechaact['year'] . "-" . substr("0" . $fechaact['mon'], -2) . "-" . substr("0" . $fechaact['mday'], -2);
            $TotalFactura            = $TotalFactu + $TotalFactuPro + $TotalFactuAdmin;
            $factura->fechafactura   = $fechaactual;
            $factura->importefactura = $TotalFactura;
            $factura->save();

            if ($hayparaFacturar > 0) {
                foreach ($anunciosFacturar as $anunF) {
                    $af               = AnuncioDia::findOrFail($anunF->idanuncioDia);
                    $af->factupartner = $factura->idfactura;
                    $af->update();
                }
            }
            if ($hayparaFacturarPro > 0) {
                foreach ($anunciosFacturarPro as $anunF) {
                    $af                = AnuncioDia::findOrFail($anunF->idanuncioDia);
                    $af->factuadminPro = $factura->idfactura;
                    $af->update();
                }
            }
            if ($hayparaFacturarAdmin > 0) {
                foreach ($anunciosFacturarAdmin as $anunF) {
                    $af             = AnuncioDia::findOrFail($anunF->idanuncioDia);
                    $af->factuadmin = $factura->idfactura;
                    $af->update();
                }
            }
            $text = "<b> FACTURADO $usuario->name IMPORTE $factura->importefactura </b>\n";
            $this->telegram->sendMessage([
                'chat_id'    => env('TELEGRAM_CHANNEL_ID', '-1001307907673'),
                'parse_mode' => 'HTML',
                'text'       => $text,
            ]);
        }
    }

    public function VerFactura($idfactura)
    {
        $factura = Factura::findOrFail($idfactura);
        $usuario = User::findOrFail($factura->idusuario);
        $fact    = array(
            "factureferidos"  => $this->PendienteFacturarUsuario($idfactura, $factura->idusuario),
            "factuprovincias" => $this->PendienteFacturarUsuarioProv($idfactura, $factura->idusuario),
            "factuadmin"      => $this->PendienteFacturarUsuarioAdmin($idfactura, $factura->idusuario),
        );
        $fechaEUR              = date("d/m/Y", strtotime($factura->fechafactura));
        $factura->fechafactura = $fechaEUR;
        $pdf                   = \PDF::loadView(Auth::user()->stringRol->nombre . '.Facturas.factura', ['fact' => $fact, 'factura' => $factura, 'usuario' => $usuario])->setPaper('a4');
        return $pdf->stream();
    }

    public function facturarTodosUsuarios()
    {
        $usuarios = User::all();
        if ($usuarios) {
            foreach ($usuarios as $usuario) {
                $this->facturarUsuario($usuario->id);

            }
        }
    }

    public function PendienteFacturar()
    {
        \Session::put('seccion_actual', "facturacion");

        $usuarios = User::all();
        $pdt      = null;
        $pdt1     = null;
        if ($usuarios) {
            $pdt = null;
            $i   = 1;
            foreach ($usuarios as $usuario) {
                $pdttotal = 0;
                $dato     = false;

                $pdtUsuario = $this->PendienteFacturarUsuario(0, $usuario->id);
                if (!is_null($pdtUsuario)) {
                    $pdt1[$i] = array(
                        "pdte"      => $pdtUsuario["totalfactura"],
                        "contenido" => $pdtUsuario["contenido"],
                        "usuario"   => $pdtUsuario["usuario"],
                    );
                    $pdttotal += $pdtUsuario["totalfactura"];
                    $dato = true;
                }
                $pdtUsuario1 = $this->PendienteFacturarUsuarioProv(0, $usuario->id);
                if (!is_null($pdtUsuario1)) {
                    $pdt1[$i] = array(
                        "pdte"      => $pdtUsuario1["totalfacturaPro"],
                        "contenido" => $pdtUsuario1["contenido"],
                        "usuario"   => $pdtUsuario1["usuario"],
                    );
                    $pdttotal += $pdtUsuario1["totalfacturaPro"];
                    $dato = true;
                }
                $pdtUsuario2 = $this->PendienteFacturarUsuarioAdmin(0, $usuario->id);
                if (!is_null($pdtUsuario2)) {
                    $pdt1[$i] = array(
                        "pdte"      => $pdtUsuario2["totalfacturaAdmin"],
                        "contenido" => $pdtUsuario2["contenido"],
                        "usuario"   => $pdtUsuario2["usuario"],
                    );
                    $pdttotal += $pdtUsuario2["totalfacturaAdmin"];
                    $dato = true;
                }
                if ($dato == true) {
                    $pdt1[$i]["pdte"] = $pdttotal;
                    $i += 1;
                    $dato = false;
                }
            }
            $pdt["contenido"] = $pdt1;
            $pdt["pdttotal"]  = $pdttotal;
            $menu             = $this->MenuIzquierdo(4);
            return view(Auth::user()->stringRol->nombre . '.Facturas.Facturacion', ["usupdt" => $pdt, "menu" => $menu]);
        }
    }

    public function listarPendienteReferidos()
    {
        \Session::put('seccion_actual', "MiCuentaPendiente");
        $pendienteReferido = $this->PendienteFacturarUsuario(0, Auth::user()->id);
        $menu              = $this->MenuIzquierdo(Auth::user()->stringRol->id);
        return view(Auth::user()->stringRol->nombre . '.InfoCuenta.tablapendienteReferidos', ["pdtRef" => $pendienteReferido, "menu" => $menu]);
    }

    public function getUserFacturas()
    {
        \Session::put('seccion_actual', "MisFacturas");
        $facturas = Factura::all()->where('idusuario', '=', Auth::user()->id)->where('pagada', '=', 1);
        $menu     = $this->MenuIzquierdo(Auth::user()->stringRol->id);
        return view(Auth::user()->stringRol->nombre . '.Facturas.index', ["facturas" => $facturas, "tipousuario" => Auth::user()->stringRol->nombre, "menu" => $menu]);
    }

    public function getAllFacturas()
    {
        \Session::put('seccion_actual', "ListadoFacturas");
        $facturas = Factura::all();
        $menu     = $this->MenuIzquierdo(4);
        return view('admin.Facturas.listadofacturas', ["facturas" => $facturas, "menu" => $menu]);
    }

    public function PendienteFacturarUsuario($factur, $idusuario)
    {
        $posible         = false;
        $factura         = null;
        $hayparaFacturar = DB::table('anunciosDia')
            ->where('anunciosDia.idpartner', '=', $idusuario)
            ->where('anunciosDia.factupartner', '=', $factur)
            ->count();

        if ($hayparaFacturar > 0) {
            $posible = true;
        }
        if ($posible) {
            $totalfactura = DB::table('anunciosDia')
                ->where('anunciosDia.idpartner', '=', $idusuario)
                ->where('anunciosDia.factupartner', '=', $factur)
                ->sum('anunciosDia.partner_comision');

            $preanuncios = DB::table('anunciosDia')
                ->select('anunciosDia.fecha')
                ->where('anunciosDia.idpartner', '=', $idusuario) //filtramos la localidad
                ->where('anunciosDia.factupartner', '=', $factur)
                ->distinct('anunciosDia.fecha')
                ->get();

            $usuario = User::findOrFail($idusuario);
            $data    = null;
            $i       = 0;
            foreach ($preanuncios as $pre) {
                $anunNumFecha = DB::table('anunciosDia')
                    ->where('anunciosDia.idpartner', '=', $idusuario)
                    ->where('anunciosDia.fecha', '=', $pre->fecha)
                    ->where('anunciosDia.factupartner', '=', $factur)
                    ->count();
                $totaldia = DB::table('anunciosDia')
                    ->where('anunciosDia.idpartner', '=', $idusuario)
                    ->where('anunciosDia.fecha', '=', $pre->fecha)
                    ->where('anunciosDia.factupartner', '=', $factur)
                    ->sum('anunciosDia.partner_comision');
                $referidos = DB::table('anunciosDia')
                    ->join('users', 'anunciosDia.idanunciante', '=', 'users.id')
                    ->select('anunciosDia.idanunciante', 'users.name')
                    ->where('anunciosDia.idpartner', '=', $idusuario)
                    ->where('anunciosDia.fecha', '=', $pre->fecha)
                    ->where('anunciosDia.factupartner', '=', $factur)
                    ->orderBy('users.name')
                    ->distinct('anunciosDia.idanunciante')
                    ->get();
                $datosrefdia = null;
                $ii          = 0;
                foreach ($referidos as $referido) {
                    $totaldiareferido = DB::table('anunciosDia')
                        ->where('anunciosDia.idpartner', '=', $idusuario)
                        ->where('anunciosDia.fecha', '=', $pre->fecha)
                        ->where('anunciosDia.idanunciante', '=', $referido->idanunciante)
                        ->where('anunciosDia.factupartner', '=', $factur)
                        ->sum('anunciosDia.partner_comision');

                    $anunreferidos = DB::table('anunciosDia')
                        ->where('anunciosDia.fecha', '=', $pre->fecha)
                        ->where('anunciosDia.idpartner', '=', $idusuario)
                        ->where('anunciosDia.idanunciante', '=', $referido->idanunciante)
                        ->where('anunciosDia.factupartner', '=', $factur)
                        ->get();
                    $NumanunreferidosDia = DB::table('anunciosDia')
                        ->where('anunciosDia.fecha', '=', $pre->fecha)
                        ->where('anunciosDia.idpartner', '=', $idusuario)
                        ->where('anunciosDia.idanunciante', '=', $referido->idanunciante)
                        ->where('anunciosDia.factupartner', '=', $factur)
                        ->count();
                    $refer            = User::findOrFail($referido->idanunciante);
                    $datosrefdia[$ii] = array(
                        "referido"            => $refer,
                        "NumAnuncios"         => $NumanunreferidosDia,
                        "totaldiareferido"    => $totaldiareferido,
                        "anunciosdiareferido" => $anunreferidos,
                    );
                    $ii += 1;
                }

                $postfecha = date("d/m/Y", strtotime($pre->fecha));
                $data[$i]  = array(
                    "fecha"          => $postfecha, //obligatoriamente "title", "start" y "url" son campos requeridos
                    "NumAnuncios"    => $anunNumFecha,
                    "totalganadodia" => $totaldia,
                    "referidos"      => $datosrefdia,
                );
                $i += 1;
            }
            $factura = array(
                "totalfactura" => $totalfactura,
                "contenido"    => $data,
                "usuario"      => $usuario,
            );

            return $factura;
        }

    }

    public function PendienteFacturarProv()
    {
        $pdttotal = 0;
        $usuarios = User::all()->where("tipo_usuario", "=", 2);
        if ($usuarios) {
            $pdt = null;
            $i   = 0;
            foreach ($usuarios as $usuario) {
                $pdtUsuario = $this->PendienteFacturarUsuarioProv(0, $usuario->id);
                if (!is_null($pdtUsuario)) {
                    $pdt[$i] = array(
                        "pdte"      => $pdtUsuario["totalfacturaPro"],
                        "contenido" => $pdtUsuario["contenido"],
                        "usuario"   => $pdtUsuario["usuario"],
                    );
                    $pdttotal += $pdt[$i]["pdte"];
                }
                $i += 1;
            }
            $pdt["pdttotal"] = $pdttotal;
            return $pdt;
        }
    }

    public function PendienteFacturarUsuarioProv($factur, $idusuario)
    {
        $posible         = false;
        $factura         = null;
        $hayparaFacturar = DB::table('anunciosDia')
            ->where('anunciosDia.idadminPro', '=', $idusuario)
            ->where('anunciosDia.factuadminPro', '=', $factur)
            ->count();

        if ($hayparaFacturar > 0) {
            $posible = true;
        }

        if ($posible) {
            $totalfactura = DB::table('anunciosDia')
                ->where('anunciosDia.idadminPro', '=', $idusuario)
                ->where('anunciosDia.factuadminPro', '=', $factur)
                ->sum('anunciosDia.adminpro_comision');

            $preanuncios = DB::table('anunciosDia')
                ->select('anunciosDia.fecha')
                ->where('anunciosDia.idadminPro', '=', $idusuario) //filtramos la localidad
                ->where('anunciosDia.factuadminPro', '=', $factur)
                ->distinct('anunciosDia.fecha')
                ->get();

            $usuario = User::findOrFail($idusuario);
            $i       = 0;
            $data    = null;
            foreach ($preanuncios as $pre) {
                $fecha        = $pre->fecha;
                $anunNumFecha = DB::table('anunciosDia')
                    ->where('anunciosDia.idadminPro', '=', $idusuario)
                    ->where('anunciosDia.fecha', '=', $pre->fecha)
                    ->where('anunciosDia.factuadminPro', '=', $factur)
                    ->count();
                $totaldia = DB::table('anunciosDia')
                    ->where('anunciosDia.idadminPro', '=', $idusuario)
                    ->where('anunciosDia.fecha', '=', $pre->fecha)
                    ->where('anunciosDia.factuadminPro', '=', $factur)
                    ->sum('anunciosDia.adminpro_comision');
                $provincias = null;
                $provincias = DB::table('anunciosDia')
                    ->join('provincias', 'provincias.idprovincia', '=', 'anunciosDia.idprovincia')
                    ->select('anunciosDia.idprovincia', 'provincias.nombre')
                    ->where('anunciosDia.idadminPro', '=', $idusuario)
                    ->where('anunciosDia.fecha', '=', $fecha)
                    ->where('anunciosDia.factuadminPro', '=', $factur)
                    ->orderBy('provincias.nombre')
                    ->distinct('idprovincia')
                    ->get();
                if ($pre->fecha == "2019-01-12") {
                    //dd($provincias);
                }
                $ii           = 0;
                $datosprovdia = null;
                foreach ($provincias as $provincia) {
                    $totaldiaprovincia = DB::table('anunciosDia')
                        ->where('anunciosDia.idadminPro', '=', $idusuario)
                        ->where('anunciosDia.fecha', '=', $pre->fecha)
                        ->where('anunciosDia.idprovincia', '=', $provincia->idprovincia)
                        ->where('anunciosDia.factuadminPro', '=', $factur)
                        ->sum('anunciosDia.adminpro_comision');

                    $anunciosprovinciadia = DB::table('anunciosDia')
                        ->where('anunciosDia.fecha', '=', $pre->fecha)
                        ->where('anunciosDia.idadminPro', '=', $idusuario)
                        ->where('anunciosDia.idprovincia', '=', $provincia->idprovincia)
                        ->where('anunciosDia.factuadminPro', '=', $factur)
                        ->get();
                    $NumanunprovinciaDia = DB::table('anunciosDia')
                        ->where('anunciosDia.fecha', '=', $pre->fecha)
                        ->where('anunciosDia.idadminPro', '=', $idusuario)
                        ->where('anunciosDia.idprovincia', '=', $provincia->idprovincia)
                        ->where('anunciosDia.factuadminPro', '=', $factur)
                        ->count();
                    $provi             = Provincia::findOrFail($provincia->idprovincia);
                    $datosprovdia[$ii] = array(
                        "provincia"            => $provi,
                        "NumanunprovinciaDia"  => $NumanunprovinciaDia,
                        "totaldiaprovincia"    => $totaldiaprovincia,
                        "anunciosprovinciadia" => $anunciosprovinciadia,
                    );
                    $ii += 1;
                }

                $postfecha = date("d/m/Y", strtotime($pre->fecha));
                $data[$i]  = array(
                    "fecha"          => $postfecha,
                    "NumAnuncios"    => $anunNumFecha,
                    "totalganadodia" => $totaldia,
                    "provincias"     => $datosprovdia,
                );
                $i += 1;
            }
            $factura = array(
                "totalfacturaPro" => $totalfactura,
                "contenido"       => $data,
                "usuario"         => $usuario,
            );

            return $factura;
        }

    }

    public function PendienteFacturarAdmin()
    {
        $pdttotal = 0;
        $usuarios = User::all()->where("tipo_usuario", "=", 4);
        if ($usuarios) {
            $i = 0;
            foreach ($usuarios as $usuario) {
                $pdtUsuario = $this->PendienteFacturarUsuarioAdmin(0, $usuario->id);
                if (!is_null($pdtUsuario)) {
                    $pdt[$i] = array(
                        "pdte"      => $pdtUsuario["totalfacturaAdmin"],
                        "contenido" => $pdtUsuario["contenido"],
                        "usuario"   => $pdtUsuario["usuario"],
                    );
                    $pdttotal += $pdt[$i]["pdte"];
                }
                $i += 1;
            }
            $pdt["pdttotal"] = $pdttotal;
            return $pdt;
        }
    }

    public function PendienteFacturarUsuarioAdmin($factur, $idusuario)
    {
        $posible = false;
        $factura = null;

        $usuario = User::findOrFail($idusuario);

        $hayparaFacturar = DB::table('anunciosDia')
            ->where('anunciosDia.factuadmin', '=', $factur)
            ->count();

        if ($hayparaFacturar > 0) {
            $posible = true;
        }
        if ($usuario->tipo_usuario != 4) {
            $posible = false;
        }

        if ($posible) {
            $totalfactura = DB::table('anunciosDia')
                ->where('anunciosDia.factuadmin', '=', $factur)
                ->sum('anunciosDia.admin_comision');

            $preanuncios = DB::table('anunciosDia')
                ->select('anunciosDia.fecha')
                ->where('anunciosDia.factuadmin', '=', $factur)
                ->distinct('anunciosDia.fecha')
                ->get();

            $usuario = User::findOrFail($idusuario);
            $data    = null;
            $i       = 0;
            foreach ($preanuncios as $pre) {
                $anunNumFecha = DB::table('anunciosDia')
                    ->where('anunciosDia.fecha', '=', $pre->fecha)
                    ->where('anunciosDia.factuadmin', '=', $factur)
                    ->count();
                $totaldia = DB::table('anunciosDia')
                    ->where('anunciosDia.fecha', '=', $pre->fecha)
                    ->where('anunciosDia.factuadmin', '=', $factur)
                    ->sum('anunciosDia.admin_comision');
                $provincias = null;
                $provincias = DB::table('anunciosDia')
                    ->select('anunciosDia.idprovincia', 'provincias.nombre')
                    ->join('provincias', 'provincias.idprovincia', '=', 'anunciosDia.idprovincia')
                    ->where('anunciosDia.fecha', '=', $pre->fecha)
                    ->where('anunciosDia.factuadmin', '=', $factur)
                    ->orderBy('provincias.nombre')
                    ->distinct('anunciosDia.idprovincia')
                    ->get();
                $datosprovdia = null;
                $ii           = 0;
                foreach ($provincias as $provincia) {
                    $totaldiaprovincia = DB::table('anunciosDia')
                        ->where('anunciosDia.fecha', '=', $pre->fecha)
                        ->where('anunciosDia.idprovincia', '=', $provincia->idprovincia)
                        ->where('anunciosDia.factuadmin', '=', $factur)
                        ->sum('anunciosDia.admin_comision');

                    $anunciosprovinciadia = DB::table('anunciosDia')
                        ->where('anunciosDia.fecha', '=', $pre->fecha)
                        ->where('anunciosDia.idprovincia', '=', $provincia->idprovincia)
                        ->where('anunciosDia.factuadmin', '=', $factur)
                        ->get();
                    $NumanunprovinciaDia = DB::table('anunciosDia')
                        ->where('anunciosDia.fecha', '=', $pre->fecha)
                        ->where('anunciosDia.idprovincia', '=', $provincia->idprovincia)
                        ->where('anunciosDia.factuadmin', '=', $factur)
                        ->count();
                    $provi             = Provincia::findOrFail($provincia->idprovincia);
                    $datosprovdia[$ii] = array(
                        "provincia"            => $provi,
                        "NumanunprovinciaDia"  => $NumanunprovinciaDia,
                        "totaldiaprovincia"    => $totaldiaprovincia,
                        "anunciosprovinciadia" => $anunciosprovinciadia,
                    );
                    $ii += 1;
                }

                $postfecha = date("d/m/Y", strtotime($pre->fecha));
                $data[$i]  = array(
                    "fecha"          => $postfecha,
                    "NumAnuncios"    => $anunNumFecha,
                    "totalganadodia" => $totaldia,
                    "provincias"     => $datosprovdia,
                );
                $i += 1;
            }
            $factura = array(
                "totalfacturaAdmin" => $totalfactura,
                "contenido"         => $data,
                "usuario"           => $usuario,
            );

            return $factura;
        }

    }
}
