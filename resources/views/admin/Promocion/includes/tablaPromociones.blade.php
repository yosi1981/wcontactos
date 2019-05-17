                                    <div class="card">
                                        <div class="table-responsive">
                    <div class="widget-main">
                        <table class="table table-bordered table-hover" id="simple-table">
                            <thead>
                                <th>
                                    Id
                                </th>
                                <th class="detail-col">
                                    Descripcion
                                </th>
                                <th>
                                    Dias
                                </th>
                                <th>
                                    Importe
                                </th>
                                <th>
                                    Fecha Inicio
                                </th>
                                <th>
                                    Fecha Final
                                </th>
                                <th>
                                    Compras
                                </th>
                                <th>
                                    Estado
                                </th>
                                <th>
                                    Opciones
                                </th>
                            </thead>
                            <tbody>
                                @if(count($promociones)>0)
                @foreach($promociones as $promocion)
                                <tr>
                                    <td>
                                        {{$promocion->id}}
                                    </td>
                                    <td>
                                        {{$promocion->descripcion}}
                                    </td>
                                    <td>
                                        {{$promocion->dias}}
                                    </td>
                                    <td>
                                        {{$promocion->importe}}
                                    </td>
                                    <td>
                                        {{$promocion->fecha_inicio}}
                                    </td>
                                    <td>
                                        {{$promocion->fecha_fin}}
                                    </td>
                                    <td>
                                        {{$promocion->numcompras}}
                                    </td>
                                    <td>
                                        {{$promocion->status}}
                                    </td>
                                    <td>
                        <button class="btn btn-sm btn-success">
                            <a href="{{URL::action('PromocionController@edit',$promocion->id)}}">
                                <i class="ace-icon fa fa-pencil bigger-120">
                                </i>
                            </a>
                        </button>                                        
                                                            @if ($promocion->status==1)
                                                            <button class="delete-modal btn btn-sm btn-danger" data-id="{{$promocion->id}}">
                                                                DESHABILITAR
                                                            </button>
                                                            @else
                                                            <button class="delete-modal btn btn-sm btn-success" data-id="{{$promocion->id}}">
                                                                HABILITAR
                                                            </button>
                                                            @endif
                                    </td>
                                </tr>
                                @endforeach
                        @else
                                <tr>
                                    <td colspan="7">
                                        NO hay ninguna promocion que mostrar
                                    </td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                        {{$promociones->links()}}

                    </div>
                </div>
            </div>
        </div>