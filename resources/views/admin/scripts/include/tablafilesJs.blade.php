                                    <div class="card">
                                        <div class="table-responsive">
                                            <table "="" class="table table-striped table-bordered table-condensed table-hover">
                                                <thead>
                                                    <th width="5%" >
                                                        <div align="center">
                                                                    <input name="todUsu" type="checkbox" value=""/>
                                                        </div>
                                                    </th>
                                                    <th width="5%" >
                                                        Estado
                                                    </th>
                                                    <th>
                                                        Css
                                                    </th>
                                                    <th>
                                                        Tamaño
                                                    </th>
                                                </thead>
                                                @if (count($scripts)>0)
                                                <tbody>
                                                    @foreach ($scripts as $script)
                                                        @if($script["file_in_proyect"]==-1)
                                                            <tr style="color:red;font-weight: bold;">
                                                        @else
                                                            @if($script["file_in_proyect"]==1)
                                                            <tr style="font-weight: bold;">
                                                            @else
                                                            <tr>
                                                            @endif
                                                        @endif
                                                        <td align="center">
                                                                    @if($script["file_in_proyect"]>0)
                                                                        <input name="todUsu" type="checkbox" checked="CHECKED" />
                                                                    @else
                                                                        @if($script["file_in_proyect"]==0)
                                                                        <input name="todUsu" type="checkbox" />
                                                                        @endif
                                                                    @endif
                                                        </td>

                                                        <td align="center">
                            </i>
                                                                    @if($script["file_in_proyect"]>0)
                                                                        <i style="color:green" class="menu-icon fa fa-check">
                                                                    @else
                                                                        @if($script["file_in_proyect"]==-1)
                                                                        <i class="menu-icon fa fa-times">
                                                                        @endif
                                                                    @endif                            
                                                        </td>
                                                        <td>
                                                            {{$script["stylefile"]}}
                                                        </td>
                                                        <td>
                                                            {{$script["stylefile_size"]}}
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