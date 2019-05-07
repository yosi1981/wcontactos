<?php
namespace App\Http\Traits;

use App\menu;
use DB;
use Illuminate\Support\Facades\Schema;
use mysqli;
trait funcionesBd
{

    public function GetCamposBd($tabla)
    {
$mysqli = new mysqli("127.0.0.1", "root", "noeliatqm", "contactos");

/* comprobar la conexión */
if (mysqli_connect_errno()) {
    printf("Falló la conexión: %s\n", $mysqli->connect_error);
    exit();
}

foreach (array('latin1', 'utf8') as $conj_caract) {

    // Establecer el conjunto de caracteres para mostrar su impacto en algunos valores (p.ej., longitud en bytes)
    $mysqli->set_charset($conj_caract);

    $consulta = "SELECT * from ".$tabla;
 
    if ($resultado = $mysqli->query($consulta)) {

        /* Obtener la información del campo para todas las columnas */
        $info_campo = $resultado->fetch_fields();
        $resultado->free();
    }
}
$mysqli->close();
    return $info_campo;
    }

public static function h_flags2txt($flags_num)
{
    static $flags;

    if (!isset($flags))
    {
        $flags = array();
        $constants = get_defined_constants(true);
        foreach ($constants['mysqli'] as $c => $n) if (preg_match('/MYSQLI_(.*)_FLAG$/', $c, $m)) if (!array_key_exists($n, $flags)) $flags[$n] = $m[1];
    }

    $result = array();
    foreach ($flags as $n => $t) if ($flags_num & $n) $result[] = $t;
    return implode(' ', $result);
}
}
