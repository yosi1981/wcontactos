
<html>

    <body>
        <div>
            <table class="meta" width="75%">
                <tbody>
                <tr>
                    <th>Razon Social</th>
                    <td>EL aroma del placer</td>
                    <td class="noborder"></td>
                    <th>Factura Nº</th>
                    <td>2018/000000{{$factura->idfactura}}</td>
                </tr>
                <tr>
                    <th>N.I.F</th>
                    <td>B31313131</td>
                    <td class="noborder"></td>
                    <th>Fecha</th>
                    <td>{{$factura->fechafactura}}</td>
                </tr>
                <tr>
                    <th class="noborder"></th>
                    <td class="noborder"></td>
                    <td class="noborder"></td>
                    <th>Usuario</th>
                    <td>{{$fact["factureferidos"]["usuario"]["name"]}}</td>
                </tr>
                    <tr >
                        <th class="noborder" >&nbsp;</th>
                        <td class="noborder">&nbsp;</td>
                        <td class="noborder"> </td>
                        <th class="noborder" >&nbsp;</th>
                        <td class="noborder">&nbsp;</td>

                    </tr>
                </tbody>
            </table>
            @if($fact["factureferidos"])
                <table width="75%" class="inventory">
                    <thead>
                        <th width="13%">
                            Fecha
                        </th>
                        <th width="62%">
                            Usuario
                        </th>
                        <th width="15%">
                            Nº Anuncios
                        </th>
                        <th width="10%">
                            Total
                        </th>
                    </thead>
                    <tbody>
                        <tr>

                        </tr>
                        <tr >
                            <td class="noborder" colspan=4>&nbsp;
                            </td>
                        </tr>
                        @foreach($fact["factureferidos"]["contenido"] as $fecha)
                        <tr>
                            <td class="totales">{{$fecha["fecha"]}} </td>
                            <td class="noborder" colspan=3></td>
                        </tr>
                            @foreach($fecha["referidos"] as $referido)
                            <tr>
                                <td class="noborder"></td>
                                <td>{{$referido["referido"]["name"]}}</td>
                                <td class="nums">{{$referido["NumAnuncios"]}}</td>
                                <td class="nums">{{$referido["totaldiareferido"]}}</td>
                            </tr>
                            @endforeach
                        <tr>
                            <td class="noborder dech" colspan=2>Total dia...</td>
                            <td  class="totales">{{$fecha["NumAnuncios"]}}</td>
                            <td  class="totales">{{$fecha["totalganadodia"]}}</td>
                        </tr>
                        @endforeach
                        <tr>
                            <td class="noborder" colspan=3>Total Referidos...</td>
                            <td class="totales">{{$fact["factureferidos"]["totalfactura"]}}</td>
                            <div class="breakNow"></div>
                        </tr>
                        </tbody>
                </table>
            @endif
            @if($fact["factuprovincias"])

            <table class="inventory" width="75%">
                <thead>
                    <th width="13%">
                        Fecha
                    </th>
                    <th width="62%">
                        Provincia
                    </th>
                    <th width="15%">
                        Nº Anuncios
                    </th>
                    <th width="10%">
                        Total
                    </th>
                </thead>
                <tbody>
                    <tr>
                    </tr>
                    <tr>
                        <td class="noborder" colspan="4">
                        </td>
                    </tr>
                    @foreach($fact["factuprovincias"]["contenido"] as $fecha)
                    <tr>
                        <td class="totales">
                            {{$fecha["fecha"]}}
                        </td>
                        <td class="noborder" colspan="3">
                        </td>
                    </tr>
                    @foreach($fecha["provincias"] as $provincia)
                    <tr>
                        <td class="noborder">
                        </td>
                        <td>
                            {{$provincia["provincia"]["nombre"]}}
                        </td>
                        <td class="nums">
                            {{$provincia["NumanunprovinciaDia"]}}
                        </td>
                        <td class="nums">
                            {{$provincia["totaldiaprovincia"]}}
                        </td>
                    </tr>
                    @endforeach
                    <tr>
                        <td class="noborder dech" colspan="2">
                            Total dia...
                        </td>
                        <td class="totales">
                            {{$fecha["NumAnuncios"]}}
                        </td>
                        <td class="totales">
                            {{$fecha["totalganadodia"]}}
                        </td>
                    </tr>
                    @endforeach
                    <tr>
                        <td class="noborder" colspan="3">
                            Total Provincias...
                        </td>
                        <td class="totales">
                            {{$fact["factuprovincias"]["totalfacturaPro"]}}
                        </td>
                                                                            <div class="breakNow"></div>
                    </tr>
                </tbody>
            </table>
            @endif
            @if($fact["factuadmin"])

            <table class="inventory" width="75%">
                <thead>
                    <th width="13%">
                        Fecha
                    </th>
                    <th width="62%">
                        Provincia ADMIN
                    </th>
                    <th width="15%">
                        Nº Anuncios
                    </th>
                    <th width="10%">
                        Total
                    </th>
                </thead>
                <tbody>
                    <tr>
                    </tr>
                    <tr>
                        <td class="noborder" colspan="4">
                        </td>
                    </tr>

                    @foreach($fact["factuadmin"]["contenido"] as $fecha)
                    <tr>
                        <td class="totales">
                            {{$fecha["fecha"]}}
                        </td>
                        <td class="noborder" colspan="3">
                        </td>
                    </tr>
                    @foreach($fecha["provincias"] as $provincia)
                    <tr>
                        <td class="noborder">
                        </td>
                        <td>
                            {{$provincia["provincia"]["nombre"]}}
                        </td>
                        <td class="nums">
                            {{$provincia["NumanunprovinciaDia"]}}
                        </td>
                        <td class="nums">
                            {{$provincia["totaldiaprovincia"]}}
                        </td>
                    </tr>
                    @endforeach
                    <tr>
                        <td class="noborder dech" colspan="2">
                            Total dia...
                        </td>
                        <td class="totales">
                            {{$fecha["NumAnuncios"]}}
                        </td>
                        <td class="totales">
                            {{$fecha["totalganadodia"]}}
                        </td>
                    </tr>
                    @endforeach
                    <tr>
                        <td class="noborder" colspan="3">
                            Total Provincias...
                        </td>
                        <td class="totales">
                            {{$fact["factuadmin"]["totalfacturaAdmin"]}}
                        </td>
                                                                            <div class="breakNow"></div>
                    </tr>
                </tbody>
            </table>
            @endif
               <table class="inventory" width="75%">
                    <tbody>
                        <tr>
                            <td class="totales dech" colspan="3">
                                Total Factura...
                            </td>
                            <td class="totales">
                                {{$factura->importefactura}}
                            </td>
                        </tr>
                    </tbody>
                </table>
        </div>

    </body>
</html>

<style>
/* reset */


/* heading */

h1 { font: bold 100% sans-serif; letter-spacing: 0.5em; text-align: center; text-transform: uppercase; }

/* table */

table { font-size: 75%; table-layout: fixed; width: 76%; }
table { border-collapse: separate; border-spacing: 2px; }
th, td { border-width: 1px; padding: 0.5em; position: relative; text-align: left; }
th, td { border-radius: 0.25em; border-style: solid; }
th { background: #EEE; border-color: #BBB; }
td { border-color: #DDD; }
div.breakNow { page-break-inside:avoid; page-break-after:always; }
.totales {
    background: #EEE;
    border-color: #BBB;
    border-width: 1px;
    padding: 0.5em;
    position: relative;
    text-align: right;
    border-radius: 0.25em;
    border-style: solid;
}
.nums {
    border-width: 1px;
    padding: 0.5em;
    position: relative;
    text-align: right;
    border-radius: 0.25em;
    border-style: solid;
}
.noborder {
    border-width:none;
    padding: 0.5em;
    position: relative;
    text-align: right;
    border-radius: 0.25em;
    border-style: solid;
}
.dech {
    text-align: right;
}
/* page */

html { font: 16px/1 'Open Sans', sans-serif; overflow: auto; padding: 0.5in; }
html { background: #999; cursor: default; }

body { box-sizing: border-box; height: 11in; margin: 0 auto; overflow: hidden; padding: 0.5in; width: 8.5in; }
body { background: #FFF; border-radius: 1px; box-shadow: 0 0 1in -0.25in rgba(0, 0, 0, 0.5); }

/* header */

header { margin: 0 0 3em; }
header:after { clear: both; content: ""; display: table; }

header h1 { background: #000; border-radius: 0.25em; color: #FFF; margin: 0 0 1em; padding: 0.5em 0; }
header address { float: left; font-size: 75%; font-style: normal; line-height: 1.25; margin: 0 1em 1em 0; }
header address p { margin: 0 0 0.25em; }
header span, header img { display: block; float: right; }
header span { margin: 0 0 1em 1em; max-height: 25%; max-width: 60%; position: relative; }
header img { max-height: 100%; max-width: 100%; }
header input { cursor: pointer; -ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)"; height: 100%; left: 0; opacity: 0; position: absolute; top: 0; width: 100%; }




/* table items */

table.inventory { clear: both; width: 75%; }
table.inventory th { font-weight: bold; text-align: center; }


/* table balance */
table.meta { float: left; width: 75%; }


/* table meta */

table.meta th { width: 20%; text-align: center;}
table.meta td { width: 30%; text-align:right }

</style>
