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
                                                <?php if(count($rutas)>0): ?>
                                                <tbody>
                                                    <?php 
                                                    $total=count($rutas[0]);

                                                    for ($i=0;$i<$total;$i++)
                                                    {
                                                    ?>
                                                            <tr style="font-weight: bold;">
                                                        <td>
                                                            <?php echo e($rutas[1][$i]); ?>

                                                        </td>
                                                        <td>
                                                            <?php echo e($rutas[2][$i]); ?>

                                                        </td>
                                                        <td>
                                                            <?php echo e($rutas[3][$i]); ?>

                                                        </td>
                                                        <td>
                                                            <?php echo e($rutas[4][$i]); ?>

                                                        </td>

                                                    </tr>
                                                    <?php
                                                    }
                                                    ?>

                                                </tbody>
                                                <?php else: ?>
                                                <tbody>
                                                    <tr>
                                                        <td align="center" colspan="5">
                                                            <b>
                                                                No hay resultados en la búsqueda
                                                            </b>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                                <?php endif; ?>
                                            </table>
                                        </div>
                                    </div>