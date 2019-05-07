<?php $__env->startSection('barraizda'); ?>
                <?php echo $__env->make('layouts.includes.barraizda', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('contenido'); ?>
<div class="main-content">
    <div class="main-content-inner">
        <div class="breadcrumbs ace-save-state" id="breadcrumbs">
        </div>
        <div class="page-content">
            <div class="row">
                <div class="col-xs-12">
                    <?php echo $__env->make('admin.anuncioProgramado.includes.modalDelete', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php if(session()->has('msj')): ?>
                    <div class="alert alert-success">
                        <button aria-hidden="true" class="close" type="button">
                            ×
                        </button>
                        <span>
                            <b>
                                Exito -
                            </b>
                            <?php echo e(session('msj')); ?> ".alert-success"
                        </span>
                    </div>
                    <?php endif; ?>
                    <div class="widget-box widget-color-blue ui-sortable-handle" id="widget-box-3">
                        <div class="widget-header widget-header-small">
                            <h6 class="widget-title">
                                <i class="ace-icon fa fa-table">
                                </i>
                                Anuncios Programados
                            </h6>
                        </div>
                        <div class="breadcrumbs ace-save-state" id="breadcrumbs">
                            <div class="nav-search" id="nav-search">
                                <?php echo Form::open(array('url'=>'Anuncio','method'=>'GET','class'=>'form-search','autocomplete'=>'off','role'=>'search')); ?>

                                <span class="input-icon">
                                    <input autocomplete="off" class="nav-search-input" id="searchText" name="searchText" placeholder="Search ..." type="text">
                                        <i class="ace-icon fa fa-search nav-search-icon">
                                        </i>
                                    </input>
                                </span>
                                <?php echo e(Form::close()); ?>

                            </div>
                            <!-- /.nav-search -->
                        </div>
                        <div class="widget-body" style="display: block;">
                            <div class="widget-main ">
                                <div>
                                </div>
                                <div class="table-responsive" id="cuerpo" name="cuerpo">
                                    <table class="table table-bordered table-hover" id="simple-table">
                                        <thead>
                                            <tr>
                                                <th width="5%">
                                                    Id
                                                </th>
                                                <th width="15%">
                                                    Id Anuncio
                                                </th>
                                                <th width="10%">
                                                    Titulo
                                                </th>
                                                <th width="10%">
                                                    <i class="ace-icon fa fa-clock-o bigger-110 hidden-480">
                                                    </i>
                                                    Fecha Inicio
                                                </th>
                                                <th width="10%">
                                                    <i class="ace-icon fa fa-clock-o bigger-110 hidden-480">
                                                    </i>
                                                    Fecha Final
                                                </th>
                                                <th width="10%">
                                                    <i class="ace-icon fa fa-users-o bigger-110 hidden-480">
                                                    </i>
                                                    Usuario
                                                </th>
                                                <th width="10%">
                                                    Estado
                                                </th>
                                                <th width="30%">
                                                    Acciones
                                                </th>
                                            </tr>
                                        </thead>
                                        <?php if(count($anunciosP)>0): ?>
                                        <tbody>
                                            <?php $__currentLoopData = $anunciosP; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $anu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td>
                                                    <?php echo e($anu->idanuncio_programado); ?>

                                                </td>
                                                <td>
                                                    <?php echo e($anu->idanuncio); ?>

                                                </td>
                                                <td>
                                                    <?php echo e($anu->titulo); ?>

                                                </td>
                                                <td>
                                                    <?php echo e($anu->fechainicio); ?>

                                                </td>
                                                <td>
                                                    <?php echo e($anu->fechafinal); ?>

                                                </td>
                                                <td>
                                                    <a href="<?php echo e(URL::to('/Usuario/'.$anu->idusuario.'/edit')); ?>">
                                                        <?php echo e($anu->NombreUsuario); ?>

                                                    </a>
                                                </td>
                                                <td class="hidden-480">
                                                    <?php if($anu->activo == 0): ?>
                                                    <span class="label label-sm label-danger">
                                                        Inactivo
                                                    </span>
                                                    <?php else: ?>
                                                    <span class="label label-sm label-success">
                                                        Activo
                                                    </span>
                                                    <?php endif; ?>
                                                </td>
                                                <td>
                                                    <div class="hidden-sm hidden-xs btn-group">
                                                        <button class="btn btn-sm btn-success">
                                                            <a href="<?php echo e(URL::to('/anunciante/editarAnuncioProgramado/'.$anu->idanuncio_programado)); ?>">
                                                                <i class="ace-icon fa fa-pencil bigger-120">
                                                                </i>
                                                            </a>
                                                        </button>
                                                        <?php if($anu->activo == 0): ?>
                                                        <button class="btn btn-sm btn-danger">
                                                            <i class="ace-icon delete-modal fa fa-trash bigger-120" color="white" data-id="<?php echo e($anu->idanuncio_programado); ?>">
                                                            </i>
                                                        </button>
                                                        <?php endif; ?>
                                                    </div>
                                                    <div class="hidden-md hidden-lg">
                                                        <div class="inline pos-rel">
                                                            <button class="btn btn-minier btn-primary dropdown-toggle" data-position="auto" data-toggle="dropdown">
                                                                <i class="ace-icon fa fa-cog icon-only bigger-110">
                                                                </i>
                                                            </button>
                                                            <ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
                                                                <li>
                                                                    <a class="tooltip-info" data-original-title="View" data-rel="tooltip" href="#" title="">
                                                                        <span class="blue">
                                                                            <i class="ace-icon fa fa-search-plus bigger-120">
                                                                            </i>
                                                                        </span>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a class="tooltip-success" data-original-title="Edit" data-rel="tooltip" href="#" title="">
                                                                        <span class="green">
                                                                            <i class="ace-icon fa fa-pencil-square-o bigger-120">
                                                                            </i>
                                                                        </span>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a class="tooltip-error" data-original-title="Delete" data-rel="tooltip" href="#" title="">
                                                                        <span class="red">
                                                                            <i class="ace-icon fa fa-trash-o bigger-120">
                                                                            </i>
                                                                        </span>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                        <?php else: ?>
                                        <tbody>
                                            <tr>
                                                <td align="center" colspan="9">
                                                    <b>
                                                        No hay resultados en la búsqueda
                                                    </b>
                                                </td>
                                            </tr>
                                        </tbody>
                                        <?php endif; ?>
                                    </table>
                                    <?php echo e($anunciosP->links()); ?>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $('#searchText').on('keyup',function(){
        $value=$(this).val();
        $.ajax({
            type : 'get',
            url  : "<?php echo e(URL::to('/anunciante/searchAP')); ?>",
            data : {'searchText' : $value},
            async: true,
            dataType: 'json',
            headers: {
                       'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>',
                 },
            success:function(data){
                $('#cuerpo').html(data);
            }
        })
    })
    $(document).on('click','.pagination a',function(e){
        e.preventDefault();
        var page=$(this).attr('href').split('page=')[1];
        getAnuncios(page,$('#searchText').val());
    })

$(document).ready(function() {
        $('.modal').appendTo("body");

        });


    function getAnuncios(page,search)
    {
        var url="<?php echo e(URL::to('/anunciante/searchAP')); ?>";
        $.ajax({
            type : 'get',
            url  : url+'?page='+page,
            data : {'searchText': search}
        }).done(function(data){
            $('#cuerpo').html(data);
        })
    }



        $(document).on('click', '.delete-modal', function(){
            $('.id').text($(this).data('id'));
            $('#idanuncioProgramado').text($(this).data('id'));
            $('#modal-delete').modal('show');
        })
        $('.modal-footer').on('click', '.delete', function(e) {
            e.preventDefault();
            var url="<?php echo e(URL::to('/anunciante/eliminarAP')); ?>";
          $.ajax({
            type: 'post',
            data: {
              'id': $('#idanuncioProgramado').text()
            },
            url: url,
            headers: {
                       'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>',
                   },
            success: function(data) {
            $('#modal-delete').modal('hide');
            getAnuncios(1,"");
            $('.modal-backdrop').removeClass();
            }
          });
        });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin2', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>