<?php $__env->startSection('barraizda'); ?>
                <?php echo $__env->make('layouts.includes.barraizda', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('contenido'); ?>

    <?php echo $__env->make('admin.imagen.includes.nuevaImagen', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo $__env->make('admin.imagen.includes.modal-delete-img-user', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<div class="main-content">
    <div class="main-content-inner">
        <div class="breadcrumbs ace-save-state" id="breadcrumbs">
        </div>
        <div class="page-content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="widget-box widget-color-blue ui-sortable-handle" id="widget-box-3">
                        <div class="widget-header widget-header-small">
                            <h6 class="widget-title">
                                <i class="ace-icon fa fa-sort">
                                </i>
                                Imagenes de los anunciantes
                            </h6>
                        </div>
                        <div class="widget-body" style="display: block;">
                            <div class="widget-main">
                                <table class="table table-bordered table-hover" id="simple-table">
                                    <thead>
                                        <th>
                                            Id
                                        </th>
                                        <th class="detail-col">
                                            Detalles
                                        </th>
                                        <th>
                                            Usuario
                                        </th>
                                        <th>
                                            Imagenes
                                        </th>
                                    </thead>
                                    <tbody>
                                        <?php if(count($usuarios)>0): ?>
                <?php $__currentLoopData = $usuarios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $usuario): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td>
                                                <?php echo e($usuario->id); ?>

                                            </td>
                                            <td class="center">
                                                <div class="action-buttons">
                                                    <a class="green bigger-140 show-details-btn" href="#" title="Show Details">
                                                        <i class="ace-icon fa fa-angle-double-down">
                                                        </i>
                                                        <span class="sr-only">
                                                            Details
                                                        </span>
                                                    </a>
                                                </div>
                                            </td>
                                            <td>
                                                <?php echo e($usuario->Usuario->email); ?>

                                            </td>
                                            <td id="imgusuario<?php echo e($usuario->id); ?>">
                                                <?php echo e(count($usuario->Imagenes)); ?>

                                            </td>
                                        </tr>
                                        <tr class="detail-row">
                                            <td colspan="8">
                                                <div class="widget-box widget-color-blue ui-sortable-handle" id="widget-box-3">
                                                    <div class="widget-header widget-header-small">
                                                        <h6 class="widget-title">
                                                            <i class="ace-icon fa fa-sort">
                                                            </i>
                                                            Imágenes de <?php echo e($usuario->Usuario->email); ?>

                                                        </h6>
                                                        <div class="widget-toolbar">
                                                            <a data-action="search" href="#">
                                                                <i class="ace-icon fa fa-search">
                                                                </i>
                                                            </a>
                                                            <a data-action="reload" href="#">
                                                                <i class="ace-icon fa fa-refresh">
                                                                </i>
                                                            </a>
                                                            <a data-action="collapse" href="#">
                                                                <i class="ace-icon fa fa-minus" data-icon-hide="fa-minus" data-icon-show="fa-plus">
                                                                </i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="widget-body" style="display: block;">
                                                        <div class="widget-main" id="det<?php echo e($usuario->id); ?>">
                                                            <ul class="ace-thumbnails clearfix">
                                                                <?php $__currentLoopData = $usuario->Imagenes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $imagen): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <li>
                                                                    <a class="cboxElement" data-rel="colorbox" href="" title="<?php echo e($imagen->titulo); ?>">
                                                                        <img alt="<?php echo e($imagen->idusuario); ?>" class="desaturada" height="200" src="/imagenes/thumb_<?php echo e($imagen->ficheroimagen); ?>" width="150">
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
                                                                        <img height="200" src="/imagenes/thumb_descarga.jpeg" width="150">
                                                                        </img>
                                                                    </a>
                                                                </div>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php else: ?>
                                        <tr>
                                            <td colspan="4">
                                                NO TIENES NINGUN REFERIDO
                                            </td>
                                        </tr>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.col -->
            </div>
        </div>
    </div>
    <!-- /.page-content -->
</div>
<script type="text/javascript">
    $(document).ready(function(){
                $('[data-toggle="tooltip"]').tooltip();
                //getImagenes();
            });
            $('#btnUploadImagen').on('click',function(){
                $('#Imagen').modal('show');
            })
                       $(document).on('click', '.nimagen a', function(e){
                            e.preventDefault();
                            var id=$(this).data('iduserimagen');
                            $('.iduserimagen').val(id);
                            $('#Imagen').modal('show');
                })


            var form=document.getElementById('frmUploadImage');
            var request=new XMLHttpRequest();

           request.upload.addEventListener('progress',function(e){
                e.preventDefault();
                console.log((e.loaded/e.total*100)+'porcentaje');
            },false);



            form.addEventListener('submit',function(e){
                e.preventDefault();
                var formData=new FormData(form);

                request.open('post','uploadimage');

                request.send(formData);
                request.addEventListener("load",transferComplete);
            })
        function getImagenesUser(id)
    {
        var url="<?php echo e(URL::to('/admin/getImagesUser')); ?>";
        $.ajax({
            type : 'get',
            url  : url,
            data :{
                'id':$('.iduserimagen').val()
            },
            //data : {'searchText': search}
        }).done(function(data){
            var cuerpo= "det"+id;
            $('#'+cuerpo).html(data);
            var images=$("#det"+id+" li").size();
            $('#imgusuario'+id).text(images);
        })
    }
            function transferComplete(data){
                var id=$('.iduserimagen').val();
                $('#Imagen').modal('hide');
                getImagenesUser(id);
            }
            $(document).ready(function() {
                $('.modal').appendTo("body");
            });
                $('.modal-footer1').on('click', '.delete1', function(e) {
                    e.preventDefault();
                    var url="<?php echo e(URL::to('/admin/eliminarimagen')); ?>";
                    var id=$('.id').val();
                    var iduser=$('.iduserimagen').val();
                  $.ajax({
                    type: 'post',
                    data: {
                      'id': id
                    },
                    url: url,
                    headers: {
                               'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>',
                           },
                    success: function(data) {
                    $('#modal-delete-img-user').modal('hide');
                    getImagenesUser(iduser);
                    //$('#imgusuario'+id).text($('#imgusuario'+id).text()-1);
                    }
                  });
                });

                        $(document).on('click', '.delete-modal-img-user', function(){
                            var id=$(this).data('id');
                            var iduser=$(this).data('userid');
                            var titulo=$(this).data('titulo');
                            $('.id').val(id);
                            $('.iduserimagen').val(iduser);
                            $('#titledelete').text("Desea eliminar la imagen: ".concat(titulo));
                            $('#modal-delete-img-user').modal('show');
                })
</script>
<style>
    img.desaturada { filter: grayscale(100%);
-webkit-filter: grayscale(100%);
-moz-filter: grayscale(100%);
-ms-filter: grayscale(100%);
-o-filter: grayscale(100%);
}
</style>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin2', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>