                                        <ul  class="ace-thumbnails clearfix">
                                            <?php $__currentLoopData = $imagenes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $imagen): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li>
                                                <a class="cboxElement" data-rel="colorbox" href="" title="<?php echo e($imagen->titulo); ?>">
                                                    <img class="desaturada" alt="<?php echo e($imagen->idusuario); ?>" height="200" src="/imagenes/thumb_<?php echo e($imagen->ficheroimagen); ?>" width="150">
                                                    </img>
                                                </a>
                                                <!--
                                                <div class="tags">
                                                    <span class="label-holder">
                                                        <span class="label label-info">
                                                            breakfast
                                                        </span>
                                                    </span>
                                                    <span class="label-holder">
                                                        <span class="label label-danger">
                                                            fruits
                                                        </span>
                                                    </span>
                                                    <span class="label-holder">
                                                        <span class="label label-success">
                                                            toast
                                                        </span>
                                                    </span>
                                                    <span class="label-holder">
                                                        <span class="label label-warning arrowed-in">
                                                            diet
                                                        </span>
                                                    </span>
                                                </div>
                                            -->
                                                <div class="tools">
                                                    <a href="#">
                                                        <i class="ace-icon fa fa-link">
                                                        </i>
                                                    </a>
                                                    <a href="#">
                                                        <i class="ace-icon fa fa-paperclip">
                                                        </i>
                                                    </a>
                                                    <a href="#">
                                                        <i class="ace-icon delete-modal-img-user fa fa-times red" data-id="<?php echo e($imagen->idimagen); ?>" data-titulo="<?php echo e($imagen->titulo); ?>" data-userid="<?php echo e($imagen->idusuario); ?>">
                                                        </i>
                                                    </a>
                                                </div>
                                            </li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <div class="nimagen">
                                                    <a data-iduserimagen="<?php echo e($usuario->id); ?>" href="" title="Añadir imagenes">
                                                    <img  height="200" src="/imagenes/thumb_descarga.jpeg" width="150">
                                                    </img>
                                                </a>
                                            </div>
                                        </ul>
