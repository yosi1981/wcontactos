                                    <div class="card">
                                        <div class="table-responsive">
                                            <table "="" class="table table-striped table-bordered table-condensed table-hover">
                                                <thead>
                                                    <th width="5%" >
                                                        Método
                                                    </th>
                                                    <th>
                                                        Ruta
                                                    </th>
                                                    <th>
                                                        Controlador
                                                    </th>
                                                    <th>
                                                        Funcion
                                                    </th>

                                                </thead>
                                                @if ($infocampos)
                                                <tbody>

                                                    @foreach ($infocampos as $info)
                                                            <tr style="font-weight: bold;">
                                                        <td>
                                                            {{$info->name}}
                                                        </td>
                                                        <td>
                                                            {{$info->flags}}
                                                        </td>
                                                        <td>
                                                            {{$info->type}}
                                                        </td>
                                                        <td>
                                                            {{$info->def}}
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
                                    </div>