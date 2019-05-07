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
                <div class="col-md-10 col-md-offset-1">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <b>
                                Charts
                            </b>
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <form id="busqueda">
                                    <div class="col-md-3">
                                        <?php echo e(Form::label('Opcion', 'Opcion')); ?>

                                        <select class="form-control" id="opcion" name="opcion">
                                            <option selected="" value="0">
                                                Por dias
                                            </option>
                                            <option value="1">
                                                Por Meses
                                            </option>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <?php echo e(Form::label('Provincia', 'Provincia')); ?>

        <?php echo Form::select('idprovincia',$provincias,$prodef, $attributes = array('class'=>'form-control','id'=>'idprovincia','data-id'=>$prodef->id)); ?>

                                    </div>
                                    <div class="col-md-3">
                                        <?php echo e(Form::label('fechainicio', 'Fecha Inicio')); ?>

        <?php echo e(Form::input('date','fechainicio' ,"2018-12-01" , ['class'=>'datepicker form-control','id'=>'fechainicio'])); ?>

                                    </div>
                                    <div class="col-md-3">
                                        <?php echo e(Form::label('fechafinal', 'Fecha Final')); ?>

       <?php echo e(Form::input('date','fechafinal' , '2018-12-12', ['class'=>'datepicker form-control','id'=>'fechafinal'])); ?>

                                    </div>
                                </form>
                            </div>
                            <div class="panel-body">
                                <div height="280" id="cuerpo" width="600">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $('#idprovincia').change(function(event) {
            event.preventDefault();
      mostrargrafica();
          });
        $('#opcion').change(function(event) {
            event.preventDefault();
      mostrargrafica();
          });
        $('#fechainicio').change(function(event) {
            event.preventDefault();
      mostrargrafica();
          });
        $('#fechafinal').change(function(event) {
            event.preventDefault();
      mostrargrafica();
          });


          function mostrargrafica(){
            var url="<?php echo e(URL::to('/admin/chart')); ?>";
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

                            })
          }


    $(document).ready(function() {
      mostrargrafica();

          });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin2', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>