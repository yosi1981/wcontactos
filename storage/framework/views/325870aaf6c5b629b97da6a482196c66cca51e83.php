<?php $__env->startSection('barraizda'); ?>
                <?php echo $__env->make('layouts.includes.barraizda', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('contenido'); ?>
<div class="main-content">
    <div class="main-content-inner">
        <div class="breadcrumbs ace-save-state" id="breadcrumbs">
        </div>
        <div class="page-content">
            <?php echo $__env->make('admin.provincia.nuevaProvincia.nuevaProvincia', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo $__env->make('admin.provincia.nuevaProvincia.modal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <!--<?php echo $__env->make('admin.provincia.includes.search', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>-->
            <div class="row">
                <div class="col-xs-12">
                    <div class="widget-box widget-color-blue ui-sortable-handle" id="widget-box-3">
                        <div class="widget-header widget-header-small">
                            <h5 class="widget-title">
                                <i class="ace-icon fa fa-table">
                                </i>
                                Listado de Provincias
                            </h5>
                        </div>
                        <div class="breadcrumbs ace-save-state" id="breadcrumbs">
                            <button class="btn btn-xs btn-white btn-default btn-round" id="btnAddProvincia" name="btnAddProvincia">
                                <i class="ace-icon fa fa-times red2">
                                </i>
                                Crear Provincia
                            </button>
                            <div class="nav-search" id="nav-search">
                                <?php echo Form::open(array('url'=>'/admin/Provincia','method'=>'GET','autocomplete'=>'off','class'=>'navbar-form navbar-left','role'=>'search')); ?>

                                <span class="input-icon">
                                    <input autocomplete="off" class="nav-search-input" id="searchText" name="searchText" placeholder="Buscar..." value="<?php echo e($searchText); ?>">
                                        <i class="ace-icon fa fa-search nav-search-icon">
                                        </i>
                                    </input>
                                </span>
                                <?php echo e(Form::close()); ?>

                            </div>
                            <!-- /.nav-search -->
                        </div>
                        <div class="widget-body" style="display: block;">
                            <div class="widget-main">
                                <div class="table-responsive" id="cuerpo" name="cuerpo">
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
                                            <?php if(count($provincias)>0): ?>
                                            <tbody>
                                                <?php $__currentLoopData = $provincias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $provi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td>
                                                        <?php echo e($provi->idprovincia); ?>

                                                    </td>
                                                    <td>
                                                        <?php echo e($provi->nombre); ?>

                                                    </td>
                                                    <td>
                                                        <?php echo e($provi->habilitado); ?>

                                                    </td>
                                                    <td>
                                                        <a href="<?php echo e(URL::action('UsuarioController@edit',$provi->idresponsable)); ?>">
                                                            <?php echo e($provi->NombreUsuario); ?>

                                                        </a>
                                                    </td>
                                                    <td>
                                                        <button class="btn btn-sm btn-success">
                                                            <a href="<?php echo e(URL::action('ProvinciaController@edit',$provi->idprovincia)); ?>">
                                                                <i class="ace-icon fa fa-pencil bigger-120">
                                                                </i>
                                                            </a>
                                                        </button>
                                                        <?php if($provi->habilitado==1): ?>
                                                        <button class="delete-modal btn btn-sm btn-danger" data-id="<?php echo e($provi->idprovincia); ?>">
                                                            DESHABILITAR
                                                        </button>
                                                        <?php else: ?>
                                                        <button class="delete-modal btn btn-sm btn-success" data-id="<?php echo e($provi->idprovincia); ?>">
                                                            HABILITAR
                                                        </button>
                                                        <?php endif; ?>
                                                    </td>
                                                </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                                        <?php echo e($provincias->links()); ?>

                                    </div>
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
            url  : '<?php echo e(URL::to('/admin/searchProvincia')); ?>',
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
        getProvincias(page,$('#searchText').val());
    })

    function getProvincias(page,search)
    {
        var url="<?php echo e(URL::to('/admin/searchProvincia')); ?>";
        $.ajax({
            type : 'get',
            url  : url+'?page='+page,
            data : {'searchText': search}
        }).done(function(data){
            $('#cuerpo').html(data);
        })
    }
    function MostrarMensaje()
    {
            $.bootstrapGrowl("<?php echo e(\Session::get('seccion_actual')); ?>", {
              ele: 'body', // which element to append to
              type: 'info', // (null, 'info', 'danger', 'success')
              offset: {from: 'top', amount: 20}, // 'top', or 'bottom'
              align: 'right', // ('left', 'right', or 'center')
              width: 250, // (integer, or 'auto')
              delay: 4000, // Time while the message will be displayed. It's not equivalent to the *demo* timeOut!
              allow_dismiss: true, // If true then will display a cross to close the popup.
              stackup_spacing: 10 // spacing between consecutively stacked growls.
            });
    }

        $('#btnAddProvincia').on('click',function(){
            $('#Provincia').modal('show');
        })

        $('#frmProvincia').on('submit',function(e){
            e.preventDefault();
            var form=$('#frmProvincia');
            var formData=form.serialize();
            var url=form.attr('action');
            $.ajax({
                type:'post',
                url: url,
                data: formData,
                async: true,
                dataType: 'json',
                headers: {
                       'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>',
                   },
                success:function(data){
                    $('#Provincia').modal('hide');
                    getProvincias(1,"");
                    MostrarMensaje();
                }

            }).fail(function(data){

                            })
        });
        $(document).ready(function() {
            $('.modal').appendTo("body");
            MostrarMensaje();

        });

        $(document).on('click', '.delete-modal', function(){
            $('.id').text($(this).data('id'));
            $('#modal-delete').modal('show');
        })
        $('.modal-footer').on('click', '.delete', function(e) {
            e.preventDefault();
            var url="<?php echo e(URL::to('/admin/eliminarProvincia')); ?>";
          $.ajax({
            type: 'post',
            data: {
              'id': $('.id').text()
            },
            url: url,
            headers: {
                       'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>',
                   },
            success: function(data) {
            $('#modal-delete').modal('hide');
            getProvincias(1,"");
            $('.modal-backdrop').removeClass();
            }
          });
        });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin2', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>