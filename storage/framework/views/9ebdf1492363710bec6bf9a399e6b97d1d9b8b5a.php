<?php $__env->startSection('barraizda'); ?>

                                        <?php echo e(Form::label('Usuario', 'Tusuario')); ?>

        <?php echo Form::select('idmenu',$tusuario,$tusuariodef, $attributes = array('class'=>'form-control','id'=>'idmenu','data-id'=>$tusuariodef->id)); ?>

<div id=cuerpomenu>
      
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('contenido'); ?>
<div class="main-content">
    <div class="main-content-inner">
        <div class="breadcrumbs ace-save-state" id="breadcrumbs">
        </div>
        <div class="page-content">
            <div class="row" >
                <div class="col-xs-12" id="cuerpo">
 
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
        $(document).ready(function() {
            MostrarMenu();
        });
    $('#idmenu').change(function(event) {
            event.preventDefault();
      MostrarMenu();
          });

    $(document).on('click','.actualizar ',function(e){
        e.preventDefault();
        idmenu=$('#idmenu').val();
        idmenuitem=$(this).data('idmenuitem');
            var url="<?php echo e(URL::to('/admin/newmenuitem')); ?>"+"/"+idmenu+"/"+idmenuitem;
            $.ajax({
                type:'get',
                url: url,
                dataType: 'json',
                headers: {
                       'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>',
                   },
                success:function(data){
                    $('#cuerpo').html(data);
                }

            }).fail(function(data){

                            });

    });


    $(document).on('click','.editar ',function(e){
        e.preventDefault();
        idmenuitem=$(this).data('idmenuitem');
            var url="<?php echo e(URL::to('/admin/editmenuitem')); ?>"+"/"+idmenuitem;
            $.ajax({
                type:'get',
                url: url,
                dataType: 'json',
                headers: {
                       'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>',
                   },
                success:function(data){
                    $('#cuerpo').html(data);
                }

            }).fail(function(data){

                            });

    });

    $(document).on('click','.eliminar ',function(e){
        e.preventDefault();
        idmenuitem=$(this).data('idmenuitem');
            var url="<?php echo e(URL::to('/admin/eliminarmenuitem')); ?>"+"/"+idmenuitem;
            $.ajax({
                type:'get',
                url: url,
                dataType: 'json',
                headers: {
                       'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>',
                   },
                success:function(data){
                    MostrarMenu();
                    $('#cuerpo').html("");
             }
                }).fail(function(data){
                    alert('algo falla');
                            });

    });
 
    function MostrarMenu(){
            idmenu=$('#idmenu').val();
            var url="<?php echo e(URL::to('/admin/showmenu')); ?>"+"/"+idmenu+"/"+true;
            $.ajax({
                type:'get',
                url: url,
                dataType: 'json',
                headers: {
                       'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>',
                   },
                success:function(data){
                    $('#cuerpomenu').html(data);
             }
                }).fail(function(data){
                    alert('algo falla');
                            });

    }

</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin2', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>