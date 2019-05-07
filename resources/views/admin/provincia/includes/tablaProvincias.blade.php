<div class="card">
    <div class="table-responsive">
        <table "="" class="table table-striped table-bordered table-condensed table-hover">
            <thead>
                <th width="5%">
                    Id
                </th>
                <th width="35%">
                    Nombre
                </th>
                <th width="5%">
                    Habilitado
                </th>
                <th width="25%">
                    Responsable
                </th>
                <th width="30%">
                    Opciones
                </th>
            </thead>
            @if (count($provincias)>0)
            <tbody>
                @foreach ($provincias as $provi)
                <tr>
                    <td>
                        {{$provi->idprovincia}}
                    </td>
                    <td>
                        {{$provi->nombre}}
                    </td>
                    <td>
                        {{$provi->habilitado}}
                    </td>
                    <td>
                        <a href="{{URL::action('UsuarioController@edit',$provi->idresponsable)}}">
                            {{$provi->NombreUsuario}}
                        </a>
                    </td>
                    <td>
                        <button class="btn btn-sm btn-success">
                            <a href="{{URL::action('ProvinciaController@edit',$provi->idprovincia)}}">
                                <i class="ace-icon fa fa-pencil bigger-120">
                                </i>
                            </a>
                        </button>
                        @if ($provi->habilitado==1)
                        <button class="delete-modal btn btn-sm btn-danger" data-id="{{$provi->idprovincia}}">
                            DESHABILITAR
                        </button>
                        @else
                        <button class="delete-modal btn btn-sm btn-success" data-id="{{$provi->idprovincia}}">
                            HABILITAR
                        </button>
                        @endif
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
        {{$provincias->links()}}
    </div>
</div>