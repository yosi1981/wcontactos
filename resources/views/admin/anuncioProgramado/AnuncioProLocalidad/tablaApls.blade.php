<div class="table-responsive">
    <table class="table table-striped table-bordered table-condensed table-hover">
        <thead>
            <th>
                Id
            </th>
            <th>
                Id A. Programado
            </th>
            <th>
                Id Provincia
            </th>
            <th>
                Id Localidad
            </th>
            <th>
            </th>
        </thead>
        @if (count($apls)>0)
        <tbody>
            @foreach ($apls as $apl)
            <tr>
                <td>
                    {{$apl->idanuncioProLocalidad}}
                </td>
                <td>
                    {{$apl->idanuncioProgramado}}
                </td>
                <td>
                    {{$apl->provincia->nombre}}
                </td>
                <td>
                    {{$apl->localidad->nombre}}
                </td>
                        <td>
                        <button id="editlocalidadAP" name="editlocalidadAP" data-id="{{$apl->idanuncioProLocalidad}}" class="editlocalidadAP btn btn-info">Editar</button></a>
                        <button class="deleteAPpre btn btn-danger" data-id="{{$apl->idanuncioProLocalidad}}">Eliminar</button>
                        </td>
            </tr>
            @endforeach
        </tbody>
        @else
        <tbody>
            <tr>
                <td align="center" colspan="5">
                    <b>
                        No hay resultados en la búsqueda
                    </b>
                </td>
            </tr>
        </tbody>
        @endif
    </table>
</div>
